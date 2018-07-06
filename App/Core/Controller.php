<?php

namespace App\Core;

use App\Core\View;

class Controller
{
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function test()
    {
        echo "<br>Test<br>";
    }
}