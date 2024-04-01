@extends('layutsUser.app')
@section('title', 'page')
@section('content')
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Cart Shopping</h2>
                    <ol>
                        <li><a href="{{ route('Home') }}">Home</a></li>
                        <li><a href="{{ route('page.shopping') }}">Shopping</a></li>
                        <li>Cart</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

        <div class="untree_co-section before-footer-section">
            <div class="container">
                <form class="col-md-12" method="POST" action="{{ route('shop.checkout') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-5">
                        <div class="site-blocks-table">
                            @if ($order && count($order->order_detail) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail"></th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-total">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($order)
                                            @foreach ($order->order_detail as $dd)
                                                @php
                                                    $products = DB::table('products')
                                                        ->where('id', $dd->product_id)
                                                        ->first();
                                                @endphp
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <img src="{{ asset('upload/' . $products->product_image) }}"
                                                            alt="Image" class="img-fluid">
                                                    </td>
                                                    <td class="product-name">
                                                        <h2 class="h5 text-black">{{ $products->product_name }}</h2>
                                                    </td>
                                                    <td>{{ $dd->price }}</td>
                                                    <td class="product-quantity">
                                                        <button class="quantity-update small-button" data-id="{{ $dd->id }}"
                                                            data-type="decrease"
                                                            style="border: none; outline: none;font-size: 15px;">-</button>
                                                        <span class="quantity">{{ $dd->quantity }}</span>
                                                        <button class="quantity-update small-button" data-id="{{ $dd->id }}"
                                                            data-type="increase"
                                                            style="border: none; outline: none;font-size: 15px;">+</button>

                                                    </td>
                                                    {{-- <td>{{ $dd->quantity }} </td> --}}
                                                    {{-- <td>
                                                    <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                        style="max-width: 120px;">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-black decrease"
                                                                type="button">&minus;</button>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control text-center quantity-amount" value="{{$dd->quantity}}"
                                                            placeholder="" aria-label="Example text with button addon"
                                                            aria-describedby="button-addon1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-black increase"
                                                                type="button">&plus;</button>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                                    <td>{{ $dd->quantity * $dd->price }}</td>
                                                    <td><a href="{{ route('del.in_cart', $dd->id) }}"
                                                            class="btn btn-black btn-sm">ลบ</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            @else
                                <!-- แสดงข้อความว่าไม่มีสินค้าในตะกร้า -->
                                <div class="alert alert-warning" role="alert">
                                    <h2>ไม่มีสินค้าในตะกร้า</h2>
                                </div>
                            @endif
                            @if ($order && count($order->order_detail) > 0)
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6 pl-5">
                                        <div class="row justify-content-end">
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-12 text-right border-bottom mb-5">
                                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                                        <h2>{{ $order->total }}</h2>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6 text-right">
                                                        <strong class="text-black"></strong>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <button type='submit'
                                                            class="btn btn-black btn-lg py-1 btn-block">Buy</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                </form>
            </div>
            {{-- <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals </h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black"></strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-black btn-lg py-1 btn-block"
                                        onclick="window.location='checkout.html'">Buy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.quantity-update').forEach(function(button) {
            button.addEventListener('click', function(e) {
                const detailId = e.target.getAttribute('data-id');
                const type = e.target.getAttribute('data-type'); // 'increase' หรือ 'decrease'

                fetch(`/cart/update/${detailId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF Token
                        },
                        body: JSON.stringify({
                            type: type
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // อัปเดต UI ของจำนวนสินค้า
                            e.target.parentElement.querySelector('.quantity').textContent =
                                data.newQuantity;
                            // อาจจะมีการอัปเดตราคารวมที่นี่ด้วย
                        }
                    });
            });
        });
    });
</script>
