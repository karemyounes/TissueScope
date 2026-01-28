<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Products/CreateProduct.css') }}">
    <style>
        .btns {
            display:flex;
            align-items: center;
            justify-content: center;
        }

        .btns .SubmitForm {
            width: 180px ;
            margin: 0 20px;
        }
    </style>
</head>
<body>


    <nav>
        @include('Layouts.NavBar')
    </nav>

    <form class="form" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" class="MainInput" placeholder="User Name" name="name">
        <input type="text" class="MainInput" placeholder="E_Mail" name="email">
        <input type="password" class="MainInput" placeholder="Password" name="password">
        
        <div class="btns">
            <input type="submit" value="SignUp" class="SubmitForm">
            <input id="Login" type="submit" value="Login" class="SubmitForm">
        </div>
    </form>

    <script>
        let LoginBtn = document.getElementById('Login');
        LoginBtn.onclick = function(e) {
            e.preventDefault();
            let url = "{!! route('loginPage') !!}";
            document.location.href = url;
        }
    </script>
</body>
</html>