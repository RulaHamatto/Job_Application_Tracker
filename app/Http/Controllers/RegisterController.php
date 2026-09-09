<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // عرض الفورم
    public function showForm()
    {
        return view('register');
    }

    // استقبال البيانات
    public function store(Request $request)
    {
       dd($request->all());
   }
}