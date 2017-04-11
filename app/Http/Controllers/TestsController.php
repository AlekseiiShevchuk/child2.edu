<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestsController extends Controller
{
    public function showLesson(Request $request, Lesson $lesson)
    {
        if($request->exists('slide')){
            $slide = $lesson->slides[$request->get('slide')-1];
        }else{
            $slide = $lesson->slides[0];
        }
        return view('tests.lesson')->with(['lesson'=>$lesson, 'slide' => $slide]);
    }
}
