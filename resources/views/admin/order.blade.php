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
                        <th scope="col">id</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">ชื่อลูกค้า</th>
                        <th scope="col">สลิปชำระเงิน</th>
                        <th scope="col">สถานะการชำระเงิน</th>
                        <th scope="col">พนักงานที่ดูแล</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $dd)
                        @php
                            $user = DB::table('users')
                                ->where('id', $dd->user_id)
                                ->first();
                            $status_payment = DB::table('status_payments')
                                ->where('id', $dd->status_payment_id)
                                ->first();
                            $employee = DB::table('employees')
                                ->where('id', $dd->employee_id)
                                ->first();
                        @endphp
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->created_at }}</td>
                            <td>{{ $user->fname }} {{ $user->lname }}</td>
                            <td>{{ $dd->payment_image }}</td>
                            <td>{{ $status_payment->status_payment_name }}</td>
                            <td>{{ $employee->fname }}</td>
                            <td>

                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editModal{{ $dd->id }}">แก้ไข</button>

                                <a href="{{ route('del.order', $dd->id) }}" role="button" class="btn btn-sm btn-danger"
                                    onclick="return confirm('คุณต้องการลบคำสั่งซื้อที่ {{ $dd->id }} หรือไม่?')">ลบ</a>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                </tbody>

                {{-- Edit Modal --}}
                <div class="modal fade" id="editModal{{ $dd->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">No. {{ $dd->id }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {{-- {{ route('employee.update', ['id' => $dd->id]) }} --}}
                            <div class="modal-body">
                                <form method="post" action="{{ route('edit.order', ['id' => $dd->id]) }}">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <label for="create_at" class="col-form-label">create_at</label>
                                                <input type="text" class="form-control" value="{{ $dd->created_at }}"
                                                    name="create_at" id="create_at" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="user_id" class="col-form-label">ชื่อลูกค้า
                                                </label>
                                                <input type="text" class="form-control"
                                                    value="{{ $user->fname }} {{ $user->lname }}" name="user_id"
                                                    id="user_id" disabled>
                                                <label for="user_id" class="col-form-label">
                                                </label>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="employee_id" class="col-form-label">employee_id</label>
                                                <input type="text" class="form-control" value="{{ $dd->employee_id }}"
                                                    name="employee_id" id="employee_id" disabled>
                                            </div>
                                            <div class="col">
                                                <label for="status_payment_id" class="col-form-label ">สถานะชำระเงิน</label>
                                                <select class="form-control" id="status_payment_id" name="status_payment_id"
                                                    required>

                                                    <option value="1" {{ $dd->status_payment_id == 1 ? 'selected' : '' }}>ตรวจสอบการชำระเงิน</option>
                                                    <option value="2" {{ $dd->status_payment_id == 2 ? 'selected' : '' }}>ยืนยันการชำระเงิน</option>
                                                    {{-- @foreach ($stats as $stat)
                                                        <option value="{{ $stat->id }}"
                                                            {{ $dd->status_payment_id == $stat->id ? 'selected' : '' }}>
                                                            {{ $stat->status_payment_name }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <label for="payment_image" class="col-form-label">payment_image</label>
                                                <img src="{{ asset('upload/payment/' . $dd->payment_image) }}" style="width: 100%"
                                                    alt="Payment Image">
                                                {{-- <input type="text" class="form-control" value="{{ $dd->payment_image }}"
                                                    name="payment_image" id="payment_image"> --}}
                                            </div>
                                            <div class="col-my-3">
                                                <a href="{{ route('order') }}" role="button"
                                                    class="btn btn-secondary my-2">ยกเลิก</a>
                                                <button type="submit" value="บันทึก" class="btn btn-success">บันทึก</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6">
                                                <label for="gender" class="col-form-label">เพศ</label>
                                                <input type="text" class="form-control" value="{{ $dd->gender }}"
                                                    id="gender">
                                            </div> --}}


                                    {{-- <div class="col-md-6">
                                                <label for="emtype_id" class="col-form-label">ตำแหน่ง</label>
                                                <select class="form-control" value="{{$emtype->id}}" name="emtype_id" required>
                                                    <option value="">กรุณาเลือก..</option>
                                                    <option value="1">SuperAdmin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Manager</option>
                                                </select>
                                            </div> --}}

                                    {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <label for="username" class="col-form-label">Username</label>
                                                    <input type="text" class="form-control" value="{{ $dd->username }}"
                                                        name="username" id="username" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="password" class="col-form-label">Password</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $dd->password }}" name="password" id="password"
                                                        required>
                                                </div>
                                            </div>
                                            <div> --}}
                                    {{-- <a href="{{ route('order') }}" role="button" class="btn btn-secondary my-2">ยกเลิก</a>
                                    <button type="submit" class="btn btn-success">บันทึก</button> --}}
                            </div>
                            </form>
                        </div>
                        @endforeach
            </table>
        </div>
        </div>
        {{-- End Edit --}}

        </div>
    </section>
@endsection
