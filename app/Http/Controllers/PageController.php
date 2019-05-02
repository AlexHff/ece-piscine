<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view("index");
    }

    public function categories() {
        return view("categories");
    }

    public function deals() {
        return view("deals");
    }
}
