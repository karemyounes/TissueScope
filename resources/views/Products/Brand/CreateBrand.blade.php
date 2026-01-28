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

    @foreach ($errors as $error)
        <p>{{ $error }}</p>
    @endforeach
        
    <form class="form" action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <img style="display: none;" id="Avatar"  >
        <span id="alert" style="display: none;" > Sorry you can only Select image file </span>
        <input id="image" type="file" class="MainInput" placeholder="Brand Image" name="BrandLogo">
        <input type="text" class="MainInput" placeholder="Brand Name" name="BrandName">
        <input type="submit" value="submit" class="SubmitForm">
        <input type="text" id="path" name="path" hidden>
    </form>

    <script>
        window.Path = {
            path: "Brands"
        }
    </script>
    <script type="module" src="{{ asset('js/ImageFunctions/ShowImageInAvatarWhenUploadIt.js') }}" ></script>

</body>
</html>