@extends('layoutsAdmin.app')

@section('Order', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">รายการสั่งซื้อ</h2>
            </div>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">Username</th>
                        <th scope="col">สลิปชำระเงิน</th>
                        <th scope="col">สถานะการชำระเงิน</th>
                        <th scope="col">พนักงานที่ดูแล</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $dd)
                    @php
                        $status_payment = DB::table('status_payments')->where('id', $dd->status_payment_id)->first();
                        $employee = DB::table('employees')->where('id', $dd->employee_id)->first();
                    @endphp
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->create_at }}</td>
                            <td>{{ $dd->user_id }}</td>
                            <td>{{ $dd->payment_image }}</td>
                            <td>{{ $status_payment->status_payment_name }}</td>
                            {{-- <td>
                              @if ($dd->status_payment_id == true)
                                  {{-- <a href="#" class="btn btn-success">ชำระเงิน</a> 
                                  <a href="{{route('change',$dd->status_payment_id)}}" class="btn btn-success">ชำระเงิน</a>
                              @else
                                  {{-- <a href="#" class="btn btn-secondary">On hold</a> 
                                  <a href="{{route('change',$dd->status_payment_id)}}" class="btn btn-secondary">On hold</a>
                              @endif 
                            </td>--}}
                            <td>{{ $employee->fname }}</td>
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
