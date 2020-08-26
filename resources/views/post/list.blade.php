@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Feed
                    <a href="{{ url('/post/create') }}">
                        <span class="pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create post!</span>
                    </a>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                    @if (count($_post) > 0)
                        @foreach ($_post as $post)
                            <div class="card-body">
                                {!! $post->post !!}
                                <span class="pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                <span class="pull-right"><i class="fa fa-trash" aria-hidden="true"></i></span>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <div class="card-body">
                            You don't have any post yet!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>    
@endsection