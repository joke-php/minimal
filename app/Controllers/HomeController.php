<?php

namespace App\Controllers;

class HomeController
{
    public function __invoke(): string
    {
        return 'Hello from Joke Framework!';
    }
}