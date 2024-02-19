@extends('layutsUser.app')
@section('title', 'page')
@section('content')
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Shopping</h2>
                    <ol>
                        <li><a href="{{ route('Home') }}">Home</a></li>
                        <li>Shopping</li>
                    </ol>
                </div>

            </div>
        </section><!-- End About Us Section -->
        <div class="untree_co-section product-section before-footer-section">
            <div class="container">
                <div class="row">
                    @foreach ($products as $dd)
                        <!-- Start Column 1 -->
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <form method="POST" action="{{ route('shop.in_cart', ['id' => $dd->id]) }}">
                                @csrf
                                <a class="product-item">

                                    <img src="{{ asset('upload/' . $dd->product_image) }}"
                                        class="img-fluid product-thumbnail">
                                    <h3 class="product-title">{{ $dd->product_name }}</h3>
                                    <strong class="product-price">{{ $dd->product_price }}</strong>
                                    <input type="hidden" name="type_id" id="type_id" value="{{$dd->type_id}}">
                                    <button class="icon-cross" type="submit">
                                        <img src="{{ asset('templateshop/images/cross.svg') }}" class="img-fluid">
                                    </button>
                                </a>
                            </form>
                        </div>
                    @endforeach
                    <!-- End Column 1 -->

                </div>
            </div>
        </div>
    </main>
@endsection
