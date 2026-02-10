<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Products/CreateProduct.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Layouts/Avatar.css') }}">
</head>
<body>

    <nav>
        @include('Layouts.NavBar')
    </nav>
        
    <form class="form" action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="InputContainer">
            @error('StoreName')
                <span class="Error"> {{ $errors->first('StoreName') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Store Name" name="StoreName" value="{{old('StoreName')}}">
        </div>

        <div class="InputContainer">
            @error('StorePhone')
                <span class="Error"> {{ $errors->first('StorePhone') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Store Phone" name="StorePhone" value="{{old('StorePhone')}}">
        </div>

        <div class="InputContainer">
            @error('StoreAddress')
                <span class="Error"> {{ $errors->first('StoreAddress') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Store Address" name="StoreAddress" value="{{old('StoreAddress')}}">
        </div>

        <div class="InputContainer">
            @error('StoreCode')
                <span class="Error"> {{ $errors->first('StoreCode') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Store Code" name="StoreCode" value="{{old('StoreCode')}}">
        </div>

        <input type="submit" value="submit" class="SubmitForm">

    </form>

</body>
</html>