<?php


namespace SalesProgram\Repositories;


use SalesProgram\Article;


class Articles{

    public function all(){

        return Article::all();

    }



}