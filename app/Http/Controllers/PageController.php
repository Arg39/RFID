<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view ('dashboard',compact('scans'));
    }

    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function siswa()
    {
        $students = User::where('role', 'student')->get();
        return view('pages.siswa', compact('students'));
    }
}
