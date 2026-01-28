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
        
    <form class="form" action="{{ route('brand.update',$Brand->BrandId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <img  id="Avatar" src="{{ asset('storage/' . $Brand->BrandLogo) }}">
        <span id="alert" style="display: none;" > Sorry you can only Select image file </span>
        <input id="image" type="file" class="MainInput" placeholder="Brand Image" name="BrandLogo" >
        <input type="text" class="MainInput" placeholder="Brand Name" name="BrandName" value="{{$Brand->BrandName}}">
        <input type="submit" value="submit" class="SubmitForm">
        <input type="text" value="{{$Brand->BrandLogo}}" id="path" name="path" hidden>
    </form>

    <script>
        window.Path = {
            path: "Brands"
        }
    </script>
    <script type="module" src="{{ asset('js/ImageFunctions/ShowImageInAvatarWhenUploadIt.js') }}" ></script>

</body>
</html>
