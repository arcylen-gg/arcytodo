@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Post</div>
                        <div class="card-body">
                            @if(isset($post))
                                <p> {!! $post['post'] !!} </p>
                                <small>Created at: {{ date('F d, Y h:i', strtotime($post['created_at'])) }}</small><br>
                                <small>Updated at: {{ date('F d, Y h:i', strtotime($post['updated_at'])) }}</small>
                            @else
                                <p>No post found!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection