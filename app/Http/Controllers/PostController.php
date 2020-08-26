<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\PostRepositoryInterface;
use Auth;
use Session;

final class PostController extends Controller
{
    private $post;

    public function __construct(PostRepositoryInterface $post)
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['_post'] = $this->post->findByUser(Auth::user()->id);

        return view('post.list', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = 'Create';
        return view('post.create', $data); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post' => 'required',
        ]);
        
        $this->post->save(Auth::user()->id, $request->all());

        Session::flash('message', 'Posted succesfully!');
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['post'] = $this->post->find($id);

        return view('post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['action'] = 'Update';
        $data['post'] = $this->post->find($id);

        return view('post.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'post' => 'required',
        ]);

        $this->post->update($id, $request->all());

        Session::flash('message', 'Updated succesfully!');
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->delete($id);

        Session::flash('message', 'Deleted succesfully!');
        return redirect('/post');
    }
}
