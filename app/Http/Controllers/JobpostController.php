<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\JbAli;
use Redirect;
use Exception;

class JobpostController extends Controller{

 public function index(){
     $job_post=JbAli::where('closing_date','>=',time())->get();
     return view('post.add_video',compact('job_post'));
  }

 public function create(){
     //
  }

 public function show($id){
     //
 }

 public function edit($id){
     //
 }

 public function update($id){
     //
 }

 public function store(Request $request){
     //
 }
 public function save(Request $request){
   $postId=$request->id;
   $url=$request->url;
   $post=JbAli::find($postId);
   $post->video=$url;
  try{
   $post->save();
}
  catch(Exception $e){
    echo $e->getMessage();

  }
  echo "Video Added Successfully";
 }

}
