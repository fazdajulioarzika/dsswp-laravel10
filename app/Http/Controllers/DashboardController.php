<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home',  [
            'title' => 'Dashboard | DSS WP',
            'active' => 'dashboard',
        ]);
    }
}
