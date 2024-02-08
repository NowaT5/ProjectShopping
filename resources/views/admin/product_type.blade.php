@extends('layoutsAdmin.app')

@section('title', 'Type_product')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">ประเภทสินค้า</h2>
                <button type="button" class="btn btn-sm btn-primary" id="Create" data-toggle="modal"
                    data-target="#addproducttypeModal">
                    <i class="fa fa-plus"></i> เพิ่มประเภทสินค้า
                </button>
            </div>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ประเภทสินค้า</th>
                        <th scope="col">ชนิดสินค้า</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product_type as $dd)
                        {{-- ดึงข้อมูลชนิด --}}
                        @php
                            $type = DB::table('types')
                                ->where('id', $dd->type_id)
                                ->first();
                        @endphp

                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->product_type_name }}</td>
                            <td>{{ $type->type_name }}</td>

                            <td>
                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#edittypeModal{{ $dd->id }}">แก้ไข</button>

                                {{-- <td><a href="#edittypeModal{{ $dd->id }}" role="button" class="btn btn-sm btn-warning">Edit</a> --}}

                                <a href="{{ route('del.product', $dd->id) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('คุณต้องการลบ {{ $dd->product_type_name }} หรือไม่?')">ลบ</a>
                                {{-- <button type="button" class="btn btn-sm btn-danger delete-item"
                                data-id = "">Delete</button> --}}
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                </tbody>
                {{-- </table> --}}
        </div>
        {{-- Edit Modal --}}
        <div class="modal fade" id="edittypeModal{{ $dd->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขชนิดสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('editproducttype.edit', $dd->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="product_type_name"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $dd->product_type_name }}"
                                            id="product_type_name" name="product_type_name" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>

                                    <div class="form-group row">
                                        <label for="type_id"
                                            class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                        <select class="col-sm-6 mx-2" id="type_id" name="type_id" required>
                                            {{-- <option value="">{{ $type->type_name }}</option> --}}
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ $dd->type_id == $type->id ? 'selected' : '' }}>
                                                    {{ $type->type_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success my-2 mx-3">บันทึก</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        @endforeach

        </table>
        {{-- เพิ่มชนิดสินค้า Modal --}}
        <div class="modal fade" id="addproducttypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มชนิดสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('addproducttype') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-4 col-form-label text-right">ชื่อประเภทสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="product_type_name"
                                            id="product_type_name" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="" id="type_id"
                                            name="type_id" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-4 mx-5">
                                    <label for="gender" class="col-form-label">เพศ</label>
                                    <select class="form-control" name="gender">
                                        <option value="">กรุณาเลือก..</option>
                                        <option value="Male">Male</option>
                                        <option value="female">Female</option>

                                    </select>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="type_id" class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <select class="form-control col-sm-6" id="type_id" name="type_id" required>
                                        <option value="">---</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                        @endforeach
                                    </select>
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

                </div>
            </div>
        </div>
        {{-- สิ้นสุดเพิ่มชนิดสินค้า Modal --}}

        {{-- Edit Modal --}}
        {{-- <div class="modal fade" id="edittypeModal{{ $dd->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขชนิดสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('editproducttype.edit', $dd->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="product_type_name"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $dd->product_type_name }}"
                                            id="product_type_name" name="product_type_name" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>

                                    <div class="form-group row">
                                        <label for="type_id"
                                            class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                        <select class="col-sm-6 mx-2" value="{{ $dd->type_id }}" id="type_id"
                                            name="type_id" required>
                                            @foreach ($types as $type)
                                                <option value="{{ $dd->type_id }}">{{ $type->type_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success my-2 mx-3">บันทึก</button>
                        </div>
                    </form>
                </div>

            </div>
        </div> --}}
        {{-- สิ้นสุด Edit Modal --}}

    </section>

@endsection
