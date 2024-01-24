@extends('layoutsAdmin.app')

@section('Employee', 'page')
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h2 class="text text-center py-2">พนักงาน</h2>
                {{-- <a href="{{ route('newemp') }}" role="button" class="btn btn-sm btn-primary"><i
                        class="fa fa-plus"></i>เพิ่มพนักงาน</a> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-modal-xl">เพิ่มพนักงาน</button>
            </div>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">อายุ</th>
                        <th scope="col">เพศ</th>
                        <th scope="col">Username</th>
                        <th scope="col">phone</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $dd)
                        @php
                            $emtype = DB::table('emtypes')
                                ->where('id', $dd->emtype_id)
                                ->first();
                        @endphp
                        <tr>
                            <td>{{ $dd->id }}</td>
                            <td>{{ $dd->fname }}</td>
                            <td>{{ $dd->lname }}</td>
                            <td>{{ $dd->age }}</td>
                            <td>{{ $dd->gender }}</td>
                            <td>{{ $dd->username }}</td>
                            <td>{{ $dd->phone }}</td>
                            <td>{{ $emtype->emtype_name }}</td>
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
    <div class="modal fade" id="exampleModal-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">เพิ่มพนักงาน</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="fname" class="col-form-label">ชื่อ</label>
                          <input type="text" class="form-control" placeholder="First name" id="fname">
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="col-form-label">นามสกุล</label>
                          <input type="text" class="form-control" placeholder="Last name" id="lname">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="age" class="col-form-label">อายุ</label>
                            <input type="text" class="form-control" placeholder="Age" id="age">
                        </div>
                        <div class="col">
                            <label for="phone" class="col-form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" placeholder="Phone" id="phone">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" id="username">
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="text" class="form-control" placeholder="Password" id="password">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <label for="emtype_id">ตำแหน่ง</label>
                            <select class="form-control" id="emtype_id">
                                <option value="">กรุณาเลือก..</option>
                                <option value="1">SuperAdmin</option>
                                <option value="2">Admin</option>
                                <option value="3">Manager</option>
                              </select>
                        </div>
                      </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>


      <script>
        $('#exampleModal-modal-xl').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('New message to ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })
    </script>
@endsection
