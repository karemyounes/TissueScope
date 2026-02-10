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

    <form class="SearchBar" action="{{ route('customer.index') }}" method="GET">

        <input type="text"      placeholder="Customer Name"     name="CustomerName"     value="{{ request('CustomerName') }}" >
        <input type="text"      placeholder="Customer Phone"    name="CustomerPhone"    value="{{ request('CustomerPhone') }}" >
        <input type="text"      placeholder="Customer Mail"     name="CustomerMail"     value="{{ request('CustomerMail') }}" >
        <input type="text"      placeholder="Customer Gender"   name="CustomerGender"   value="{{ request('CustomerGender') }}" >

        <button>submit</button>

    </form>

    {{-- End Of Search Form --}}

    @if(count($Customers) == 0)

        @include('Layouts.EmptyPages')

    @else

    <div class="Container">
        @foreach ($Customers as $Customer)
            <div class="card">

                <div class="FirstRow">
                    <span> {{$Customer['CustomerName']}} </span>
                </div>
                <div class="FirstRow">
                    <span> {{$Customer['CustomerPhone']}} </span>
                </div>
                <div class="FirstRow">
                    <span> {{$Customer['CustomerMail']}} </span>
                </div>
                <div class="FirstRow">
                    <span> {{$Customer['CustomerGender']}} </span>
                </div>

                <form action="{{ route('customer.show', $Customer->CustomerId) }}" method="GET" >
                    <button>Click Me</button>
                </form>
            </div>
        @endforeach
    </div>

    @endif

</body>
</html>