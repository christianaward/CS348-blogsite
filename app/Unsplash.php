<?php

namespace App;

class Unsplash
{
    public $accessKey;
    private $secretKey;

    public function __construct($accessKey, $secretKey){
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
    }

    public function Photo() {
        $json = file_get_contents('https://api.unsplash.com/photos/random?query=dog&orientation=landscape&client_id=' . $this->accessKey);
        $obj = json_decode($json);
        return $obj->urls->regular;
    }
}