<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; // Tambahkan ini agar bisa hitung data nanti

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
