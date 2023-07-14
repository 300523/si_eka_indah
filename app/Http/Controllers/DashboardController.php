<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | SI Eka Indah',
            'nav' => 'dashboard'
        ];

        return view('backend.dashboard.index', $data);
    }
}
