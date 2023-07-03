<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeNameController extends Controller
{
    public function index()
    {
        return view('pages.admin.change-name.index');
    }

    public function update(Request $request)
    {
         $validate  = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        // $hashedPassword = Auth::user()->password;

        // if (Hash::check($request->current_password, $hashedPassword)){
            $user = User::find(Auth::id());

            $user->update($validate);

            return redirect()->back()->with('success-message', 'Name Changed Successfully');
        // }
    }
}


