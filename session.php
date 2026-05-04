<?php
namespace Task3;
class Session
{
    // private string $name;
    // private string $sessionId;
    private static bool $started = false;
    // public static function start()
    // {
    //     if (!self::$started) {
    //         session_start();
    //         self::$started = true;
    //     } else {
    //         echo "Session already started";
    //     }
    // }
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    // public static function setSession(string $key, string $value)
    // {
    //     if (self::$started) {
    //         if ($value !== null) {
    //             $_SESSION[$key] = $value;
    //         }
    //     } else {
    //         echo "Session Not Found";
    //     }
    // }
    public static function setSession(string $key, array | string $value)
    {
        self::start();
        $_SESSION[$key] = $value;
    }
    public static function getSession(string $key)
    {
        self::start();
        return $_SESSION[$key] ?? null;
    }
    public static function flash(string $key)
    {
        // بترجع القيمه بتاع ال key لو موجوده وتعرضها وبعدين تمسحها
        self::start();
        if (isset($_SESSION[$key])) {
            $msg = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $msg;
        }

        return null;
    }
    public static function remove(string $key)
    {
        self::start();
        unset($_SESSION[$key]);
    }
    public static function removeAll()
    {
        self::start();
        session_unset();
    }
    public static function getAll()
    {
        self::start();
        return $_SESSION ?? null;
    }
    public static function has(string $key)
    {
        self::start();
        return isset($_SESSION[$key]);
        // check exists true or false
    }
    public static function destroy()
    {

        if (session_status() !== PHP_SESSION_NONE) {
            session_unset();
            session_destroy();
            self::$started = false;
        }
    }
}



// test view

// if (Session::has('success')) {
//     echo Session::flash('success');
//     echo "</br>";
// }
// if (Session::has('error')) {
//     echo Session::flash('error');
//     echo "</br>";
// }
// if (Session::has('user')) {
//     $user = Session::getSession('user');
//     echo "Welcome " . htmlspecialchars($user['username']);
//     echo "</br>";
//     // بعرض الباسورد بجرب بس عارف انه غلط 😅
//     echo "Your Password is : " . htmlspecialchars($user['password']);
// }
