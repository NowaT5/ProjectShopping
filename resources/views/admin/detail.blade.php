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
                        <th scope="col">ออเดอร์</th>
                        <th scope="col">สินค้า</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($order_detail as $dd)
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->quantity }}</td>
                            <td>{{ $dd->price }}</td>
                            <td>{{ $dd->order_id }}</td>
                            <td>{{ $dd->product_id }}</td>
                            <td>{{ $dd->employee_id }}</td>
                            <td><a href="#" role="button" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger delete-item"
                                    data-id = "">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
