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
    
    <form class="form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <img style="display: none;" id="Avatar" >
        <span id="alert" style="display: none;" > Sorry you can only Select image file </span>

        <div class="InputContainer">
            @error('path')
                <span class="Error"> {{ $errors->first('path') }} </span>
            @enderror

            <input id="image" type="file" class="MainInput" placeholder="Category Image" name="CategoryImage">
        </div>

        
        <label for="Brands">Choose a Brand Name </label>

        @if(count($Brands) == 0 )
            <span class="EmptyDrop"> You Must Enter Some Brands First </span>
        @else

            <select class="MainInput" id="Brands" name="BrandId">

                @foreach ($Brands as $Brand )
                    <option value="{{ $Brand->BrandId }}"> {{ $Brand->BrandName }} </option>
                @endforeach

            </select>

        @endif
        
        <div class="InputContainer">
            @error('CategoryName')
                <span class="Error"> {{ $errors->first('CategoryName') }} </span>
            @enderror

            <input type="text" class="MainInput" placeholder="Category Name" name="CategoryName" value="{{old('CategoryName')}}">
        </div>
        

        <input type="submit" value="submit" class="SubmitForm">
        <input type="text" id="path" name="path" hidden>

    </form>
    <script>
        window.Path = {
            path: 'Categories'
        }
    </script>
    <script type="module" src="{{ asset('js/ImageFunctions/ShowImageInAvatarWhenUploadIt.js') }}" ></script>
</body>
</html>