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

    <form class="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" class="MainInput" placeholder="Product Image" name="ProductImage">

        <label for="Categories">Choose a Category Name:</label>
        <select id="Categories" name="CategoryId">

            @foreach ($Categories as $Category )
                <option value="{{ $Category->CategoryId }}"> {{ $Category->CategoryName }} </option>
            @endforeach

        </select>

        <input type="text" class="MainInput" placeholder="Product Name" name="ProductName">
        <input type="text" class="MainInput" placeholder="Buying Price" name="BuyingPrice">
        <input type="text" class="MainInput" placeholder="Selling Price" name="SellingPrice">
        <input type="text" class="MainInput" placeholder="Barcode" name="Barcode">
        <input type="text" class="MainInput" placeholder="Description" name="Description">
        <input type="submit" value="submit" class="SubmitForm">

    </form>
</body>
</html>