<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PostController extends Controller
{
    function getUsers()
    {
       $users= Http::get('https://jsonplaceholder.typicode.com/posts');
       return view('posts', ['posts'=>$users->json()]);    
    }
    function singlePost($id)
    {
        $post= Http::get('https://jsonplaceholder.typicode.com/posts/'.$id);
        return view('singlePost', ['post'=>$post->collect()]);
    }

    function addpostview()
    {
        return view('addPost');
    }

    function addData(Request $req)
    {
        $response=Http::post("https://reqres.in/api/users",[
            "name"=> $req->name,
            "job"=> $req->position,
        ]);
        dd($response->json());
    }
}
