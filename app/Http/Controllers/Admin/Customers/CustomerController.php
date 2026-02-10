<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Models\Admin\Customers\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\Customer\CustomerService;
use App\Http\Requests\Admin\CreateCustomerRequest;

class CustomerController extends Controller
{

    protected CustomerService $customerService ;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService ; 
    }

    public function index(Request $request)
    {
        $Customers = $this->customerService->index($request);
        
        return view('Customers.Customers.ShowCustomers', compact('Customers'));
    }

    public function create() {
        return view('Customers.Customers.CreateCustomer');
    }


    public function store(CreateCustomerRequest $request)
    {
        $this->customerService->create($request->validated());

        return redirect()->route('customer.index') ;
    }

    public function show($id)
    {
        $Customer = Customer::find($id);

        return view('Customers.Customers.ShowOneCustomer', compact('Customer'));
    }

    public function edit($id) {
        $Customer = Customer::findOrFail($id);

        return view('Customers.Customers.EditCustomer' , compact('Customer'));
    }

    public function update(CreateCustomerRequest $request, $id)
    {
        $this->customerService->update($request->validated() , $id);

        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $this->customerService->delete($id);

        return redirect()->route('customer.index');
    }
}
