@extends('layoutsAdmin.app')

@section('title', 'Employee')
@section('content')
    <section class="content">
        <div id='succes_message'></div>
        <div class="card">
            <div id="success_message"></div>
            <div class="card-header">
                <h2 class="text text-center py-2">พนักงาน</h2>
                <a href="/newemp" role="button" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>เพิ่มพนักงาน</a>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#addEmpModal">เพิ่มพนักงาน</button> --}}
            </div>

            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">อายุ</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">Username</th>
                        <th scope="col">phone</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $dd)
                        {{-- ดึงข้อมูลตำแหน่งพนักงาน --}}
                        @php
                            $emtype = DB::table('emtypes')
                                ->where('id', $dd->emtype_id)
                                ->first();
                        @endphp

                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->fname }}</td>
                            <td>{{ $dd->lname }}</td>
                            <td>{{ $dd->age }}</td>
                            <td>{{ $dd->gender }}</td>
                            <td>{{ $dd->username }}</td>
                            <td>{{ $dd->phone }}</td>
                            <td>{{ $emtype->emtype_name }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#editModal{{ $dd->id }}">แก้ไข</button>
                                <a href="{{ route('employee.delemp', $dd->id) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('คุณต้องการลบ {{ $dd->fname }} หรือไม่?')">ลบ</a>
                                {{-- <button type="button" class="btn btn-sm btn-danger delete-item"
                                    data-id = "{{ $dd->id }}" onclick="{{ route('employee.delemp') }}">Delete
                                </button> --}}
                            </td>
                        </tr>
                </tbody>
                {{-- @endforeach
            </table> --}}

                {{-- Edit Modal --}}
                <div class="modal fade" id="editModal{{ $dd->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {{-- {{ route('employee.update', ['id' => $dd->id]) }} --}}
                            <div class="modal-body">
                                <form method="post" action="{{ route('employee.edit', $dd->id) }}">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col">
                                                <label for="fname" class="col-form-label">ชื่อ</label>
                                                <input type="text" class="form-control" value="{{ $dd->fname }}"
                                                    name="fname" id="fname" required>
                                            </div>
                                            <div class="col">
                                                <label for="lname" class="col-form-label">นามสกุล</label>
                                                <input type="text" class="form-control" value="{{ $dd->lname }}"
                                                    name="lname" id="lname" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="age" class="col-form-label">อายุ</label>
                                                <input type="number" class="form-control" value="{{ $dd->age }}"
                                                    name="age" id="age">
                                            </div>
                                            {{-- <div class="col">
                                                <label for="gender" class="col-form-label">เพศ</label>
                                                <input type="text" class="form-control" value="{{ $dd->gender }}"
                                                  name="gender"  id="gender"> --}}

                                            {{-- เลือกเพศแบบดรอปดาวน์ --}}
                                            <div class="col-md-6">
                                                <label for="gender">เพศ</label>
                                                <select class="form-control" name="gender" id="{{ $dd->id }}">
                                                    <option value="Male" {{ $dd->gender == 'Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="Female" {{ $dd->gender == 'Female' ? 'selected' : '' }}>
                                                        Female</option>

                                                </select>
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <label for="gender" class="col-form-label">เพศ</label>
                                                <input type="text" class="form-control" value="{{ $dd->gender }}"
                                                    id="gender">
                                            </div> --}}
                                        </div>

                                        {{-- <div class="col-md-6">
                                                <label for="emtype_id" class="col-form-label">ตำแหน่ง</label>
                                                <select class="form-control" value="{{$emtype->id}}" name="emtype_id" required>
                                                    <option value="">กรุณาเลือก..</option>
                                                    <option value="1">SuperAdmin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Manager</option>
                                                </select>
                                            </div> --}}

                                        {{-- OLD กากๆ  --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="emtype_id" class="col-form-label">ตำแหน่ง</label>
                                                <select class="form-control" name="emtype_id"
                                                    id="editModal{{ $dd->id }}-emtype_id" required>

                                                    <option value="1"
                                                        {{ $emtype->emtype_name == 'Admin' ? 'selected' : '' }}>
                                                        Admin</option>
                                                    <option value="2"
                                                        {{ $emtype->emtype_name == 'SuperAdmin' ? 'selected' : '' }}>
                                                        SuperAdmin</option>
                                                    <option value="3"
                                                        {{ $emtype->emtype_name == 'Manager' ? 'selected' : '' }}>
                                                        Manager</option>
                                                </select>
                                            </div>
                                            <!-- เพิ่ม <option> สำหรับตำแหน่งที่มีในฐานข้อมูล -->

                                            <div class="col-md-6">
                                                <label for="phone" class="col-form-label">เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control" value="{{ $dd->phone }}"
                                                    name="phone" id="phone">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="username" class="col-form-label">Username</label>
                                                <input type="text" class="form-control" value="{{ $dd->username }}"
                                                    name="username" id="username" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password" class="col-form-label">Password</label>
                                                <input type="text" class="form-control" value="{{ $dd->password }}"
                                                    name="password" id="password" required>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('employee') }}" role="button"
                                                class="btn btn-secondary my-2">ยกเลิก</a>
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                        </div>
                                        {{-- </div> --}}
                                </form>
                                {{-- </div>
                        </div> --}}
                                {{-- </tbody> --}}
                                @endforeach
            </table>
        </div>
        </div>
        {{-- End Edit --}}
        </div>
        </div>
    </section>


@endsection
