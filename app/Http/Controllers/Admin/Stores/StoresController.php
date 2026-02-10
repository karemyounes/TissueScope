<?php

namespace App\Http\Controllers\Admin\Stores;

use App\Models\Admin\Stores\Stores;
use App\Services\Admin\Store\StoreServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoresController extends Controller
{

    protected StoreServices $storeServices ;

    public function __construct(StoreServices $storeServices)
    {
        $this->storeServices = $storeServices ;
    }

    public function index(Request $request)
    {
        $Stores = $this->storeServices->index($request);

        return view('Stores.Stores.ShowStores', compact('Stores'));
    }

    public function create() {
        return view('Stores.Stores.CreateStore');
    }

    public function store(Request $request)
    {
        $this->storeServices->create($request);

        return redirect()->route('store.index');
    }

    public function show(Stores $Store)
    {
        return view('Stores.Stores.ShowOneStore',compact('Store'));
    }

    public function edit(Stores $Store) {
        return view('Stores.Stores.EditStore', compact('Store'));
    }

    public function update(Request $request, Stores $store)
    {
        $this->storeServices->update($request , $store);

        return redirect()->route('store.index');
    }

    public function destroy(Stores $Store)
    {
        $this->storeServices->delete($Store);

        return redirect()->route('store.index');
    }
}
