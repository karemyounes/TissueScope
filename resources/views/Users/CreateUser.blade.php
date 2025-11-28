<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Products/CreateProduct.css') }}">
</head>
<body>


    <nav>
        @include('Layouts.NavBar')
    </nav>

    <form class="form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" class="MainInput" placeholder="User Name" name="name">
        <input type="text" class="MainInput" placeholder="E_Mail" name="email">
        <input type="text" class="MainInput" placeholder="Password" name="password">
        
        <input type="submit" value="submit" class="SubmitForm">

    </form>
</body>
</html>