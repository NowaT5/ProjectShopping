@extends('layoutsAdmin.app')

@section('Type_product', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">ประเภทสินค้า</h2>
                <button type="button" class="btn btn-sm btn-primary" id="Create">
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
                        @php
                            $types = DB::table('types')
                                ->where('id', $dd->type_id)
                                ->first();
                        @endphp

                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->product_type_name }}</td>
                            <td>{{ $types->type_name }}</td>
                            <td><a href="#" role="button" class="btn btn-sm btn-warning">Edit</a>
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
