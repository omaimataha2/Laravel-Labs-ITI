<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostDec;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    // private $posts = [
    //     ['id' => 1, 'title' => 'Learn php', 'posted_by' => 'ahmed', 'created_at' => '2022-04-11'],
    //     ['id' => 2, 'title' => 'Solid principles', 'posted_by' => 'mohamed', 'created_at' => '2022-04-11'],
    //     ['id' => 3, 'title' => 'Design patterns', 'posted_by' => 'ali', 'created_at' => '2021-04-11'],
    // ];
    public function index()
    {
        $posts = Post::paginate(8);
        // $posts = Post::all();
        // dd($posts); //stop execution and dump the variable
        return view('posts.index',[
            'allPosts' => $posts,
        ],compact('posts'));
    }





    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }



    public function store()
    {

        //get me the request data
        // $data = $_REQUEST; don't use plain php in laravel framework
        $data = request()->all();
        // $title = request()->title;

        //store the request data in the db
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],

        ]);

        //redirect to /posts
        return to_route('posts.index');
        //some logic to store data in db
        //redirect to /posts
        // return view('posts.store');
    }




    public function show($post)
    {
        //select * from posts where id = 1
        $post = Post::find($post); //App\Models\Post


        // dd($post);
        return view('posts.show',[ 'post' => $post, ]);


        // $allPosts = $this->posts;
        // foreach($allPosts as $key=> $post){
        //     if ($key+1 ==$id){
        //         return view('posts.show',[
        //             'post' => $post,
        //         ]);
        //     }

        // }

    }




    public function update($post)
    {
        $post = Post::find($post);
        $data = request()->all();
        $post->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],

        ]);
             return  to_route('posts.index');
        }




    public function edit($post)
    {
        $users = User::all();
        $post = Post::find($post);
        return view('posts.edit',[ 'post' => $post, 'users' => $users,]);

        // $allPosts = $this->posts;
        // foreach($allPosts as $key=> $post){
        //     if ($key+1 ==$id){
        //         return view('posts.edit',[
        //             'post' => $post,
        //         ]);
        //     }

        // }
        // dd($id);

    }



    public function destroy($post)
    {
        Post::where('id',$post)->delete();

        return  to_route('posts.index');
   }
}



