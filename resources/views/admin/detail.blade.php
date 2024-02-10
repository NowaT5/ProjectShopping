@extends('layoutsAdmin.app')

@section('title', 'Orderdetail')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="col">

                    <h2 class="text text-center py-2">รายละเอียดคำสั่งซื้อ</h2>
                    <a href="{{ route('order') }}" role="button" class="btn btn-sm btn-secondary my-3">ย้อนกลับ</a>
                </div>
            </div>

            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ชื่อสินค้า</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคา/ชิ้น</th>
                        <th scope="col">ยอดรวม</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $detail)
                        @php
                            $products = DB::table('products')
                                ->where('id', $detail->product_id)
                                ->first();
                            // $de_orders = DB::table('orders')
                            //     ->where('id', $dd->order_id)
                            //     ->first();
                        @endphp
                        <tr>
                            <td>{{ $products->id }}</td>
                            <td>{{ $products->product_name }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->price }}</td>
                            <td>{{ $detail->quantity * $products->product_price }}</td>
                        </tr>
                        {{-- @endforeach
                    @foreach ($orders as $dd)
                        @php
                            $products = DB::table('products')
                                ->where('id', $dd->product_id)
                                ->first();
                            $de_orders = DB::table('orders')
                                ->where('id', $dd->order_id)
                                ->first();
                            // ทำการคำนวณ quantity * product_price
                            $total_price = $dd->quantity * $products->product_price;
                        @endphp
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $products->id }}</td>
                            <td>{{ $dd->quantity }}</td>
                            <td>{{ $products->product_price }}</td>
                            <td>{{ $total_price }}</td> <!-- แสดงผลราคารวม --> --}}
                        {{-- <td>

                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#viewModal{{ $dd->id }}">View</button>
                            </td> --}}
                        </tr>
                </tbody>

                {{-- <tbody>
                    @foreach ($order_details as $dd)
                        @php
                            $products = DB::table('products')
                                ->where('id', $dd->product_id)
                                ->first();
                            $orders = DB::table('orders')
                                ->where('id', $dd->order_id)
                                ->first();
                        @endphp
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->quantity }}</td>
                            <td>{{ $products->product_price }}</td>
                            <td>{{ $orders->id }}</td>
                            <td>{{ $products->id }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#viewModal{{ $dd->id }}">View</button>
                            </td>
                        </tr>
                </tbody> --}}

                {{-- Edit สินค้า Modal --}}
                {{-- <div class="modal fade" id="viewModal{{ $dd->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1"># {{ $orders->id }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="box-body">
                                        <table class="table table-striped-columns">
                                            <thead>
                                                <tr>
                                                    <th scope="col">รหัสสินค้า</th>
                                                    <th scope="col">จำนวน</th>
                                                    <th scope="col">ราคา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order_details as $dd)
                                                    @php
                                                        $products = DB::table('products')
                                                            ->where('id', $dd->product_id)
                                                            ->first();
                                                        $orders = DB::table('orders')
                                                            ->where('id', $dd->order_id)
                                                            ->first();
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $products->id }}</td>
                                                        <td>{{ $dd->quantity }}</td>
                                                        <td>{{ $dd->price }}</td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                {{-- สิ้นสุด Edit สินค้า Modal --}}

        </div>
        @endforeach
        </table>
        </div>
    </section>
@endsection
