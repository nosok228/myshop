<?php

namespace App\Core;

class View 
{
    public function render($view, $vars = [], $message = false)
    {
        extract($vars);

        $path = DIR."/App/Views/$view.php";

        if(file_exists($path)) {
            \ob_start();
            require $path;
        }

        else {
            $this->sendResponce(404);
            die;
        }

        return true;
    }

    public function sendResponce($code)
    {
        http_response_code($code);
        die;
        // echo $code;
    }

    public function redirect($path)
    {
        // header("Location: $path");
        echo "<script> location.replace('$path'); </script>";
    }

    public function message($message)
    {
        echo "<script> alert('$message'); </script>";
    }

    public function reload()
    {
        echo "<script> window.location.reload(); </script>";
    }
}