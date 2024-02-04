@extends('layoutsAdmin.app')

@section('title', 'Type')
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

                            <td><button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                    data-target="#edittypeModal{{ $dd->id }}">แก้ไข</button>

                                {{-- <td><a href="#edittypeModal{{ $dd->id }}" role="button" class="btn btn-sm btn-warning">Edit</a> --}}

                                <a href="{{ route('deltype', $dd->id) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('คุณต้องการลบ {{ $dd->type_name }} หรือไม่?')">ลบ</a>
                                {{-- <button type="button" class="btn btn-sm btn-danger delete-item"
                                    data-id = "">Delete</button> --}}
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                </tbody>
                {{-- </table> --}}
        </div>

        {{-- เพิ่มชนิดสินค้า Modal --}}
        <div class="modal fade" id="addtypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มชนิดสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/addtype">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="" id="type_name"
                                            name="type_name" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div><button type="submit" class="btn btn-success my-2 mx-3">บันทึก</button></div>
                </div>
                <input type="hidden" class="form-control" id="type_id" name="type_id" placeholder="" autocomplete="off"
                    value="">
                </form>
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
                    <form method="POST" action="{{ route('type.edit', $dd->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="inputEmail3"
                                        class="col-sm-4 col-form-label text-right">ชื่อชนิดสินค้า</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $dd->type_name }}"
                                            id="type_name" name="type_name" required>
                                        <p class="text-danger mt-1 name_err"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success my-2 mx-3">บันทึก</button>
                        </div>
                </div>
                <input type="hidden" class="form-control" id="type_id" name="type_id" placeholder="" autocomplete="off"
                    value="">
                </form>
            </div>
        </div>
        {{-- สิ้นสุด Edit Modal --}}
        @endforeach
        </table>
    </section>
@endsection
{{-- @push('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush --}}
