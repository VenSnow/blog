<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if(!auth()->user()->isAdmin()) {
            return response(null,  409);
        }

        return view('admin.index');
    }
}
