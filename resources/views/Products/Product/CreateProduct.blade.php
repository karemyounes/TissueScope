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

    <form class="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <img style="display: none;" id="Avatar" >
        <span id="alert" style="display: none;" > Sorry you can only Select image file </span>

        <div class="InputContainer">
            @error('path')
                <span class="Error"> {{ $errors->first('path') }} </span>
            @enderror

            <input id="image" type="file" class="MainInput" placeholder="Product Image" name="ProductImage">
        </div>

        <label for="Categories">Choose a Category Name:</label>

         @if(count($Categories) == 0 )
            <span class="EmptyDrop"> You Must Enter Some Brands First </span>
        @else
            <select class="MainInput" id="Categories" name="CategoryId">
                @if(count($Categories) == 0)
                    <option value="no categories"> we don't have any categories </option>
                @else
                    @foreach ($Categories as $Category )
                        <option value="{{ $Category->CategoryId }}"> {{ $Category->CategoryName }} </option>
                    @endforeach
                @endif

            </select>
        @endif

        <div class="InputContainer">
            @error('ProductName')
                <span class="Error"> {{ $errors->first('ProductName') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Product Name" name="ProductName" value="{{old('ProductName')}}">
        </div>
    
        <div class="InputContainer">
            @error('BuyingPrice')
                <span class="Error"> {{ $errors->first('BuyingPrice') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Buying Price" name="BuyingPrice" value="{{old('BuyingPrice')}}">
        </div>

        <div class="InputContainer">
            @error('SellingPrice')
                <span class="Error"> {{ $errors->first('SellingPrice') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Selling Price" name="SellingPrice" value="{{old('SellingPrice')}}">
        </div>

        <div class="InputContainer">
            @error('Barcode')
                <span class="Error"> {{ $errors->first('Barcode') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Barcode" name="Barcode" value="{{old('Barcode')}}">
        </div>

        <div class="InputContainer">
            @error('Description')
                <span class="Error"> {{ $errors->first('Description') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Description" name="Description" value="{{old('Description')}}">
        </div>
        
        <input type="submit" value="submit" class="SubmitForm">
        <input type="text" id="path" name="path" hidden>

    </form>
    <script>
        window.Path = {
            path: 'Products'
        }
    </script>
    <script type="module" src="{{ asset('js/ImageFunctions/ShowImageInAvatarWhenUploadIt.js') }}" ></script>
</body>
</html>