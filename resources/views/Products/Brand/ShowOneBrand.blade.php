<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Products/ShowOneProduct.css') }}">
</head>
<body>

    <nav>
        @include('Layouts.NavBar')
    </nav>

    
    <div class="Container">

        <img src="{{ asset('storage/' . $Brand['BrandLogo']) }}" alt="">

        <div class="Data">

            <div class="FirstColumn">

                <div class="Field">
                    <span>Brand Name: </span>
                    <span>{{ $Brand->BrandName }}</span>
                </div>

                <div class="Controller">

                    <form action="{{ route('brand.edit',$Brand->BrandId) }}" method="get">
                        
                        <button class="Update"> Update </button>
                    </form>

                    <form action="{{ route('brand.destroy',$Brand->BrandId) }}" method="POST">
                        @csrf
                        <button class="Delete"> Delete </button>
                        @method('DELETE')
                    </form>

                </div>
                
            </div>
            
        </div>

        
        

    </div>
</body>
</html>