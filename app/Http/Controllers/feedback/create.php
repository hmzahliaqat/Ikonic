<?php

namespace App\Http\Controllers\feedback;

use App\Http\Controllers\Controller;
use App\Models\feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class create extends Controller
{
    public function create(Request $request){

        $request->validate([
            'feedbackname'=>'required',
            'discription'=>'required',
            'category'=>'required',
        ]);


        feedbacks::create([
            'feedbackname'=>$request->feedbackname,
            'discription'=>$request->discription,
            'category'=>$request->category,
            'created_by'=>Auth::id(),
        ]);

    }
}
