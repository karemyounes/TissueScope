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
                    <span>Store Name: </span>
                    <span>{{ $Store->StoreName }}</span>
                </div>
                <div class="Field">
                    <span>Store Phone: </span>
                    <span>{{ $Store->StorePhone }}</span>
                </div>
                <div class="Field">
                    <span>Store Address: </span>
                    <span>{{ $Store->StoreAddress }}</span>
                </div>
                <div class="Field">
                    <span>StoreCode: </span>
                    <span>{{ $Store->StoreCode }}</span>
                </div>

                <div class="Controller">

                    <form action="{{ route('store.edit',$Store->StoreId) }}" method="get">
                        
                        <button class="Update"> Update </button>
                    </form>

                    <form action="{{ route('store.destroy',$Store->StoreId) }}" method="POST">
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