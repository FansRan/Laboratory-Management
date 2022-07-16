@extends('layout.master')
@section('title', 'Patients List')

@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Patients</li>
                    </ol>
                </div>
                <h4 class="page-title">Patients</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Patients</h4>
            <h6 class="text-center">List of all Patients</h6>

            <div class="table-responsive">
                <table class="table table-hover mb-0 patitent_datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Patient ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Blood Group</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div> <!-- container -->

<script>
    var table = $('.patitent_datatable').DataTable({
        processing: true
        , serverSide: true
        , ajax: {
            url: "{{ route('patients.list') }}"
        , }
        , columns: [{
                data: 'DT_RowIndex'
                , name: 'DT_RowIndex'
            }
            , {
                data: 'patient_id'
                , name: 'patient_id'
            }
            , {
                data: 'user_name'
                , name: 'user_name'
            }
            , {
                data: 'email'
                , name: 'email'
            }
            , {
                data: 'home_phone'
                , name: 'home_phone'
            }
            , {
                data: 'age'
                , name: 'age'
            }
            , {
                data: 'gender'
                , name: 'gender'
            }
            , {
                data: 'blood_group'
                , name: 'blood_group'
            }
            , {
                data: 'status'
                , name: 'status'
            }
            , {
                data: 'action'
                , name: 'action'
                , orderable: true
                , searchable: true
            }
        , ]
    });

</script>


@endsection
