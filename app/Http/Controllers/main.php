<?php

namespace App\Http\Controllers;

use App\Models\feedbacks;
use App\Models\User;
use App\Models\votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class main extends Controller
{
    public function getAuth(){
        $user=Auth::user();
        return $user;
    }




    public function createVote($id){

        feedbacks::where('id',$id)->update(['vote'=>DB::raw('vote + 1')]);


        votes::create([
            'feedbackId'=>$id,
            'userId'=>Auth::id(),
        ]);

    }


    public function getVote($id){

        $votes=votes::where(['feedbackId'=>$id,'userId'=>Auth::id()])->get();
    return $votes;
    }


    public function getUsers(){
$users=User::all();
return $users;
    }

public function delUser($id){

    User::where('id',$id)->delete();

}


public function getFeed(){
    $f=feedbacks::all();

    return $f;
}

public function delf($id){
    feedbacks::where('id',$id)->delete();
}


public function getOtherUsers(){
   $u= User::where('id','!=',Auth::id())->get();
return $u;
}

public function disable($id){

    feedbacks::where('id',$id)->update(array('comments'=>1));
}
public function enable($id){

    feedbacks::where('id',$id)->update(array('comments'=>0));
}


}
