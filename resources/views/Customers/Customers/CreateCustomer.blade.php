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
        
    <form class="form" action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="InputContainer">
            @error('CustomerName')
                <span class="Error"> {{ $errors->first('CustomerName') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Customer Name" name="CustomerName" value="{{old('CustomerName')}}">
        </div>

        <div class="InputContainer">
            @error('CustomerPhone')
                <span class="Error"> {{ $errors->first('CustomerPhone') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Customer Phone" name="CustomerPhone" value="{{old('CustomerPhone')}}">
        </div>

        <div class="InputContainer">
            @error('CustomerMail')
                <span class="Error"> {{ $errors->first('CustomerMail') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Customer Mail" name="CustomerMail" value="{{old('CustomerMail')}}">
        </div>

        <div class="InputContainer">
            @error('CustomerGender')
                <span class="Error"> {{ $errors->first('CustomerGender') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Customer Gender" name="CustomerGender" value="{{old('CustomerGender')}}">
        </div>

        <input type="submit" value="submit" class="SubmitForm">

    </form>

</body>
</html>