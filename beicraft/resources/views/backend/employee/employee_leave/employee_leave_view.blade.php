@extends('admin.admin_master')
@section('admin-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Employee Leave</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Manage Employee</li>
                                    <li class="breadcrumb-item active" aria-current="page">Employee Leave</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Employee Leave</h3>
                                <a href="{{ route('employee.leave.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Leave</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SN</th>
                                                <th>Name</th>
                                                <th>ID No.</th>
                                                <th>Purpose</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th width="13%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_data as $key => $leave)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $leave['user']['name'] }}</td>
                                                    <td>{{ $leave['user']['id_number'] }}</td>
                                                    <td>{{ $leave['purpose']['name'] }}</td>
                                                    <td>{{ $leave->start_date }}</td>
                                                    <td>{{ $leave->end_date }}</td>
                                                    <td>
                                                        <center>
                                                            <a title="Edit Details" href="{{ route('employee.leave.edit', $leave->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                                            <a title="Delete Details" href="{{ route('employee.leave.delete', $leave->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                                        </center>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
<!-- /.content-wrapper -->

@endsection
