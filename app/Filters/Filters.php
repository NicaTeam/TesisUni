<?php

namespace SalesProgram\Filters;


use SalesProgram\User;
use Illuminate\Http\Request;


abstract class Filters
{


	protected $request;

	protected $builder;

	protected $filters = [];
	
	function __construct(Request $request)
	{
		$this->request = $request;
	}


	public function apply($builder)
	{

		// dd($this->builder);

		$this->builder = $builder;

		// dd($this->request->all());

		// dd($this->request->only($this->filters));

		// dd($this->getFilters());

		foreach ($this->getFilters() as $filter=>$value) {

			if(method_exists($this, $filter)){

				$this->$filter($value);

			}

			// $this->$filter($this->request->$filter);
			
		}

		// if($this->request->has('by')){
		// 	$this->by($this->request->by);
		// }
		// if(! $username = $this->request->by) return $builder;
		// return $this->by($username);
		return $this->builder;
        //  $user = User::where('name', $username)->firstOrFail();
        // return  $builder->where('user_id', $user->id);
        
	}

	public function getFilters()
	{

		return $this->request->intersect($this->filters);
	}

	protected function hastFilter($filter)
	{

		return method_exists($this, $filter) && $this->request->has($filter);
	}
}