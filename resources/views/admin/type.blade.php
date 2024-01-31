@extends('layoutsAdmin.app')

@section('Type_product', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">ชนิดสินค้า</h2>
                <button type="button" class="btn btn-sm btn-primary" id="Create" data-toggle="modal"
                    data-target="#addtypeModal">
                    <i class="fa fa-plus"></i> เพิ่มชนิดสินค้า
                </button>
            </div>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ชนิดสินค้า</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $dd)
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->type_name }}</td>
                            <td><a href="#" role="button" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger delete-item"
                                    data-id = "">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- เพิ่มชนิดสินค้า Modal --}}
        <div class="modal fade" id="addtypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <ul id="saveform_errList"></ul>

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มชนิดสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="type_name" name="type_name"
                                            placeholder="" autocomplete="off">
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                            ยกเลิก</button>
                        <button type="button" class="btn btn-success" id="savedata" value="create"><i
                                class="fa fa-save"></i> บันทึก</button>
                    </div>
                    <input type="hidden" class="form-control" id="type_id" name="type_id" placeholder=""
                        autocomplete="off" value="">
                </div>
            </div>
        </div>
        {{-- สิ้นสุดเพิ่มพนักงาน Modal --}}
    </section>
@endsection
@push('script')
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    
@endpush
