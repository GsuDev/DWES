<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers() {
      $users = DB::table('personas')->get();
      return response()->json($users, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_UNICODE);
    }
    
}
