@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $action }} Post</div>
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(!isset($post))
                    <form method="POST" action="/post">
                        @csrf
                        <div class="card-body">
                        <textarea name="post" class="form-control" placeholder="What's on your mind?"></textarea> <br>
                            <div class="post-button text-right">
                                <button class="btn btn-primary" type="submit"> Post </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form method="POST" action="/post/{{ $post['id'] }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                        <textarea name="post" class="form-control" placeholder="What's on your mind?">{{ $post['post'] ?? ''}}</textarea> <br>
                            <div class="post-button text-right">
                                <button class="btn btn-primary" type="submit"> Update </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection