@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <textarea class="form-control" placeholder="What's on your mind?"></textarea> <br>
                        <div class="post-button text-right">
                            <button class="btn btn-primary" type="button"> Post </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection