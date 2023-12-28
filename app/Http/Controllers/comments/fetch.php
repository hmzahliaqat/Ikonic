<?php

namespace App\Http\Controllers\comments;

use App\Http\Controllers\Controller;
use App\Models\comments;
use Illuminate\Http\Request;

class fetch extends Controller
{
    public function fetch(){
$comments=comments::join('users','users.id','=','comments.created_by')->get();
return $comments;
    }
}
