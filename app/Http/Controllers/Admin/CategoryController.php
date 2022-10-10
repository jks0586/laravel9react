<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
class CategoryController extends Controller
{
    //
    public function index(){
        
        return Inertia::render('Admin/Category/index');
    }
}
