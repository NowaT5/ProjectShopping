@extends('layoutsAdmin.app')

@section('Orderdetail', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">รายละเอียดคำสั่งซื้อ</h2>
            </div>

            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ราคา</th>
                        <th scope="col">เลขที่ออเดอร์</th>
                        <th scope="col">รหัสสินค้า</th>
                    </tr>
                </thead>
                @foreach ($order_detail as $dd)
                    @php
                        $product = DB::table('products')->where('id', $dd->product_id)->first();
                        $order = DB::table('orders')->where('id', $dd->order_id)->first();
                    @endphp
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->quantity }}</td>
                            <td>{{ $dd->price }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $product->id }}</td>
                            {{-- <td>
                              @if ($dd->status_payment_id == true)
                                  {{-- <a href="#" class="btn btn-success">ชำระเงิน</a> 
                                  <a href="{{route('change',$dd->status_payment_id)}}" class="btn btn-success">ชำระเงิน</a>
                              @else
                                  {{-- <a href="#" class="btn btn-secondary">On hold</a> 
                                  <a href="{{route('change',$dd->status_payment_id)}}" class="btn btn-secondary">On hold</a>
                              @endif 
                            </td>--}}
                            <td><a href="#" role="button" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger delete-item"
                                    data-id = "">Delete</button>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </section>
@endsection
