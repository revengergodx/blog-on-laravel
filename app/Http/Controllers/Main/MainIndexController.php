<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class MainIndexController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('post.index');
    }
}
