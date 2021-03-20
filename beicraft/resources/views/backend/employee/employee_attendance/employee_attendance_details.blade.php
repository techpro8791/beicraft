@extends('admin.admin_master')
@section('admin-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Employee Attendance Details</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('employee.attendance.view') }}">Manage Employee List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Employee Attendance Details</li>
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
                                <h3 class="box-title">Employee Attendance Details</h3>
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
                                                <th>Date</th>
                                                <th>Attendance Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $key => $value)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td> {{ $value['user']['name'] }} </td>
                                                    <td>{{ $value['user']['id_number'] }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($value->date)) }}</td>
                                                    <td>{{ $value->attend_status }}</td>
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
