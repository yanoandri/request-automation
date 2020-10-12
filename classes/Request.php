<?php namespace classes;

class Request {
    private $url = API_URL;

    public function post($payload, $header = array())
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 45,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);
        $status = curl_getinfo($curl);

        curl_close($curl);
        if($error) {
            return array("status" => $status, "error" => $error, "response" => $response);
        }
        return array("status" => $status, "response" => $response);
    }
}

?>