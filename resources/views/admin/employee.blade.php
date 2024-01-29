@extends('layoutsAdmin.app')

@section('Employee', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">พนักงาน</h2>
                {{-- <a href="{{ route('newemp') }}" role="button" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i>เพิ่มพนักงาน</a> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal-new-xl">เพิ่มพนักงาน</button>
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
                                <button type="button" class="btn btn-sm btn-danger delete-item"
                                    data-id = "{{ $dd->id }}" onclick="Delemp(this)">Delete </button>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="ClosePage()">Close</button>
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
    {{-- เพิ่มพนักงาน --}}
    <div class="modal fade" id="exampleModal-new-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มพนักงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname" class="col-form-label">ชื่อ</label>
                                    <input type="text" name="fname" class="form-control" placeholder="First name">
                                    @error('fname')
                                        <div class="my-2">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="lname" class="col-form-label">นามสกุล</label>
                                    <input type="text" class="form-control" placeholder="Last name" id="lname">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="age" class="col-form-label">อายุ</label>
                                    <input type="text" name="age" class="form-control" placeholder="Age">
                                </div>
                                <div class="col">
                                    <label for="phone" class="col-form-label">เบอร์โทรศัพท์</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                                        name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="col-form-label">Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Password"
                                        name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="emtype_id">ตำแหน่ง</label>
                                    <select class="form-control" name="emtype_id">
                                        <option value="">กรุณาเลือก..</option>
                                        <option value="1">SuperAdmin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Manager</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="ClosePage()">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="Newemp()">Save</button>
                </div>
            </div>
        </div>
    </div>




    <script>
        $('#exampleModal-new-xl').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
        $('#editModal{{ $dd->id }}').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })

        function Delemp() {
            // ทำการ redirect หรือ navigate ไปยังหน้า Delemp เมื่อปุ่มถูกคลิก
            window.location.href =
                "{{ route('product') }}";
        }

        function ClosePage() {
            // ปิดการทำงาน
            window.location.href =
                "{{ route('employee') }}";
        }

        function Newemp(Request $request) {
            // ทำการ redirect ไป Newemp
            window.location.href =
                "{{ route('newemp') }}";
        }
    </script>
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


@endsection
