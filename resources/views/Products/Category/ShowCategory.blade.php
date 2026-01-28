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

    <form class="SearchBar" action="{{ route('category.index') }}" method="GET">

        <input type="text"      placeholder="Category Name"     name="CategoryName"     value="{{ request('CategoryName') }}" >
        <input type="text"      placeholder="Product Name"      name="ProductName"      value="{{ request('ProductName') }}" >
        <input type="text"      placeholder="BarCode"           name='Barcode'          value="{{ request('Barcode') }}" >
        <input type="number"    placeholder="Starting Price"    name="StartingPrice"    value="{{ request('StartingPrice') }}">
        <input type="number"    placeholder="Ending Price"      name="EndingPrice"      value="{{ request('EndingPrice') }}">


        <button class="SearchBarSubmit">submit</button>

    </form>

    {{-- End Of Search Form --}}


    @if(count($Categories) == 0)

        @include('Layouts.EmptyPages')

    @else

    <div class="Container">
        @foreach ($Categories as $Category)
            <div class="card">
                @if($Category['CategoryImage'])
                    <img src="{{asset('storage/' . $Category['CategoryImage'] )}}" alt="shit">
                @else 
                    <img src="{{asset('storage/NoImage.png')}}" alt="shit">  
                @endif

                <div class="FirstRow">
                    <span> {{$Category['CategoryName']}} </span>
                </div>

                <div class="FirstRow">
                    <span>{{$Category['Brand']['BrandName']}} SAR</span>
                </div>

                <form action="{{ route('category.show', $Category->CategoryId) }}" method="GET" >
                    @csrf
                    <button>Click Me</button>
                </form>
            </div>
        @endforeach
    </div>
    
    @endif
    

</body>
</html>