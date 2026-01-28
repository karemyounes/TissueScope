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

    <form class="form" action="{{ route('Signup') }}" method="POST">
        @csrf

        <input type="text" class="MainInput" placeholder="E_Mail" name="email">
        <input type="password" class="MainInput" placeholder="Password" name="password">
        
        <div class="btns">
            <input type="submit" value="Login" class="SubmitForm">
            <input id="SignUp" type="submit" value="SignUp" class="SubmitForm">
        </div>
        
    <script>
        let SignUpBtn = document.getElementById('SignUp');
        SignUpBtn.onclick = function(e) {
            e.preventDefault();
            let url = "{!! route('createUser') !!}";
            document.location.href = url;
        }
    </script>
    
    </form>
</body>
</html>