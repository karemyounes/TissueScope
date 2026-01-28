@auth
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="{{ asset('css/Layouts/Nav.css') }}">
        </head>

        <body>
            <nav id="nav">
                <div class="logo">
                    <form id="LogoutForm" action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <span id="SubmitSpan">
                            Tissue<span class="S">S</span>cope
                        </span>
                    </form>
                    
                </div>

                <div class="btns" id="btns">

                    <div class="dropmenu">
                        <span class="btn" onclick="dropDown('Products')">Products</span>

                        <div class="menu" id="Products">
                            <a href="{{ route('brand.create') }}">Create Brand</a>
                            <a href="{{ route('brand.index') }}">View Brands</a>
                            <a href="{{ route('category.create') }}">Create Category</a>
                            <a href="{{ route('category.index') }}">View Categories</a>
                            <a href="{{ route('product.create') }}">Create Product</a>
                            <a href="{{ route('product.index') }}">View Products</a>
                        </div>
                    </div>

                    <div class="dropmenu">
                        <span class="btn" onclick="dropDown('Customers')">Customers</span>

                        <div class="menu" id="Customers">
                            {{-- <a href="{{ route('customer.create') }}">Create Customer</a> --}}
                            {{-- <a href="{{ route('customer.index') }}">View Customers</a> --}}
                        </div>
                    </div>

                    <div class="dropmenu">
                        <span class="btn" onclick="dropDown('Stores')">Stores</span>

                        <div class="menu" id="Stores">
                            {{-- <a href="{{ route('store.create') }}">Create Store</a> --}}
                            {{-- <a href="{{ route('store.index') }}">View Stores</a> --}}
                        </div>
                    </div>

                    <div class="dropmenu">
                        <span class="btn" onclick="dropDown('Orders')">Orders</span>

                        <div class="menu" id="Orders">
                            {{-- <a href="{{ route('order.create') }}">Create Order</a> --}}
                            {{-- <a href="{{ route('view.index') }}">View Orders</a> --}}
                        </div>
                    </div>

                </div>
            </nav>

            <script src="{{ asset('js/Layouts/Nav.js') }}"></script>
        </body>
        <script>
            let SubmitSpan = document.getElementById('SubmitSpan');

            SubmitSpan.addEventListener('click',function () {
                LogoutForm.submit();
            })
        </script>
    </html>
@endauth