<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard_rule()
    {
        return view('admin.dashboard-rule');
    }
}
