@extends('layoutsAdmin.app')

@section('Type_product', 'page')
@section('content')
    <h2 class="text text-center py-2">ประเภทสินค้า</h2>
    <table class="table table-striped-columns">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">ประเภทสินค้า</th>
            <th scope="col">สินค้า</th>
            <th scope="col">รหัสสินค้า</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>
            <th scope="row">1</th>
            <td>วัตถุดิบ</td>
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
