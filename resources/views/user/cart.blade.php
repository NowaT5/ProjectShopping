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
        </section><!-- End About Us Section -->

        <div class="untree_co-section before-footer-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viewCart as $dd)
                                    @php
                                        $product = DB::table('products')
                                                ->where('id', $dd->product_id)
                                                ->first();
                                    @endphp
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('upload/'.$dd->product_image)}}" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{$dd->product_name}}</h2>
                                        </td>
                                        <td>{{$dd->product_price}}</td>
                                        <td>
                                            <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-black decrease"
                                                        type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center quantity-amount"
                                                    value="1" placeholder=""
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-black increase"
                                                        type="button">&plus;</button>
                                                </div>
                                            </div>

                                        </td>
                                        <td></td>
                                        <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Subtotal</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$230.00</strong>
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
                </div>
            </div>
        </div>
    </main>

@endsection
