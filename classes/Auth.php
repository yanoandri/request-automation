<?php namespace classes;

class Auth {
    private $key = KEY;
    private $secret = SECRET;
    private $relativeUrl = URL;
    const POST_METHOD = 'POST';
    const GET_METHOD = 'GET';


    public function getSignature($method, $payload)
    {
        $str = '';
        $timestamp = date('Y-m-d').'T'.date('H:i:s');
        $replace_str = ["\r", "\n", "\t", ' '];
        $strtosign = str_replace($replace_str, '', $payload);
        if ($method === self::POST_METHOD) {
            $str = $method.':/partners/'.$this->relativeUrl.':'.$this->key.':'.$timestamp.':'.$strtosign;
        } else {
            $str = $method.':/partners/'.$this->relativeUrl.':'.$this->key.':'.$timestamp;
        }
        $hash = hash_hmac('sha256', $str, $this->secret);
        return ['api_key' => $this->key, 'signature' => $hash, 'timestamp' => $timestamp, 'payload' => $strtosign];
    }
}

?>