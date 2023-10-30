<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    static function foobar()
    {
        return ['foo' => 'barTestControllerrr'];
    }
}
