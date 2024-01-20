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
                        <th scope="col">OR_id</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">User_id</th>
                        <th scope="col">Payment_img</th>
                        <th scope="col">สถานะการชำระเงิน</th>
                        <th scope="col">Emp_id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $dd)
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->create_at }}</td>
                            <td>{{ $dd->user_id }}</td>
                            <td>{{ $dd->payment_image }}</td>
                            <td>
                              @if ($dd->status_payment_id == true)
                                  <a href="#" class="btn btn-success">ชำระเงิน</a>
                                  {{-- <a href="{{route('change',$dd->status_payment_id)}}" class="btn btn-success">ชำระเงิน</a> --}}
                              @else
                                  <a href="#" class="btn btn-secondary">On hold</a>
                                  {{-- <a href="{{route('change',$dd->status_payment_id)}}" class="btn btn-secondary">On hold</a> --}}
                              @endif
                            </td>
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
