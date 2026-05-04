<?php

use Task3\Session;

require_once('session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    // var_dump($data);
    // exit;

    Session::start();

    if ($data['action'] == 'login') {

        if (!empty($data['username']) && !empty($data['password'])) {
            $username = trim($data['username']);
            $pass = trim($data['password']);
            Session::setSession('user', [
                'username' => $username,
                'password' => $pass
            ]);
            // var_dump(Session::getSession('user'));
            // exit;
            Session::setSession("success", "User Added Successfully");
        } else {
            Session::setSession("error", "Fail to add User");
        }
    } elseif ($data['action'] == 'remove') {
        Session::remove('user');
        if(Session::remove('user')){
            Session::setSession("success", "User Removed Successfully");
        }else{
            Session::setSession("error", "Fail to Delete User");
        }
    } elseif ($data['action'] == 'destroy') {
        Session::destroy();
        if(Session::destroy()){
            Session::setSession("success", "Session Destroyed Successfully");
        }else{
            Session::setSession("error", "Fail to Destroy the Session");
        }
    }
    header("Location: index.php");
    exit;
}
