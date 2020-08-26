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
                                <small>{{ $post->updated_at->diffForHumans() }}</small>
                                <div class="pull-right">
                                    <a class="delete-modal" data-toggle="modal" data-target="#deleteModal" post-id="{{ $post->id }}" style="cursor: pointer">
                                        <i class="fa fa-2x fa-trash" style="color: red" aria-hidden="true"></i> 
                                    </a>
                                </div>
                                <div class="pull-right">&nbsp; | &nbsp;</div>
                                <div class="pull-right">
                                    <a href="{{ url('/post/'.$post->id.'/edit') }}">
                                        <i class="fa fa-2x fa-pencil-square-o" aria-hidden="true"></i> 
                                    </a>
                                </div>
                                <br>
                                    <p>{!! $post->post !!}</p>
                                <br>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" id="form-delete" action="">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Delete this post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>Are you sure you want to delete this post?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>   
@endsection