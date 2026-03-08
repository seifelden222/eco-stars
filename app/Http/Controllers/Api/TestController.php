<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return Child::all();
    }
}
