<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class MainController extends Controller
{
    public function main(Request $request) {

      $users = new User();
      if (!empty(auth()->user()->find_city)) $users = $users->where('city', auth()->user()->find_city);
      if (!empty(auth()->user()->find_age_from)) $users = $users->where('user_age', '>=' ,auth()->user()->find_age_from);
      if (!empty(auth()->user()->find_age_to)) $users = $users->where('user_age', '<=' ,auth()->user()->find_age_to);
      if (!empty(auth()->user()->user_lang)) $users = $users->where('user_lang', auth()->user()->user_lang);
      $users = $users->take(1000)->orderBy('online', 'desc')->orderBy('updated_at', 'desc')->paginate(5);

      if ($request->ajax()) {
        $returnHTML = view('inc.ajax-users', compact('users'))->render();
        return response()->json( array('success' => true, 'html'=>$returnHTML) );
      }
      $items = array();
      return view('home', compact('users'));
    }
}
