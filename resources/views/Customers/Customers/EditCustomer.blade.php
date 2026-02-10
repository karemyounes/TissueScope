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
        
    <form class="form" action="{{ route('customer.update',$Customer->CustomerId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="text" class="MainInput" placeholder="Customer Name"    name="CustomerName"     value="{{$Customer->CustomerName}}">
        <input type="text" class="MainInput" placeholder="Customer Phone"   name="CustomerPhone"    value="{{$Customer->CustomerPhone}}">
        <input type="text" class="MainInput" placeholder="Customer Mail"    name="CustomerMail"     value="{{$Customer->CustomerMail}}">
        <input type="text" class="MainInput" placeholder="Customer Gender"  name="CustomerGender"   value="{{$Customer->CustomerGender}}">

        <input type="submit" value="submit" class="SubmitForm">

    </form>

</body>
</html>
