@extends('admin.admin_master')
@section('admin-content')

    <div class="content-wrapper">
	    <div class="container-full">
		    <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Salary History View</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('employee.salary.view') }}">Salary List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Salary History View</li>
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

                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-black">
                                        <h3 class="widget-user-username">{{ $details->name }}</h3>
                                        <h6 class="widget-user-desc">{{ $details->usertype }}</h6>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="rounded-circle" src="{{ (!empty($details->image)) ? url('upload/employee_images/'.$details->image) : url('upload/no_image.jpg') }}" alt="User Avatar">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">Mobile Number</h5>
                                                    <span class="description-text">{{ $details->mobile }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 br-1 bl-1">
                                                <div class="description-block">
                                                    <h5 class="description-header">Address</h5>
                                                    <span class="description-text">{{ $details->address }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4">
                                                <div class="description-block">
                                                    <h5 class="description-header">Gender</h5>
                                                    <span class="description-text">{{ $details->gender }}</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>

                            </div>

                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Previous Salary</th>
                                            <th>Increamented Salary</th>
                                            <th>Present Salary</th>
                                            <th>Effected Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($salary_log as $key => $log )
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td> {{ $log->previous_salary }}</td>
                                                <td> {{ $log->increament_salary }}</td>
                                                <td> {{ $log->present_salary }}</td>
                                                <td> {{ $log->effected_salary }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
	    </div>
    </div>
@endsection
