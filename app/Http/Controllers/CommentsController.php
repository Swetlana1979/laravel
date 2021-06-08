<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comments;
class CommentsController extends Controller
{
    
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=0)
    {
        $id = ($id==0)? auth()->user()->id:$id;
		$comm = new Comments();
		$comments=$comm->all()->where('user_id','=',$id);
		$user = new User();
		$users=$user->all();
		
		return view('home',['comments'=>$comments,'users'=>$users, 'id'=>$id]);
    }

    
   
	public function insert($user_id=0, Request $req){
		
		$comm = new Comments();
		$comm->description = $req->input('description');
		$comm->user_id =($user_id==0)? auth()->user()->id:$user_id;
		$comm->autor_id  = auth()->user()->id;
		$comm->parent_id = 0;
		$comm->save();
		return redirect()->route('home');
	}
	
	public function cancell(){
		return redirect()->route('home');
	}
	
	public function replyToComment($parent_id, $user_id){
				
		return view('addComments',['parent_id'=>$id, 'user_id'=>$user_id]);
	}
	
	public function commentAdd(Request $req){
		$comm = new Comments();
		$comm->description = $req->input('description');
		$comm->user_id = $req->input('user_id');
		$comm->autor_id  = auth()->user()->id;
		$comm->parent_id = $req->input('parent_id');
		$comm->save();
		return redirect()->route('home');
	}
	
	public function editComment($id, $description){
		return view('edit',['id'=>$id, 'description'=>$description]);
	}
	
	public function editAdd(Request $req){
		$comm = Comments::find($req->input('id'));
		$comm->description = $req->input('description');
		$comm->save();
		return redirect()->route('home');
	}
	
	public function delete($id){
		
        $comm = new Comments();
		$comments = $comm->find($id)->delete();
		return redirect()->route('home');
    }
}
