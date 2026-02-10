<?php

namespace App\Services\Admin\Store;

use App\Models\Admin\Stores\Stores;

class StoreServices {

    public function search ($request) {

        $query = Stores::query();

        $request->filled('StoreName') ? $query->where('StoreName' , 'like' , '%' . $request->StoreName . '%') : ''; 

        $request->filled('StoreAddress') ? $query->where('StoreAddress' , 'like' , '%' . $request->StoreAddress . '%') : '';

        $request->filled('StorePhone') ? $query->where('StorePhone' , 'like' , '%' . $request->StorePhone . '%') : '';

        $request->filled('StoreCode') ? $query->where('StoreCode' , 'like' , '%' . $request->StoreCode . '%') : ''; 

        return $query->get() ;

    }

    public function index ($request) {

       return count($request->all()) == 0 ? Stores::get() : $this->search($request) ;

    }

    public function create ($request) {
        Stores::create([
            'StoreName'         => $request->StoreName,
            'StoreAddress'      => $request->StoreAddress,
            'StorePhone'        => $request->StorePhone,
            'StoreCode'         => $request->StoreCode,
            'IsBranch'          => 0,
        ]);
    }

    public function update ($request , $Store) {
        Stores::whereKey($Store->StoreId)->update([
            'StoreName'         => $request->StoreName,
            'StoreAddress'      => $request->StoreAddress,
            'StorePhone'        => $request->StorePhone,
            'StoreCode'         => $request->StoreCode,
            'IsBranch'          => 0,
        ]);
    }

    public function delete ($Store) {
        $Store -> delete() ;
    }

}