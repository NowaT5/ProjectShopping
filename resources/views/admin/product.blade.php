@extends('layoutsAdmin.app')

@section('Productlist', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">รายการสินค้า</h2>
                <button type="button" class="btn bg-gradient-primary" id="Create" data-toggle="modal"
                    data-target="#addproductModal">
                    <i class="fa fa-plus"></i> เพิ่มสินค้า
                </button>
            </div>

            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                aria-describedby="example2_info">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>ชื่อสินค้า </th>
                                        <th>ราคา</th>
                                        <th>รูปสินค้า</th>
                                        <th>จำนวนสินค้า</th>
                                        <th>ประเภท</th>
                                        <th>ชนิด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $dd)
                                        @php
                                            $product_type = DB::table('product_types')
                                                ->where('id', $dd->product_type_id)
                                                ->first();
                                            $type = DB::table('types')
                                                ->where('id', $dd->type_id)
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $dd->id }}</td>
                                            <td>{{ $dd->product_name }}</td>
                                            <td>{{ $dd->product_price }}</td>
                                            <td><img src="{{ asset('upload/' . $dd->product_image) }}" style="width: 10%;height:10%"
                                                    alt=""></td>
                                            <td>{{ $dd->product_stock }}</td>
                                            <td>{{ $product_type->product_type_name }}</td>
                                            <td>{{ $type->type_name }}</td>

                                            <td>
                                                {{-- <a href="#editproductModal{{ $dd->id }}" role="button"
                                                    class="btn btn-sm btn-warning">แก้ไข</a> --}}
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editproductModal{{ $dd->id }}">แก้ไข</button>

                                                <a href="{{ route('del.product', $dd->id) }}"
                                                    class="btn btn-sm btn-danger delete-item"
                                                    onclick="return confirm('คุณต้องการลบรายการที่ {{ $dd->product_name }} หรือไม่?')">ลบ</a>
                                                {{-- <button type="button" class="btn btn-sm btn-danger delete-item"
                                                    data-id = "">Delete</button> --}}
                                            </td>
                                        </tr>
                                </tbody>

                                {{-- Edit สินค้า Modal --}}
                                <div class="modal fade" id="editproductModal{{ $dd->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">แก้ไขสินค้า</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{ route('edit.product', ['id' => $dd->id]) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="box-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="product_name"
                                                                    class="col-form-label">ชื่อสินค้า</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $dd->product_name }}" name="product_name"
                                                                    id="product_name" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="product_price"
                                                                    class="col-form-label">ราคา</label>
                                                                <input type="number" class="form-control"
                                                                    value="{{ $dd->product_price }}" name="product_price"
                                                                    id="product_price" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col">
                                                                <label for="product_stock"
                                                                    class="col-form-label">Stock</label>
                                                                <input type="number" class="form-control"
                                                                    value="{{ $dd->product_stock }}" name="product_stock"
                                                                    id="product_stock" required>
                                                            </div>
                                                            <div class="col">
                                                                <label for="product_type_id"
                                                                    class="col-form-label ">ประเภทสินค้า</label>
                                                                <select class="form-control" id="product_type_id"
                                                                    name="product_type_id" required>
                                                                    @foreach ($product_types as $pd_type)
                                                                        <option
                                                                            value="{{ $pd_type->id }}"{{ $dd->product_type_id == $pd_type->id ? 'selected' : '' }}>
                                                                            {{ $pd_type->product_type_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col">
                                                                <label for="type_id"
                                                                    class="col-form-label ">ชนิดสินค้า</label>
                                                                <select class="form-control" id="type_id" name="type_id"
                                                                    required>
                                                                    @foreach ($types as $type)
                                                                        <option value="{{ $type->id }}"
                                                                            {{ $dd->type_id == $type->id ? 'selected' : '' }}>
                                                                            {{ $type->type_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label for="product_image"
                                                                    class="col-form-label">รูปสินค้า</label>
                                                                <input type="file" class="form-control"
                                                                    value="{{ $dd->product_image }}" name="product_image"
                                                                    id="product_image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div><button type="submit" value="บันทึก"
                                                            class="btn btn-success my-2 mx-3">บันทึก</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- สิ้นสุด Edit สินค้า Modal --}}
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- เพิ่มชนิดสินค้า Modal --}}
        <div class="modal fade" id="addproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('add.product') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="product_name" class="col-form-label">ชื่อสินค้า</label>
                                        <input type="text" class="form-control" value="" name="product_name"
                                            id="product_name" required>
                                    </div>
                                    <div class="col">
                                        <label for="product_price" class="col-form-label">ราคา</label>
                                        <input type="number" class="form-control" value="" name="product_price"
                                            id="product_price" required>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">
                                        <label for="product_stock" class="col-form-label">Stock</label>
                                        <input type="number" class="form-control" value="" name="product_stock"
                                            id="product_stock" required>
                                    </div>
                                    <div class="col">
                                        <label for="product_type_id" class="col-form-label ">ประเภทสินค้า</label>
                                        <select class="form-control" id="product_type_id" name="product_type_id"
                                            required>
                                            <option value="">---</option>
                                            @foreach ($product_types as $product_type)
                                                <option value="{{ $product_type->id }}">
                                                    {{ $product_type->product_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="type_id" class="col-form-label ">ชนิดสินค้า</label>
                                        <select class="form-control" id="type_id" name="type_id" required>
                                            <option value="">---</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="product_image" class="col-form-label">รูปสินค้า</label>
                                        <input type="file" class="form-control" value="" name="product_image"
                                            id="product_image">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="{{ $dd->type_id }}"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <select class="col-sm-6 mx-2" value="{{ $dd->type_id }}"  id="{{ $dd->type_id }}" name="{{ $dd->type_id }}"
                                         required>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                        @endforeach

                                </select>
                            </div> --}}
                            </div>
                            <div><button type="submit" value="บันทึก" class="btn btn-success my-2 mx-3">บันทึก</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- สิ้นสุดเพิ่มชนิดสินค้า Modal --}}
    </section>
@endsection
