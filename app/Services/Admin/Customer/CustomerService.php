<?php

namespace App\Services\Admin\Customer; 

use App\Models\Admin\Customers\Customer;

class CustomerService {

    public function Search($request) {
        $query = Customer::query() ;

        if($request->filled('CustomerName')) {
            $query = $query->where('CustomerName', 'like' ,'%' . $request->CustomerName . '%');
        }

        if($request->filled('CustomerPhone')) {
            $query = $query->where('CustomerPhone', 'like' ,'%' . $request->CustomerPhone . '%');
        }

        if($request->filled('CustomerMail')) {
            $query = $query->where('CustomerMail', 'like' ,'%' . $request->CustomerMail . '%');
        }

        if($request->filled('CustomerGender')) {
            $query = $query->where('CustomerGender', 'like' ,'%' . $request->CustomerGender . '%');
        }

        $query = $query->get();

        return $query ;
    }

    public function index($request) {

        if(count($request->all()) == 0) {
            return Customer::get();
        }else {
            return $this->Search($request);
        }

    }

    public function create($request) {

        Customer::create([
            'CustomerName'          => $request['CustomerName'],
            'CustomerPhone'         => $request['CustomerPhone'],
            'CustomerMail'          => $request['CustomerMail'],
            'CustomerGender'        => $request['CustomerGender'],
        ]);

    }

    public function update($request, $id) {

        Customer::whereKey($id)->update([
            'CustomerName'          => $request['CustomerName'],
            'CustomerPhone'         => $request['CustomerPhone'],
            'CustomerMail'          => $request['CustomerMail'],
            'CustomerGender'        => $request['CustomerGender'],
        ]);

    }

    public function delete($id) {
        Customer::whereKey($id)->delete();
    }

}