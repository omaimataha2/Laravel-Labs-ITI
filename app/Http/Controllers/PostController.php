<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;

class PostController extends Controller
{
    private $posts = [
        ['id' => 1, 'title' => 'Learn php', 'posted_by' => 'ahmed', 'created_at' => '2022-04-11'],
        ['id' => 2, 'title' => 'Solid principles', 'posted_by' => 'mohamed', 'created_at' => '2022-04-11'],
        ['id' => 3, 'title' => 'Design patterns', 'posted_by' => 'ali', 'created_at' => '2021-04-11'],
    ];
    public function index()
    {
        // dd($posts); //stop execution and dump the variable
        return view('posts.index',[
            'allPosts' => $this->posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //some logic to store data in db
        //redirect to /posts
        return view('posts.store');
    }

    public function show($id)
    {

        $allPosts = $this->posts;
        foreach($allPosts as $key=> $post){
            if ($key+1 ==$id){
                return view('posts.show',[
                    'post' => $post,
                ]);
            }

        }

    }

    public function update($id)
    {
             return  redirect()->route('posts.index');
        }


    public function edit($id)
    {

        $allPosts = $this->posts;
        foreach($allPosts as $key=> $post){
            if ($key+1 ==$id){
                return view('posts.edit',[
                    'post' => $post,
                ]);
            }

        }
        dd($id);

    }


    public function destroy($id)
    {
        return  redirect()->route('posts.index');
   }
}



