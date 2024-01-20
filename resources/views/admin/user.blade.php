@extends('layoutsAdmin.app')

@section('User', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">รายชื่อลูกค้า</h2>
            </div>

            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">User_id</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">อายุ</th>
                        <th scope="col">User_name</th>
                        <th scope="col">ที่อยู่</th>
                        <th scope="col">แขวง/ตำบล</th>
                        <th scope="col">เขต/อำเภอ</th>
                        <th scope="col">จังหวัด</th>
                        <th scope="col">รหัสไปรษณีย์</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $dd)
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->fname }}</td>
                            <td>{{ $dd->lname }}</td>
                            <td>{{ $dd->age }}</td>
                            <td>{{ $dd->gender }}</td>
                            <td>{{ $dd->email }}</td>
                            <td>{{ $dd->username }}</td>
                            <td>{{ $dd->address }}</td>
                            <td>{{ $dd->subdistrict }}</td>
                            <td>{{ $dd->district }}</td>
                            <td>{{ $dd->province }}</td>
                            <td>{{ $dd->zipcode }}</td>
                            <td>{{ $dd->phone }}</td>
                            <td>
                            {{-- <a href="#" role="button" class="btn btn-sm btn-warning">Edit</a> --}}
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
