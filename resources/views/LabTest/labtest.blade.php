@extends('layout.master')
@section('title', 'Lab Test Category')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Lab Test Cat</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Lab Test Cat</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Lab Test Cat</h4>
                <p class="text-right">
                    <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                        data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i> Add Lab Test Category</button>
                </p>
                <h6 class="text-center">List of all Lab Test Category</h6>

                <div class="table-responsive">
                    <table class="table table-hover mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category List</th>
                                <th>Test Ptice</th>
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($labtest as $item)
                                <tr id="labtest{{ $item->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td class="text-wrap">{{ $item->cat_name }}</td>
                                    <td class="text-wrap">{{ $item->price }}</td>
                                    <td class="text-wrap">
                                        {{-- <input name="status" class="status" id="status" type="checkbox"
                                            data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="xs"
                                            data-onstyle="success" data-offstyle="danger" data-id="{{ $item->id }}"
                                            {{ $item->status == 1 ? 'checked' : '' }}> --}}
                                    </td>
                                    <td>
                                        <a href=".modal-demo2"
                                            class="btn btn-sm btn-outline-purple waves-effect cabin-status-edit"
                                            data-animation="slip" data-plugin="custommodal" data-overlaySpeed="100"
                                            data-overlayColor="#36404a" onclick="editlabtest({{ $item->id }})"><i
                                                class="mdi mdi-pencil-outline"></i></a>
                                        <a href="javascript:void(0);" data-id="{{ $item->id }}"
                                            class="btn btn-danger btn-sm deletebtn">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div> <!-- container -->


    {{-- Employees Add Models Start --}}
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Add Lab Test Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form role="form" class="parsley-examples" id="LabTestForm" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="cat_name" class="col-sm-4 col-form-label">Category Name<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="cat_name"
                                    name="cat_name" placeholder="X-Ray">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label">Price<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required parsley-type="text" class="form-control" id="price"
                                    name="price" placeholder="Price">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-sm-8 offset-sm-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Submit
                                </button>
                                <button type="button" data-dismiss="modal" class="btn btn-light waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    {{-- Employees Add Models End --}}

    {{-- Data Edit Model Start --}}
    <div id="custom-modal" class="modal-demo modal-demo2">
        <button type="button" class="close" onclick="Custombox.modal.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Update Information</h4>
        <div class="custom-modal-text">
            <form class="forms-sample" id="LabTesteditForm" enctype="multipart/form-data">
                @csrf

                {{-- <ul class="alert alert-warning d-none" id="save_errorList"></ul> --}}
                <input type="hidden" name="id" id="id">

                <div class="form-group row">
                    <label for="cat_name" class="col-sm-3 col-form-label">Category Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cat_name1" placeholder="Category Name"
                            name="cat_name1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cat_name" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="price1"
                            name="price1">
                    </div>
                </div>


                <div class="text-center pb-2">
                    <button type="button" class="btn btn-secondary" onclick="Custombox.modal.close()";>Close</button>
                    <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit" />
                </div>
            </form>
        </div>
    </div>

    {{-- Data Edit Modal End --}}

    <script>
        $(function() {
            var table = $('.datatable').DataTable();
            $('#LabTestForm').on('submit', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myformData = new FormData($('#LabTestForm')[0]);
                $.ajax({
                    type: "post",
                    url: "/labtest/add",
                    data: myformData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $("#LabTestForm").find('input').val('');
                        $('.bs-example-modal-xl').modal('hide');
                        // $('#medicineaddform')[0].reset();
                        Swal.fire({
                            position: 'top-mid',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });
                        // table.draw();
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Data Not Save");
                    }
                });
            });







            $('body').on('click', '.deletebtn', function() {
                var id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "If You Remove A Employee, This System Also Remove User ID. You Will Not Be Able To Recover It!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value === true) {
                        var token = $("meta[name='csrf-token']").attr("content");
                        $.ajax({
                            type: "DELETE",
                            url: "/labtest/" + id,
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    icon: 'success',
                                    showConfirmButton: false,
                                });
                                location.reload();
                            },
                            error: function(data) {
                                Swal.fire({
                                    title: 'Alert!',
                                    text: 'Something Wrong',
                                    icon: 'alert',
                                    showConfirmButton: false,
                                });
                                // console.log('Error:', data);
                            }
                        })

                    }
                });
            });
        });

        function editlabtest(id) {
                $.get("/labtest/edit/" + id, function(labtest) {
                    $('#id').val(labtest.id);
                    $('#cat_name1').val(labtest.cat_name);
                    $('#price1').val(labtest.price);
                });
            }
            $('#LabTesteditForm').submit(function(e) {
                e.preventDefault();

                let id = $('#id').val();
                let cat_name1 = $('#cat_name1').val();
                let price1 = $('#price1').val();
                let _token = $('input[name=_token]').val();

                $.ajax({
                    type: "PUT",
                    url: "/labtest/update",
                    data: {
                        id: id,
                        cat_name1: cat_name1,
                        price1: price1,
                        _token:_token,
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#labtest' + response.id + 'td:nth-child(1)').text(response.cat_name1);
                        $('#labtest' + response.id + 'td:nth-child(2)').text(response.price1);
                        $('.modal-demo2').modal("toggle");
                        Swal.fire({
                            position: 'top-mid',
                            icon: 'success',
                            title: 'Update Successfull',
                            showConfirmButton: false,
                            timerProgressBar: true,
                            timer: 1800
                        });
                        location.reload();
                        // console.log
                        $('#LabTesteditForm')[0].reset();

                    },
                            error: function(data) {
                                Swal.fire({
                                    title: 'Alert!',
                                    text: 'Something Wrong',
                                    icon: 'alert',
                                    showConfirmButton: false,
                                });
                                // console.log('Error:', data);
                            }
                });

            });
    </script>
@endsection
