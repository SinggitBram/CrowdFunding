<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddleController extends Controller
{
    public function testRoute1 () {
        return 'berhasil masuk route1';
    }

    public function testRoute2 () {
        return 'berhasil masuk route2';
    }
}
