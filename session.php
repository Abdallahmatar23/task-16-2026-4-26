<?php

class Session
{
    // private string $name;
    // private string $sessionId;
    private static bool $started = false;
    public static function start()
    {
        if (!self::$started) {
            session_start();
            self::$started = true;
        } else {
            echo "Session already started";
        }
    }
    public static function setSession(string $key, string $value)
    {
        if (self::$started) {
            if ($value !== null) {
                $_SESSION[$key] = $value;
            }
        } else {
            echo "Session Not Found";
        }
    }
    public static function getSession(string $key)
    {
        if (self::$started) {
            return $_SESSION[$key] ?? null;
        } else {
            echo "Session Not Found";
        }
    }
    public static function flash(string $key)
    {
        // بترجع القيمه بتاع ال key لو موجوده وتعرضها وبعدين تمسحها
        if (self::$started) {
            if(isset($_SESSION[$key]))
            $msg = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $msg;
        } else {
            echo "Session Not Found";
        }
    }
    public static function remove(string $key)
    {
        if (self::$started) {
            unset($_SESSION[$key]);
        } else {
            echo "Session not found";
        }
    }
    public static function removeAll()
    {
        if (self::$started) {
            session_unset();
        } else {
            echo "Session not found";
        }
    }
    public static function getAll()
    {
        if (self::$started) {
            return $_SESSION ?? null;
        }
    }
    public static function has(string $key)
    {
        return isset($_SESSION[$key]);
        // check exists true or false
    }
    public static function destroy()
    {
        if (self::$started) {
            session_destroy();
            self::$started = false;
        } else {
            echo "Session Not Found";
        }
    }
}

//form  and view sessions and apply methods
// $data = $_POST;