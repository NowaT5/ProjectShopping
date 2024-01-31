@extends('layoutsAdmin.app')

@section('title', 'เพิ่มพนักงาน')
@section('content')
    <h2 class="text text-center py-2"></h2>
    {{-- เพิ่มพนักงาน Modal --}}

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
                                    <label for="saveform_errList" class="col-form-label"></label>
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="lname" class="col-form-label">นามสกุล</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="age" class="col-form-label">อายุ</label>
                            <input type="text" name="age" class="form-control" placeholder="Age">
                        </div>
                        <div class="col">
                            <label for="phone" class="col-form-label">เบอร์โทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone" name="phone">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary add_emp">Save</button>
        </div>
    </div>
    </div>
    </div>
    {{-- สิ้นสุดเพิ่มพนักงาน Modal --}}
    </section>
@endsection
