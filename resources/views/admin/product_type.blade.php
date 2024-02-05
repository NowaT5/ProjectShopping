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

                            <td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#edittypeModal{{ $dd->id }}">แก้ไข</button>

                                {{-- <td><a href="#edittypeModal{{ $dd->id }}" role="button" class="btn btn-sm btn-warning">Edit</a> --}}

                                <a href="{{ route('del.producttype', $dd->id) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('คุณต้องการลบ {{ $dd->product_type_name }} หรือไม่?')">ลบ</a>
                                {{-- <button type="button" class="btn btn-sm btn-danger delete-item"
                                data-id = "">Delete</button> --}}
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                </tbody>
                {{-- </table> --}}
        </div>

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
                    <form method="POST" action="/addproducttype">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-4 col-form-label text-right">ชื่อประเภทสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="" id="product_type_name"
                                            name="product_type_name" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="" id="type_id"
                                            name="type_id" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div><button type="submit" class="btn btn-success my-2 mx-3">บันทึก</button></div>

                </div>
                <input type="hidden" class="form-control" id="product_type_id" name="product_type_id" placeholder=""
                    autocomplete="off" value="">
                {{-- </form> --}}
            </div>
        </div>
        {{-- สิ้นสุดเพิ่มชนิดสินค้า Modal --}}

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


                                        {{-- สร้างตัวเลือกไม่ได้สักที --}}
                                        {{-- <select class="col-sm-6 mx-2" name="type_id" required>
                                            @foreach ($type as $types)
                                                <option value="{{ $types->type_id }}" {{ $dd->type_id == $types->type_id ? 'selected' : '' }}>
                                                    {{ $types->type_name }}
                                                </option>
                                            @endforeach
                                        </select> --}}

                                        {{-- <select class="col-sm-6 mx-2" name="type_id" required>
                                            @if ($type)
                                                @foreach ($type as $types)
                                                    <option value="{{ $types->type_id }}"
                                                        {{ $dd && $dd->type_id == $types->type_id ? 'selected' : '' }}>
                                                        {{ $types->type_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select> --}}

                                        {{-- <select class="col-sm-6 mx-2" value="{{ $dd->type_id }}" name="type_id"
                                            required>
                                            @foreach ($type as $types)
                                                <option value="{{ $dd->type_id }}">{{ $types->type_name }}</option>
                                            @endforeach
                                        </select> --}}

                                        {{-- <select> // ตัวอย่าง จาก stackoverflow
                                                <option value="{{ $users->city}}">{{ $users->city_name }}</option>
                                                @foreach ($cities->whereNotIn('id', [$users->city]) as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name_ru }}</option>
                                                @endforeach
                                            </select> --}}
                                        <select class="col-sm-6 mx-2" id="type_id" name="type_id" required>
                                            @if (isset($type) && is_array($type))
                                                @foreach ($type as $types)
                                                    <option value="{{ $types['type_id'] }}">
                                                        {{ $types['type_name'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success my-2 mx-3">บันทึก</button>
                        </div>
                </div>
                <input type="hidden" class="form-control" id="type_id" name="type_id" placeholder=""
                    autocomplete="off" value="">
                </form>
            </div>
        </div>
        {{-- สิ้นสุด Edit Modal --}}
        @endforeach

        </table>
    </section>
@endsection
<!-- สคริปต์ JavaScript -->
