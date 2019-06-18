<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsCreateRequest;
use App\Post;
use App\Photo;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)// The store method is responsible for recieving all data
    {
        $input = $request->all();  // {"_token":"2qk1Aj0safDeLgiTw312XZCHK5wcDCAfbzcBu2jz","title":"that title","category_id":"",
                                  // "body":"thats description","photo_id":{}}

        // The post has a user.We could actually pull out the user(the user that is logged in) and then update the relationship.
        $user = Auth::user(); // pulling the logged_in user

        //check if file is present 
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

       //  return $user->posts;  will show you all the posts with that specific user_id
     $user->posts()->create($input);
     //  return $user;                                  {"id":1,"role_id":1,"is_active":1,"name":"Sabtain Sarwar",
                                                        // "email":"sabtain964@gmail.com","created_at":"2019-06-12 08:15:53",
                                                        // "updated_at":"2019-06-18 09:07:39","photo_id":"2",
                                                        // "role":{"id":1,"name":"administrator","created_at":null,
                                                                // "updated_at":null}} 
       return redirect('/admin/posts');
      //return $user->posts()->create($input);          {"title":"","category_id":"","body":"","user_id":1,
                                                        // "updated_at":"2019-06-18 16:23:08",
                                                        // "created_at":"2019-06-18 16:23:08","id":8}

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
      //  return view('admin.posts.edit');
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
        //
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
