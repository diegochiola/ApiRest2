<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Filters\CustomerFilter; // Importa la clase CustomerFilter
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         // Crea una instancia de CustomerFilter
         $filter = new CustomerFilter();
 
         // Transforma la solicitud de filtrado en una matriz de elementos de consulta
         $queryItems = $filter->transform($request);
         $includeInvoices = $request->query('includeInvoices');
        
         
         // Aplica los filtros a la consulta de clientes
         $customers = Customer::where($queryItems);
         if ($includeInvoices){
            $customers = $customers->with('invoices');
         }
 
         // Retorna la colección de clientes paginada junto con los parámetros de la solicitud
         return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        $includeInvoices = request()->query('includeInvoices');
        if($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices')); // que cargue el model con la relacion invoices una vez que haya cartgado el valor de customer
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
