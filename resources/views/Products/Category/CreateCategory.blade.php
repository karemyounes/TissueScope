<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Layouts/MainInput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Products/CreateProduct.css') }}">
</head>
<body>


    <nav>
        @include('Layouts.NavBar')
    </nav>
    {{ $Brands }}
    <form class="form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="file" class="MainInput" placeholder="Category Image" name="CategoryImage">
        
        <label for="Brands">Choose a Brand Name:</label>
        <select id="Brands" name="BrandId">

            @foreach ($Brands as $Brand )
                <option value="{{ $Brand->BrandId }}"> {{ $Brand->BrandName }} </option>
            @endforeach

        </select>
        
        <input type="text" class="MainInput" placeholder="Category Name" name="CategoryName">

        <input type="submit" value="submit" class="SubmitForm">

    </form>
</body>
</html>