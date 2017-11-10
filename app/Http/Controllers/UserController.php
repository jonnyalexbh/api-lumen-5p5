<?php

namespace App\Http\Controllers;
use App\User;

class UserController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }

  /**
  * index
  */
  public function index()
  {
    $users = User::all();
    return response()->json(['data' => $users], 200);
  }
}
