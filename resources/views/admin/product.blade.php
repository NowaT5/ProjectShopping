@extends('layoutsAdmin.app')

@section('Productlist', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">รายการสินค้า</h2>
                <button type="button" class="btn bg-gradient-primary" id="Create">
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
                                        <th>type_id</th>
                                        <th>product_type_id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $dd)
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
                                            <td>{{ $dd->product_image }}</td>
                                            <td>{{ $dd->product_stock }}</td>
                                            <td>{{ $type->type_name }}</td>
                                            <td>{{ $product_type->product_type_name}}</td>
                                            <td>
                                                <a href="#" role="button" class="btn btn-sm btn-warning">Edit</a>
                                                {{-- <a href="#" role="button" class="btn btn-sm btn-danger">Delete</a> --}}
                                                <button type="button" class="btn btn-sm btn-danger delete-item"
                                                    data-id = "">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to
                                10 of
                                57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="example2_previous"><a
                                            href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a>
                                    </li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example2"
                                            data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                            data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                            data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="example2_next"><a href="#"
                                            aria-controls="example2" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
