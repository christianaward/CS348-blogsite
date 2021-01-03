<?php

namespace App;

class Unsplash
{
    private $accessKey;
    private $secretKey;

    public function __construct($accessKey, $secretKey){
        $this->$accessKey = $accessKey;
        $this->$secretKey = $secretKey;
    }

    public function Photo() {
        $json = file_get_contents('https://api.unsplash.com/photos/random?client_id=zSfUUDuhlVmh5yyqp9D-0SvCAbLHM_1VBgo94Te369g');
        $obj = json_decode($json);
        return $obj->urls->regular;
    }
}