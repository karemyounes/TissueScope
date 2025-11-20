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

    <form class="SearchBar" action="{{ route('brand.index') }}" method="GET">
        @csrf

        <input type="text"      placeholder="Brand Name"     name="BrandName"     value="{{ request('BrandName') }}" >

        <button>submit</button>

    </form>

    {{-- End Of Search Form --}}

    <div class="Container">
        @foreach ($Brands as $Brand)
            <div class="card">

                @if($Brand['BrandLogo'])
                    <img src="{{asset('storage/' . $Brand['BrandLogo'] )}}" alt="shit">
                @else 
                    <img src="{{asset('storage/NoImage.png')}}" alt="shit">  
                @endif

                <div class="FirstRow">
                    <span> {{$Brand['BrandName']}} </span>
                </div>

                <form action="{{ route('brand.show', $Brand->BrandId) }}" method="GET" >
                    @csrf
                    <button>Click Me</button>
                </form>
            </div>
        @endforeach
    </div>

</body>
</html>