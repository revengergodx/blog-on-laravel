<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class PersonalIndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['commentsCount'] = Comment::all()->count();
        return view('personal.main.index', compact('data'));
    }
}
