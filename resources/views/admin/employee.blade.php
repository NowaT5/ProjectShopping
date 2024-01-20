@extends('layoutsAdmin.app')

@section('Employee', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">พนักงาน</h2>
                <button type="button" class="btn btn-sm btn-primary" id="Create">
                    <i class="fa fa-plus"></i> เพิ่มพนักงาน
                </button>
            </div>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">Emp_id</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">อายุ</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">User_name</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col">phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $dd)
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->fname }}</td>
                            <td>{{ $dd->lname }}</td>
                            <td>{{ $dd->age }}</td>
                            <td>{{ $dd->gender }}</td>
                            <td>{{ $dd->username }}</td>
                            <td>{{ $dd->emtype_id }}</td>
                            <td>{{ $dd->phone }}</td>
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
