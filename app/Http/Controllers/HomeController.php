<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = new Post();

        if($request->sort){
            $posts = $posts->orderBy('publication_date', $request->sort);
        }

        $posts = $posts->paginate(20);
        return view('home', compact('posts'));
    }

    public function dashboard(Request $request){
        $posts = new Post();

        if ($request->sort) {
            $posts = $posts->orderBy('publication_date', $request->sort);
        }

        $posts = $posts->where('user_id', Auth::user()->id)->paginate(20);

        return view('dashboard', compact('posts'));
    }

    public function import(){
        $response = Http::get('https://sq1-api-test.herokuapp.com/posts');
        if($response->successful()){
            $admin = User::where('is_admin', true)->first();
            
            foreach($response->json()['data'] as $post){
                $p = new Post;
                $p->title = $post['title'];
                $p->description = $post['description'];
                $p->user_id = $admin->id;
                $p->publication_date = $post['publication_date'];
                $p->save();
            }

            return redirect()->back()->with('success', 'Posts have been successfully imported');
        }else{
            return redirect()->back()->with('error', 'Failed to fetch the posts');
        }
    }
}
