<?php


namespace SalesProgram\Filters;


use SalesProgram\User;
use SalesProgram\Company;
use Illuminate\Http\Request;
use SalesProgram\CustomsAgency;


/**
* 
*/
class AgencyFilters extends Filters
{

	protected $filters = ['pais', 'search', 'uniqueSearch'];
	

	// protected function by($barcode)
	// {

	// 	// $this->builder->getQuery()->orders =[];

	// 	$cigar = Cigar::where('barcode', $barcode)->firstOrFail();

	// 	return $this->builder->where('id', $cigar->id)->orderBy('id', 'desc');
	// }

	protected function search($search)
	{

		$this->builder->getQuery()->orders =[];

		$Company = Company::where('company_types_id', 3)
					->where('name', 'LIKE', "%$search%")->firstOrFail();

		// dd($Company);

		// foreach ($Company as $item) {

			$agency = CustomsAgency::where('company_id', $Company->id)->firstOrFail();

			return $this->builder->where('id', $agency->id);
			
		// }

		

		//dd($agency);

		// return $Company;

        
		
        					 // ->orWhere('email', 'LIKE', "%$search%");
        					 
	}

	protected function pais($pais)
	{

		$this->builder->getQuery()->orders =[];

		// $cigar = Cigar::where('barcode', $search)
		// 		->orWhere('name', 'LIKE', "%$search%")
		// 		->orWhere('barcode', 'LIKE', "%$search%")
  //              	->orWhere('netWeight', 'LIKE', "%$search%")
  //              	->orWhere('unitsInPresentation', 'LIKE', "%$search%");

        // return $this->builder->where('barcode', $search)
        					 // ->orWhere('name', 'LIKE', "%$search%");
		return $this->builder->where('countries_id', $pais);
        					 // ->orWhere('email', 'LIKE', "%$search%");
        					 
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