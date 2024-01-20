@extends('layoutsAdmin.app')

@section('Productlist', 'page')
@section('content')
<h2 class="text text-center py-2">รายการสินค้า</h2>
<table class="table table-striped-columns">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">ชื่อสินค้า</th>
        <th scope="col">ราคา</th>
        <th scope="col">รูปสินค้า</th>
        <th scope="col">จำนวนสินค้า</th>
        <th scope="col">type_id</th>
        <th scope="col">product_type_id</th>
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
