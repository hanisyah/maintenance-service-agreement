<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $setting = setting::all();
        return view('setting/index',['setting' => $setting]);
    }
}
