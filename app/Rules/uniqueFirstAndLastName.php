<?php


namespace SalesProgram\Rules;
use DB;

class uniqueFirstAndLastName{



    public function passes($attribute, $value, $parameters, $validator){

            $count = DB::table('people')->where('name', $value)
                ->where('lastName', $parameters[0])
                ->count();

            return $count === 0;

    }
}