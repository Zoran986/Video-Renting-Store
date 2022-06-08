<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index() 
    {  
        $videos = Video::all();

        return view('videos.list', compact('videos'));
    }

    public function rent($id) 
    {
        $user = Auth::user();

        $video = Video::find($id);
        if(!$video)
        return redirect('/videos')->with('error', 'Video not found!!');

        if($user->credit < $video->cost)
        return redirect('/videos')->with('error', 'Not enough credit');

        $user->credit = $video->cost;
        $user->save();

        $video->user_id = $user->id;
        $video->save();

       


        return redirect('/videos')->with('success', 'Video rented!!');
    }

    public function return($id)
        {
            $video = Video::find($id);
            if(!$video)
                return redirect('/videos')->with('error', 'Video not found!!');

            if($video->user_id == Auth::user()->id)
                $video->user_id = null;

            $video->save();

            return redirect('/videos')->with('success', 'Video returned!!');
        }
    
}
