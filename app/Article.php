<?php

namespace SalesProgram;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable=[

    'title',
    'body',
    'published_at',
    'user_id' //Temporarly.

    ];

    protected $dates=['published_at'];


    public function scopePublished($query){


    	$query->where('published_at', '<=', Carbon::now());

    }

     public function scopeUnpublished($query){


    	$query->where('published_at', '>', Carbon::now());

    }


    public function setPublishedAtAttribute($date){


    	$this->attributes['published_at']= Carbon::createFromFormat('Y-m-d', $date);
    }


    public function getPublishedAtAttribute($date){

    return  Carbon::parse($date);


    }


    public function user(){

        return $this->belongsTo('SalesProgram\User');
    }

    public function comments(){

        return $this->hasMany(Comment::class);
    }

    public function addComment($body){


        $this->comments()->create(['body' => $body, 'user_id' => Auth::user()->id]);


//       The following code also works!
//        Comment::create(['article_id' => $this->id, 'user_id' => Auth::user()->id, 'body' => $body,]);
    }

    public function scopeFilter($query, $filters){


        if ($month = $filters['month']){

            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']){

            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }


    public static function archives(){


        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

    }





    /**
    *
    *Get the tags associated with the given article.
    *
    *@return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */

    public function tags()
    {
        return $this->belongsToMany('SalesProgram\Tag')->withTimestamps();

    }


    /*
    *Get a list of tag ids associated with the current article.
    *
    *@return Array
    *
    */

    public function getTagListAttribute(){

        return $this->tags->pluck('id');

    }
}
