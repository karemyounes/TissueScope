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

    <form class="SearchBar" action="{{ route('store.index') }}" method="GET">

        <input type="text"      placeholder="Store Name"        name="StoreName"        value="{{ request('StoreName') }}" >
        <input type="text"      placeholder="Store Address"     name="StoreAddress"     value="{{ request('StoreAddress') }}" >
        <input type="text"      placeholder="StorePhone"        name="StorePhone"       value="{{ request('StorePhone') }}" >
        <input type="text"      placeholder="StoreCode"         name="StoreCode"        value="{{ request('StoreCode') }}" >

        <button>submit</button>

    </form>

    {{-- End Of Search Form --}}

    @if(count($Stores) == 0)

        @include('Layouts.EmptyPages')

    @else

    <div class="Container">
        @foreach ($Stores as $Store)
            <div class="card">

                <div class="FirstRow">
                    <span> {{$Store['StoreName']}} </span>
                </div>
                <div class="FirstRow">
                    <span> {{$Store['StorePhone']}} </span>
                </div>
                <div class="FirstRow">
                    <span> {{$Store['StoreAddress']}} </span>
                </div>
                <div class="FirstRow">
                    <span> {{$Store['StoreCode']}} </span>
                </div>

                <form action="{{ route('store.show', $Store->StoreId) }}" method="GET" >
                    <button>Click Me</button>
                </form>
            </div>
        @endforeach
    </div>

    @endif

</body>
</html>