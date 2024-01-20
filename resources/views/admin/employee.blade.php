@extends('layoutsAdmin.app')

@section('Employee', 'page')
@section('content')
<h2 class="text text-center py-2">พนักงาน</h2>
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
    <tbody class="table-group-divider">
      <tr>
        <th scope="row">1</th>
        <td>abc</td>
        <td>หยกพม่า</td>
        <td>001</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>วัตถุดิบ</td>
        <td>เอ็นยืด</td>
        <td>002</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>กำไร</td>
        <td>กำไรหินฮาวไลท์</td>
        <td>101</td>
      </tr>
    </tbody>
  </table>
@endsection
