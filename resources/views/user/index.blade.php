@extends('layouts.app')

@section('content')
    <h4>Users: </h4>
    <div class="row content-main">
        @if ( ! count ($users) )
            <p> No Users. </p>
        @else
            @foreach ( $users as $user )
                <div class="row">
                    <div class="col-sm-10">
                        <div class="d-flex align-items-center media-body">
                            <a href="{{ route('home' )}}"
                               class="profile-link">
                                Name:{{ $user->getNameOrUsername() }}
                            </a>
                        </div>
                        <p>Location: {{ $user->location }}</p>
                        <div class="btn-group">
                            @if (Auth::user()->isFriendWith($user))
                                <a href="{{ route('friends.delete',['user'=>$user]) }}"
                                   class="btn btn-danger">
                                    <i class="fa fa-minus"></i></a>
                            @elseif( Auth::user()->hasFriendRequestPending($user)  ||
                                  Auth::user()->hasFriendRequestReceived($user))
                                <a href="{{ route('friends.delete',['user'=>$user]) }}"
                                   class="btn btn-danger">
                                    <i class="fa fa-minus"></i></a>
                            @else
                                <a href="{{ route('friend.add',['user'=>$user]) }}"
                                   class="btn btn-success">
                                    <i class="fa fa-plus"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
