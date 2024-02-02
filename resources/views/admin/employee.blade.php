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
                        @csrf
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
                                    data-target="#editModal{{ $dd->id }}">Edit</button>
                                <a href="{{ route('employee.delemp', $dd->id) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('คุณต้องการลบบทความ {{ $dd->fname }} หรือไม่?')">ลบ</a>
                                {{-- <button type="button" class="btn btn-sm btn-danger delete-item"
                                    data-id = "{{ $dd->id }}" onclick="{{ route('employee.delemp') }}">Delete
                                </button> --}}
                            </td>
                        </tr>
                        {{-- Edit --}}
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
                                        <form method="post" action="">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="fname" class="col-form-label">ชื่อ</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $dd->fname }}" id="fname">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="lname" class="col-form-label">นามสกุล</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $dd->lname }}" id="lname">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="age" class="col-form-label">อายุ</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $dd->age }}" id="age">
                                                    </div>
                                                    <div class="col">
                                                        <label for="phone" class="col-form-label">เบอร์โทรศัพท์</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $dd->phone }}" id="phone">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="username" class="col-form-label">Username</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $dd->username }}" id="username">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="password" class="col-form-label">Password</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $dd->password }}" id="password">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="emtype_id">ตำแหน่ง</label>
                                                        {{-- <input type="text" class="form-control" name="emtype_id" id="emtype_id" value="{{$emtype->emtype_name}}"> --}}
                                                        <select class="form-control" name="emtype_id"
                                                            id="editModal{{ $dd->id }}-emtype_id">
                                                            <option value="Admin"
                                                                {{ $emtype->emtype_name == 'Admin' ? 'selected' : '' }}>
                                                                Admin</option>
                                                            <option value="SuperAdmin"
                                                                {{ $emtype->emtype_name == 'SuperAdmin' ? 'selected' : '' }}>
                                                                SuperAdmin</option>

                                                            <!-- เพิ่ม <option> สำหรับตำแหน่งที่มีในฐานข้อมูล -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    {{-- End Edit --}}

@endsection

@section('scripts')
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
@endsection

<script>
    function openEditModal(employeeId) {
        // ดึงข้อมูลของ employee และตำแหน่ง (emtype) จาก API หรือส่วนอื่น ๆ
        // และนำมาแสดงใน Modal แก้ไข

        // ตัวอย่างการใช้ Axios สำหรับดึงข้อมูลจาก API
        axios.get(`/api/employees/${employeeId}`)
            .then(response => {
                const employeeData = response.data;
                // นำข้อมูลมาแสดงใน Modal
                document.getElementById('editModal{{ $dd->id }}-emtype_id').innerHTML = '';
                for (const emtype of employeeData.emtypes) {
                    const option = document.createElement('option');
                    option.value = emtype.id;
                    option.text = emtype.emtype_name;
                    document.getElementById('editModal{{ $dd->id }}-emtype_id').appendChild(option);
                }
                // ... แสดงข้อมูลอื่น ๆ ตามที่ต้องการ
            })
            .catch(error => {
                console.error('Error fetching employee data:', error);
            });

        // เปิด Modal
        $('#editModal{{ $dd->id }}').modal('show');
    }
</script>
<!-- ที่ไฟล์ script ของคุณ -->

<script>
    function Delemp(button) {
        // ดึงค่า ID จากปุ่ม Delete ที่ถูกคลิก
        var employeeId = button.getAttribute('data-id');

        // ข้อความยืนยันการลบ
        var confirmMessage = "คุณแน่ใจที่จะลบข้อมูลนี้หรือไม่?";

        // ถามผู้ใช้ยืนยัน
        if (confirm(confirmMessage)) {
            // ส่งคำขอลบไปยัง URL ที่กำหนด
            fetch('/employee/delete/' + employeeId, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // ส่ง token ไปใน header
                },
            }).then(response => {
                if (response.ok) {
                    // หากลบเสร็จสิ้น, ทำการ refresh หน้าหลังจากลบ
                    location.reload();
                } else {
                    // กรณีเกิดข้อผิดพลาดในการลบ
                    console.error('เกิดข้อผิดพลาดในการลบข้อมูล');
                }
            });
        }
    }
</script>
