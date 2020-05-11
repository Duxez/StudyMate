<?php


namespace App\Http\Controllers;


use App\Test;

class DashboardController extends Controller
{

    public function index()
    {
        $tests = Test::all();
        return view('dashboard', compact('tests'));
    }

}
