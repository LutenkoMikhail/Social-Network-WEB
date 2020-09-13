@extends('layouts.app')

@section('content')
    <div class="row content-main">
        <div class="col-lg-4">
            <h4>Friends </h4>
            @if ( ! count ($friends) )
                <p> No friends. </p>
            @else
                @foreach ( $friends as $friend )
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="d-flex align-items-center media-body">
                                <a href="{{ route('home' )}}"
                                   class="profile-link">
                                    Name:{{ $friend->getNameOrUsername() }}
                                </a>
                            </div>
                            <p>Location: {{ $friend->location }}</p>
                            <div class="btn-group">
                                <a href="{{ route('friends.delete',['user'=>$friend]) }}"
                                   class="btn btn-danger">
                                    <i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
