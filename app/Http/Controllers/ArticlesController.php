<?php

namespace SalesProgram\Http\Controllers;

use Illuminate\Http\Request;
use SalesProgram\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use SalesProgram\Article;
use SalesProgram\Http\Requests\ArticleFormRequest;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use SalesProgram\Tag;
use SalesProgram\Repositories\Articles;



class ArticlesController extends Controller
{
    /*
    *Create a new articles controller instance.
    *
    *@var 
    *
    */

    public function __construct(){
        $this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['except' => 'index']);

    }



    /*
    *Show all articles.
    *
    *@return Response
    *
    */


    public function index(Articles $articles){
    	//$articles = DB::table('articles')->latest()->get();

    	//return view('Pages.articles', compact('articles'));

// This is the code that was working.
        //$articles = Article::latest('published_at')->Published()->get();
        //$latest = Article::latest()->first();


        $articles = Article::latest()->filter(request(['month', 'year']))->get();


        //$archives = Article::archives();


    	//return view('articles.index')->with('articles', $articles);
        return view('articles.index', compact('articles', 'latest', 'archives'));

    }




    public function show(Article $article){

//    	$article = Article::findOrFail($id);

        $archives = Article::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        //dd($article->published_at->diffForHumans());
    	return view('articles.show', compact('article', 'archives'));

    }





    public function create(){

        $tags = Tag::pluck('name', 'id');
    	return view('articles.create', compact('tags'));
    }





    public function store(ArticleFormRequest $request){

        $this->createArticle($request);
        flash()->overlay('Your article has been created!', 'Good Job');
        return Redirect::to('articles');

    }




    public function edit($id){

        $article = Article::findOrFail($id);
         $tags = Tag::pluck('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }




    public function update($id, ArticleFormRequest $request){
       $article = Article::findOrFail($id);
       $article->update($request->all());
        //$article->tags()->sync($request->input('tag_list'));
       $this->syncTags($article, $request->input('tag_list'));
       return Redirect::to('articles');
    }


    /*
    *Sync up the list of tags in the database
    *
    *@param Article $article
    *@param array $tags
    */

    private function syncTags(Article $article, array $tags){


        $article->tags()->sync($tags);

    }


    /*
    *Save a new article
    *
    *@var 
    *
    */

    private function createArticle( ArticleFormRequest $request){


        //$article = new Article;
        //$article->title = $request->get('title');
        //$article->body= $request->get('body');
        //$article->published_at=$request->get('published_at');
        //$article->published_at= Carbon::now();
        //$article->save();
        //Article::create($request->all());
        //$article = new Article($request->all());
        //Auth::User()->articles()->save($article);

        //$article = Auth::user()->articles()->create($request->all());

        $article = auth()->user()->publish(new Article(request(['title', 'body', 'published_at'])));

        //$tagsIds = $request->input('tag_list');
        //$article->tags()->attach($tagsIds);

         $this->syncTags($article, $request->input('tag_list'));

         return $article;

    }



    public function junior(){
        return view('articles.junior');
    }
}
