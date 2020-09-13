<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $allUsers = User::where('id', '<>', Auth::user()->id)->get();
        return view('user.index',[
            'users'=>$allUsers
        ]);
    }

}
