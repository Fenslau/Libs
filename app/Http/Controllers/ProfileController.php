<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function change(ProfileRequest $request) {
        $user = User::findOrFail(auth()->user()->id);
        $user->update($request->all());
        if ($user) return back()->with('success', 'Ваша анкета обновлена');
        else return back()->with('error', 'Не удалось обновить анкету');
    }

  public function searchSettings(Request $request) {
      $user = User::findOrFail(auth()->user()->id);
      $user->update($request->all());
      if ($request->ajax()) {
        if ($user) return response()->json( array('success' => true, 'message'=>'Ваши настройки поиска обновлены') );
        else return response()->json( array('success' => false, 'message'=>'Не удалось обновить настройки поиска') );
      } else {
        if ($user) return back()->with('success', 'Ваши настройки поиска обновлены');
        else return back()->with('error', 'Не удалось обновить настройки поиска');
      }
  }

}
