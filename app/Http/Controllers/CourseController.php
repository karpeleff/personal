<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function   index()
    {
        return view('courses/index');
    }

    public function   blog()
    {
        return view('courses/blog');
    }

    public function   contact()
    {
        return view('courses/contact');
    }

    public function   pricing()
    {
        return view('courses/pricing');
    }
}
