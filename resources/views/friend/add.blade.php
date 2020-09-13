@extends('layouts.app')

@section('content')
    <div class="row content-main">
        <div class="col-lg-4">
            <h4>Add as Friend</h4>
            @if ( ! count ($requests) )
                <p> No add to friends. </p>
            @else
                @foreach ( $requests as $request )
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="d-flex align-items-center media-body">
                                <a href="{{ route('home' )}}"
                                   class="profile-link">
                                    {{ $request->getNameOrUsername() }}
                                </a>
                            </div>
                            @if ( $request->location)
                                <p>Location: {{  $request->location }}</p>
                            @endif
                            <div class="btn-group">
                                <a href="{{ route('friends.accept',['user'=>$request]) }}"
                                   class="btn btn-success">
                                    <i class="fa fa-plus"></i></a>

                                <a href="{{ route('friends.accept.delete',['user'=>$request]) }}"
                                   class="btn btn-danger">
                                    <i class="fa fa-minus"></i></a>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif

        </div>
    </div>
@endsection
