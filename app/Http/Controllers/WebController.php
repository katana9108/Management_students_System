<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class WebController extends Controller
{
  public function index() {
    $students = Students::all();

    return view('welcome', compact('students'));
  }
}
