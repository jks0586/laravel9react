<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
class DashboardController extends Controller
{
    //
    public function index(Request $request){
        
       echo '<pre>'; print_r($request->session());echo '</pre>'; die;
        return Inertia::render('Admin/Dashboard', [
            'canResetPassword' => Route::has('admin.password.request'),
            'status' => session('status'),
        ]);
    }
}
