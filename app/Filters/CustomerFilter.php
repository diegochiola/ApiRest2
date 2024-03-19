<?php
namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class CustomerFilter extends ApiFilter{

    //Rellenaremos los array
    protected $safeParams =[
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt'] //equal, grather than

    ]; 
    protected $columnMap =[
        'postalCode' => 'postal_code', //equal, grather than

    ]; //mapear columnas a como queremos que se filtren 
    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='

    ]; //mapeo de los ordenadores 

    //hereda de ApiFilter las funciones


}