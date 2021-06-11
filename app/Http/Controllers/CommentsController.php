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
    public function index() {
        $id = auth()->user()->id;
		$comm = new Comments();
		$comments=$comm->all()->where('user_id','=',$id);
		$user = new User();
		$users=$user->all();
		$name=$user->find($id)->name;
		
		return view('home',['comments'=>$comments,'users'=>$users, 'id'=>$id, 'id_user'=>$id]);
    }

    public function index_user($id_user){
        $id = auth()->user()->id;
		$comm = new Comments();
		$comments=$comm->all()->where('user_id','=',$id_user);
		$user = new User();
		$users=$user->all();
		$name=$user->find($id)->name;
		
		return view('home',['comments'=>$comments,'users'=>$users, 'id'=>$id, 'id_user'=>$id_user]);
    }
   
	public function insert(Request $req){
		
		$comm = new Comments();
		$comm->description = $req->input('description');
		$user_id=$req->input('user_id');
		$autor_id=auth()->user()->id;
		$comm->user_id = $user_id;
		$comm->autor_id  = $autor_id;
		$comm->parent_id = 0;
		$comm->save();
		$address='home';
		if($user_id!=$autor_id){
			$address='user-comments-id';
		}
		return redirect()->route($address, $user_id);
	}
	
	public function cancell(){
		return redirect()->route('home');
	}
	
	public function replyToComment($parent_id, $user_id){
				
		return view('addComments',['parent_id'=>$parent_id, 'user_id'=>$user_id]);
	}
	
	public function commentAdd(Request $req){
		$comm = new Comments();
		$comm->description = $req->input('description');
		$comm->user_id = $req->input('user_id');
		$comm->autor_id  = auth()->user()->id;
		$comm->parent_id = $req->input('parent_id');
		$comm->save();
		$address='home';
		if($user_id!=$autor_id){
			$address='user-comments-id';
		}
		return redirect()->route($address, $user_id);
	}
	
	public function editComment($id, $description, $user_id, $parent_id){
		return view('edit',['id'=>$id, 'user_id'=>$user_id, 'parent_id'=>$parent_id, 'description'=>$description]);
	}
	
	public function editAdd(Request $req){
		$comm = Comments::find($req->input('id'));
		$comm->description = $req->input('description');
		$comm->user_id = $req->input('user_id');
		$comm->autor_id  = auth()->user()->id;
		$comm->parent_id = $req->input('parent_id');
		$comm->save();
		$address='home';
		if($user_id!=$autor_id){
			$address='user-comments-id';
		}
		return redirect()->route($address, $user_id);
	}
	
	public function delete($id,$user_id){
		
        $autor_id=auth()->user()->id;
		$comm = new Comments();
		$comments = $comm->find($id)->delete();
		$address='home';
		if($user_id!=$autor_id){
			$address='user-comments-id';
		}
		return redirect()->route($address, $user_id);
    }
}
