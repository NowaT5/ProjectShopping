@extends('layoutsAdmin.app')

@section('Order', 'page')
@section('content')
<h2 class="text text-center py-2">รายการสั่งซื้อ</h2>
<table class="table table-striped-columns">
    <thead>
      <tr>
        <th scope="col">OR_id</th>
        <th scope="col">วันที่</th>
        <th scope="col">User_id</th>
        <th scope="col">Payment_img</th>
        <th scope="col">สถานะการชำระเงิน</th>
        <th scope="col">Emp_id</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      <tr>
        <th scope="row">1</th>
        <td>test</td>
        <td>test</td>
        <td>001</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>test</td>
        <td>test</td>
        <td>002</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>test</td>
        <td>test</td>
        <td>101</td>
      </tr>
    </tbody>
  </table>
@endsection
