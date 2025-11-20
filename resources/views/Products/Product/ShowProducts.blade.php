<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Products/ShowProduct.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Layouts/SearchBar.css') }}">
</head>
<body>

    <nav>
        @include('Layouts.NavBar')
    </nav>

    {{-- Start Of Search Form --}}

    <form class="SearchBar" action="{{ route('product.index') }}" method="GET">
        @csrf

        <input type="text"      placeholder="Category Name"     name="CategoryName"     value="{{ request('CategoryName') }}" >
        <input type="text"      placeholder="Product Name"      name="ProductName"      value="{{ request('ProductName') }}" >
        <input type="text"      placeholder="BarCode"           name='Barcode'          value="{{ request('Barcode') }}" >
        <input type="number"    placeholder="Starting Price"    name="StartingPrice"    value="{{ request('StartingPrice') }}">
        <input type="number"    placeholder="Ending Price"      name="EndingPrice"      value="{{ request('EndingPrice') }}">


        <button>submit</button>

    </form>

    {{-- End Of Search Form --}}

    <div class="Container">
        @foreach ($Products as $Product)
            <div class="card">

                @if($Product['ProductImage'])
                    <img src="{{asset('storage/' . $Product['ProductImage'] )}}" alt="shit">
                @else 
                    <img src="{{asset('storage/NoImage.png')}}" alt="shit">  
                @endif

                <div class="FirstRow">
                    <span> {{$Product['ProductName']}} </span>
                </div>

                <div class="FirstRow">
                    <span>{{$Product['BuyingPrice']}} SAR</span>
                </div>

                <div class="FirstRow">
                    <span>{{$Product['Description']}}</span>
                </div>
                <form action="{{ route('product.show', $Product->ProductId) }}" method="GET" >
                    @csrf
                    <button>Click Me</button>
                </form>
            </div>
        @endforeach
    </div>
   
    

</body>
</html>