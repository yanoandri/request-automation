<?php namespace services;

require(dirname(__DIR__).'/classes/Input.php');
require(dirname(__DIR__).'/classes/Auth.php');
require(dirname(__DIR__).'/classes/Request.php');
require(dirname(__DIR__).'/classes/Reader.php');
require(dirname(__DIR__).'/helper/DateParser.php');


use classes\Auth;
use classes\Input;
use classes\Request;
use classes\Reader;

class Send
{
    private $auth;
    private $request;
    private $input;
    private $reader;

    public function __construct()
    {
        $this->auth = new Auth;
        $this->input = new Input;
        $this->request = new Request;
        $this->reader = new Reader;
    }

    public function send()
    {
        $files = $this->input->scanInput();
        foreach ($files as $file) {
            $data = file_get_contents($this->input->getPath().$file);
            $json = json_decode($data, true);
            $json['personal_info']['birth_date'] = parseIndoDate($json['personal_info']['birth_date']);
            $payload = json_encode($json);
            $invAuth = $this->auth->getSignature("POST", $payload);
            echo "=========================="."\n";
            $headers = array("X-Investree-Key: ". $invAuth['api_key'],
                "X-Investree-Timestamp: ".$invAuth['timestamp'],
                "X-Investree-Signature: ".$invAuth['signature'],
                "Content-Type: application/json"
            );
            $response = $this->request->post($payload, $headers);
            // $response = array("message" => "OK");

            if($response) {
                echo 'Nama: '.$json['personal_info']['full_name'].' | Email: '.$json['personal_info']['email']. ' | Results: '.json_encode($response)."\n\n";
            }
        }
    }

    public function generateInput()
    {
        $this->reader->scanInput();
    }

    public function cleanTemp()
    {
        $this->input->cleanInputFolder();
    }

}


?>