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

        <input type="text"      placeholder="Category Name"     name="CategoryName"     value="{{ request('CategoryName') }}" >
        <input type="text"      placeholder="Product Name"      name="ProductName"      value="{{ request('ProductName') }}" >
        <input type="text"      placeholder="BarCode"           name='Barcode'          value="{{ request('Barcode') }}" >
        <input type="number"    placeholder="Starting Price"    name="StartingPrice"    value="{{ request('StartingPrice') }}">
        <input type="number"    placeholder="Ending Price"      name="EndingPrice"      value="{{ request('EndingPrice') }}">


        <button>submit</button>

    </form>

    {{-- End Of Search Form --}}

    {{-- Check If Products are Empty retrieve empty page --}}

    @if(count($Products) == 0)

        @include('Layouts.EmptyPages')

    @else
        
        <div class="Container">
            @foreach ($Products as $Product)
                <div class="card">

                    @if($Product['ProductImage'])
                        <img src="{{asset('storage/' . $Product['ProductImage'] )}}" alt="shit">
                    @else 
                        <img src="{{asset('storage/NoImage.png')}}" alt="shit">  
                    @endif

                    <div class="column First">

                        <div class="element">
                            <span> Name </span>
                            <span> {{$Product['ProductName']}} </span>
                        </div>

                        <div class="element">
                            <span> Category </span>
                            <span> {{$Product['Category']['CategoryName']}} </span>
                        </div>

                        <div class="element">
                            <span> Barcode </span>
                            <span> {{$Product['Barcode']}} </span>
                        </div>         

                    </div>

                    <div class="column Second">
                        <span> Description </span>
                        <span>{{$Product['Description']}}</span>

                    </div>

                    <div class="column Third">

                        <div class="element">
                            <span> Buying Price </span>
                            <span>{{$Product['BuyingPrice']}} SAR</span>
                        </div>

                        <div class="element">
                            <span> Selling Price </span>
                            <span>{{$Product['SellingPrice']}} SAR</span>
                        </div>

                        <form action="{{ route('product.show', $Product->ProductId) }}" method="GET" >

                            @csrf
                            <button>Click Me</button>

                        </form>

                    </div>

                    
                </div>
            @endforeach
        </div>
   
    @endif

</body>
</html>