<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function admin()
    {
        return view('pages.admin');
    }

    public function articles_api()
    {
        return view('spa.articles');
    }

    public function tags_api()
    {
        return view('spa.tags');
    }

    public function categories_api()
    {
        return view('spa.categories');
    }
}
