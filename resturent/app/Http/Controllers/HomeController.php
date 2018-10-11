<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Slidertudent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $items = Item::all();
        $sliders = Slidertudent::all();
        return view('welcome', compact('sliders', 'categories', 'items'));
    }
}
