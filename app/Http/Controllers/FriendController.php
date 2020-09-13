<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{

    public function index()
    {
        return view('friend.index',[ 'friends' => Auth::user()->friends()]);
    }


    public function requestsFriend()
    {
        return view('friend.add',[ 'requests' => Auth::user()->friendRequests()]);

    }
    public function acceptFriend(User $user)
    {
        $info = 'Friend request.';
        Auth::user()->acceptFriendRequest($user);
        return redirect()
            ->route('friends.add')
            ->with('info',$info);
    }

    public function addFriend(User $user)
    {
        $info = 'Friend request.';
        Auth::user()->addFriend($user);
        return redirect()
            ->route('users.index')
            ->with('info',$info);

    }
    public function deleteAcceptFriend(User $user)
    {
        $info = 'Reject friendship.';
        Auth::user()->deleteFriend($user);
        return redirect()
            ->route('friends.add')
            ->with('info',$info);

    }
    public function deleteFriend(User $user)
    {
        $info = 'Delete friend.';
        Auth::user()->deleteFriend($user);
        return redirect()
            ->route('friends.index')
            ->with('info',$info);

    }
}
