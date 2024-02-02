@extends('layoutsAdmin.app')

@section('title', 'เพิ่มพนักงาน')
@section('content')
    <h2 class="text text-center py-2"></h2>

    <section>
        {{-- Modal เพิ่มพนักงาน  --}}
        {{-- <div class="modal-content"> --}}
        <form method="POST" action="/addemp">
            <h2 class="title">เพิ่มพนักงาน</h2>
            <div class="form-group">
                {{-- <form method="POST" action="/addemp"> --}}
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 mx-5">
                            <label for="fname" class="col-form-label">ชื่อ</label>
                            <input type="text" name="fname" class="form-control" placeholder="First name" required>
                            {{-- แสดง error --}}
                            {{-- @error('fname')
                                <div class="my-2" style="color:red">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror --}}
                        </div>
                        <div class="col-md-4 mx-3">
                            <label for="lname" class="col-form-label">นามสกุล</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last name" required>
                            {{-- แจ้ง Error
                            @error('lname')
                                <div class="my-2" style="color:red">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror --}}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-5">
                            <label for="gender" class="col-form-label">เพศ</label>
                            <select class="form-control" name="gender">
                                <option value="">กรุณาเลือก..</option>
                                <option value="Male">Male</option>
                                <option value="female">Female</option>

                            </select>
                        </div>
                        <div class="col-md-4 mx-3">
                            <label for="age" class="col-form-label">อายุ</label>
                            <input type="number" name="age" class="form-control" placeholder="Age" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-5">
                            <label for="emtype_id" class="col-form-label">ตำแหน่ง</label>
                            <select class="form-control" name="emtype_id" required>
                                <option value="">กรุณาเลือก..</option>
                                <option value="1">SuperAdmin</option>
                                <option value="2">Admin</option>
                                <option value="3">Manager</option>
                            </select>
                        </div>
                        <div class="col-md-4 mx-3">
                            <label for="phone" class="col-form-label">เบอร์โทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" name="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-5">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="col-md-4 mx-3">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password"
                                name="password" required>
                        </div>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
            <div class="col-md-2">
                <a href="{{ route('employee') }}" role="button" class="btn btn-secondary ">ยกเลิก</a>

                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{-- <a href="{{route('addemp')}}" class="btn btn-primary ">Save</a> --}}

                <input type="submit" value="บันทึก" class="btn btn-success">

                {{-- <a href="{{ route('/addemp') }}" role="button" class="btn btn-success">Save</a> --}}
                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
            </div>
        </form>
        {{-- สิ้นสุดเพิ่มพนักงาน Modal --}}

        {{-- @section('scripts')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.add_emp', function(e) {
                    e.preventDefault();
                    var data = {
                        'fname': $('.fname').val(),
                        'lname': $('.lname').val(),
                        'age': $('.age').val(),
                        'phone': $('.phone').val(),
                        'username': $('.username').val(),
                        'password': $('.password').val(),
                        'emtype_id': $('.emtype_id').val(),
                    }
                    // console.log(data);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "POSt",
                        url: "/addemp",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            // console.log(response);
                            if (response.status == 400) //เช็คว่าป้อนข้อมูลหรือเปล่า
                            {
                                $('#saveform_errList').html("");
                                $('#saveform_errList').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#saveform_errList').append('<li>' + err_values +
                                        '<li>');
                                });
                            } else {
                                // save สำเร็จ
                                $('#saveform_errList').html("");
                                $('#succes_message').addClass('alert alert-success')
                                $('#succes_message').text(response.message)
                                $('#addEmpModal').madal('hide');
                                console.log(response);
                            }
                        }
                    });
                });
            });
        </script>
    @endsection --}}
    </section>
@endsection
