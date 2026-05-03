<?php

class Session{
    public function setSession($key,$value){}
    public function getSession($key){
        // return $value;
    }
    public function flash($key){
        // بترجع القيمه بتاع ال key لو موجوده وتعرضها وبعدين تمسحها
    }
    public function remove($key){}
    public function removeAll(){}
    public function getAll(){}
    public function has($key){
        // check exists true or false
    }
}

//form  and view sessions and apply methods