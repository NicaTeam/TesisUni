<?php


namespace SalesProgram\Filters;


use SalesProgram\User;
use SalesProgram\Cigar;
use Illuminate\Http\Request;


/**
* 
*/
class UserFilters extends Filters
{

	protected $filters = ['by', 'search', 'uniqueSearch'];
	

	// protected function by($barcode)
	// {

	// 	// $this->builder->getQuery()->orders =[];

	// 	$cigar = Cigar::where('barcode', $barcode)->firstOrFail();

	// 	return $this->builder->where('id', $cigar->id)->orderBy('id', 'desc');
	// }

	protected function search($search)
	{

		$this->builder->getQuery()->orders =[];

		// $cigar = Cigar::where('barcode', $search)
		// 		->orWhere('name', 'LIKE', "%$search%")
		// 		->orWhere('barcode', 'LIKE', "%$search%")
  //              	->orWhere('netWeight', 'LIKE', "%$search%")
  //              	->orWhere('unitsInPresentation', 'LIKE', "%$search%");

        // return $this->builder->where('barcode', $search)
        					 // ->orWhere('name', 'LIKE', "%$search%");
		return $this->builder->where('name', 'LIKE', "%$search%")
        					 ->orWhere('email', 'LIKE', "%$search%");
        					 
	}



	// protected function uniqueSearch($brandGroup, $unit)
	// {

	// 	$this->builder->getQuery()->orders =[];

	// 	$cigar = Cigar::where('brand_groups_id', $brandGroup)->where('unit_of_measurements_id', $unit)->get();

	// 	dd($cigar);


	// }

	// protected function unitOfMeasurement($unit)
	// {

	// 	$cigar = Cigar::where('unit_of_measurements_id', $unit)->get();

	// 	dd($cigar);


	// }




}