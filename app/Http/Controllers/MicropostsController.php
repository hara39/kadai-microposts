<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }    
            return view('welcome', $data);
        
    }


/*
            $data += $this->counts($user);
            return view('users.show', $data);
        }
        else {
            return view('welcome');
        }
*/        
/*
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->feed_microposts()->orderBy('create_at', 'desc')->paginate(10);
            
            $data =[
                'user' => $user,
                'microposts' => $microposts,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
        }
        else {
            return view('welcome');
        }
*/

    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            ]);
            
            return redirect()->back();
    }
    
    public function destoroy($id)
    {
        $microposts = \App\Micropost::find($id);
        
        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }
        
        return redirect()->back();
    }
    

}
