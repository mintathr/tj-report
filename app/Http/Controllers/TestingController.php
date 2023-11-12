<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestingController extends Controller
{
    public function index()
    {
        $xx = Hash::make('P@gis0re');
        return view('test', ['xx' => $xx]);
    }
}
