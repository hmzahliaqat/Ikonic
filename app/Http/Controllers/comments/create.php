<?php

namespace App\Http\Controllers\comments;

use App\Http\Controllers\Controller;
use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class create extends Controller
{
    public function create(Request $request,$id){

        // $request->validate([
        //     'Comment'=>'required'
        // ]);

comments::create([
    'body'=>$request->Comment,
    'created_by'=>Auth::id(),
    'feedbackId'=>$id,
]);
    }
}
