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

        <img src="{{ asset('storage/' . $Product['ProductImage']) }}" alt="">

        <div class="Data">

            <div class="FirstColumn">

                <div class="Field">
                    <span>Category Name: </span>
                    <span>{{ $Product->Category->CategoryName }}</span>
                </div>

                <div class="Field">
                    <span>Product Name: </span>
                    <span>{{ $Product->ProductName }}</span>
                </div>

                <div class="Controller">

                    <form action="{{ route('product.edit',$Product->ProductId) }}" method="get">
                        <button class="Update"> Update </button>
                    </form>

                    <form action="{{ route('product.destroy',$Product->ProductId) }}" method="POST">
                        @csrf
                        <button class="Delete"> Delete </button>
                        @method('DELETE')
                    </form>

                </div>
                
            </div>0

            <div class="SecondColumn">

                <div class="Field">
                    <span>Buying Price: </span>
                    <span>{{ $Product->BuyingPrice }} SAR</span>
                </div>

                <div class="Field">
                    <span>Selling Price: </span>
                    <span>{{ $Product->SellingPrice }} SAR</span>
                </div>

                <div class="Field">
                    <span>Barcode: </span>
                    <span>{{ $Product->Barcode }}</span>
                </div>

            </div>
            
            <div class="LastColumn">
                <div class="Field">
                    <span>Description: </span>
                    <span>{{ $Product->Description }}</span>
                </div>
            </div>
            
        </div>

        
        

    </div>
</body>
</html>