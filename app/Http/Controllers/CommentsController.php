<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
class CommentsController extends Controller
{
    
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $comm = new Comments();
		$comments=$comm->find($id);
		return view('user')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$user_id)
    {
        $comm = new Comments();
		$comments = $comm->find($id_user);
		$comment = $comments->find($id);
		$comment->description=$reg->input('description');
		$comment->user_id = $reg->input('user_id');
		$comment->autor_id = $reg->input('autor_id');
		$comment->parent_id = $reg->input('parent_id');
		$comment->save();
		return redirect()->route('home')->with('success', 'Комментарий изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
