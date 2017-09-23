<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;

use SalesProgram\Article;

use SalesProgram\Comment;

use Illuminate\Support\Facades\Auth;






class CommentsController extends Controller
{
    public function store(Article $article){

        $this->validate(request(),['body' => 'required|min:2']);

        $article->addComment(request('body'));

        return back();

    }
}
