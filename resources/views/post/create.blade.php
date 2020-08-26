@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Post</div>
                    @if ($errors->any())
                        <br>
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/post">
                        @csrf
                        <div class="card-body">
                            <textarea name="post" class="form-control" placeholder="What's on your mind?"></textarea> <br>
                            <div class="post-button text-right">
                                <button class="btn btn-primary" type="submit"> Post </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
@endsection