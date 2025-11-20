<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Layouts/MainInput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Products/Brand/CreateBrand.css') }}">
</head>
<body>

    <nav>
        @include('Layouts.NavBar')
    </nav>

    @foreach ($errors as $error)
        <p>{{ $error }}</p>
    @endforeach
        
    <form class="form" action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" class="MainInput" placeholder="Brand Image" name="BrandLogo">
        <input type="text" class="MainInput" placeholder="Brand Name" name="BrandName">
        <input type="submit" value="submit" class="SubmitForm">

    </form>

</body>
</html>