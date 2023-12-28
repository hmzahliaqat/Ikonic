<?php

namespace App\Http\Controllers\feedback;

use App\Http\Controllers\Controller;
use App\Models\feedbacks;
use Illuminate\Http\Request;

class fetch extends Controller
{
    public function fetch(){
       $feedbacks=feedbacks::join('users','users.id','=','feedbacks.created_by')
       ->select('feedbacks.id as id','feedbacks.feedbackname as feedbackname',
       'feedbacks.discription as discription','feedbacks.category as category',
       'feedbacks.vote as vote','users.name as name','users.id as userId')->paginate(10);
       return $feedbacks;
        }

        public function feedbackItem($id){

            $item=feedbacks::find($id);
            return $item;

        }
}
