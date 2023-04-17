<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use Illuminate\Http\Request;


class GuestController extends Controller
{
 public function index()
  {
    $shoes = Shoe::paginate(9);

    return view('guest', compact('shoes'));
  }
}