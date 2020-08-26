@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Feed</div>
                    @if (count($_post) > 0)
                        @foreach ($_post as $post)
                            <div class="card-body">
                                {!! $post->post !!}
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