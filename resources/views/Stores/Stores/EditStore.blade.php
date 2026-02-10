<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Products/CreateProduct.css') }}">
</head>
<body>

    <nav>
        @include('Layouts.NavBar')
    </nav>
        
    <form class="form" action="{{ route('store.update',$Store->StoreId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="text" class="MainInput" placeholder="Store Name"       name="StoreName"        value="{{$Store->StoreName}}">
        <input type="text" class="MainInput" placeholder="Store Phone"      name="StorePhone"       value="{{$Store->StorePhone}}">
        <input type="text" class="MainInput" placeholder="StoreAddress"     name="StoreAddress"     value="{{$Store->StoreAddress}}">
        <input type="text" class="MainInput" placeholder="Store Code"       name="StoreCode"        value="{{$Store->StoreCode}}">

        <input type="submit" value="submit" class="SubmitForm">

    </form>

</body>
</html>
