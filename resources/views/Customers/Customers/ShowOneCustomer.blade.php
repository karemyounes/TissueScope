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

        <div class="Data">

            <div class="FirstColumn">

                <div class="Field">
                    <span>Customer Name: </span>
                    <span>{{ $Customer->CustomerName }}</span>
                </div>
                <div class="Field">
                    <span>Customer Phone: </span>
                    <span>{{ $Customer->CustomerPhone }}</span>
                </div>
                <div class="Field">
                    <span>Customer Mail: </span>
                    <span>{{ $Customer->CustomerMail }}</span>
                </div>
                <div class="Field">
                    <span>Customer Gender: </span>
                    <span>{{ $Customer->CustomerGender }}</span>
                </div>

                <div class="Controller">

                    <form action="{{ route('customer.edit',$Customer->CustomerId) }}" method="get">
                        
                        <button class="Update"> Update </button>
                    </form>

                    <form action="{{ route('customer.destroy',$Customer->CustomerId) }}" method="POST">
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