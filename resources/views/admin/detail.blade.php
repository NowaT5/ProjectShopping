@extends('layoutsAdmin.app')

@section('Orderdetail', 'page')
@section('content')
<h2 class="text text-center py-2">รายละเอียดคำสั่งซื้อ</h2>
<table class="table table-striped-columns">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">จำนวน</th>
        <th scope="col">ราคา</th>
        <th scope="col">ออเดอร์</th>
        <th scope="col">สินค้า</th>
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
