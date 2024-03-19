<?php
namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class InvoiceFilter extends ApiFilter{

    //Rellenaremos los array
    protected $safeParams =[
        'customerId' => ['eq'],
        'amount' => ['eq','gt', 'gte','lt','lte'],
        'status' => ['eq', 'ne'],
        'billedDated' => ['eq','gt', 'gte','lt','lte'],
        'paidDated' => ['eq','gt', 'gte','lt','lte'],

    ]; 
    protected $columnMap =[
        'customerId' => 'customer_id', 
        'billedDated' => 'billed_dated', 
        'paidDated' => 'paid_dated', 

    ]; //mapear columnas a como queremos que se filtren 
    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='

    ]; //mapeo de los ordenadores 

    //hereda de ApiFilter las funciones


}