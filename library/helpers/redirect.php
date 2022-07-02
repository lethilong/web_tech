<?php

class Redirect{

    public static function  to($location){
        header("Location: ".ROOT."$location");
        exit();
    }

    public static function  back(){
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
}

