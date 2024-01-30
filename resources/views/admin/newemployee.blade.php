@extends('layoutsAdmin.app')

@section('title', 'newemp')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">เพิ่มพนักงาน</h2>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label>
                        <h5>ชื่อ</h5>
                        <input type="text" class="form-control" placeholder="Enter Name">
                    </label>

                </div>
                <div class="col-sm-6">
                    <label>
                        <h5>นามสกุล</h5>
                        <input type="text" class="form-control" placeholder=" ">
                    </label>

                </div>
            </div>
        </div>
    </section>
@endsection
