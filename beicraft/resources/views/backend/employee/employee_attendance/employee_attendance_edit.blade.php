@extends('admin.admin_master')
@section('admin-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Edit Attendance</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('employee.attendance.view') }}">Manage Employee List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Attendance</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Attendance</h4>
                    <h6 class="box-subtitle">On how to use form please visit <a class="text-warning" href="http://chream/holy-infant-academy.co.uk">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    <div class="col">
                        <form method="POST" action=" {{ route('employee.attendance.store') }} ">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Attendance Date<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="date" class="form-control" value="{{ $edit_data['0']['date'] }}" required>
                                                </div>
                                            </div>
                                        </div><!-- /.col-md-6 -->
                                    </div><!-- /.row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">SN</th>
                                                        <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee List</th>
                                                        <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%">Attendance Status</th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center btn present_all" style="display: table-cell; background-color: #0a0320">Present</th>
                                                        <th class="text-center btn leave_all" style="display: table-cell; background-color: #0a0320">Leave</th>
                                                        <th class="text-center btn absent_all" style="display: table-cell; background-color: #0a0320">Absent</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($edit_data as $key => $data)
                                                        <tr class="text-center" id="div{{$data->id}}">
                                                            <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                                                            <td>{{ $key + 1 }}</td>
                                                            <td> {{ $data['user']['name'] }} </td>
                                                            <td colspan="3">
                                                                <div class="switch-toggle switch-3 switch-candy">
                                                                    <input type="radio" name="attend_status{{$key}}" id="present{{$key}}" value="Present" checked="checked" {{ ($data->attend_status == 'Present') ? 'checked' : '' }}>
                                                                    <label for="present{{$key}}">Present</label>

                                                                    <input type="radio" name="attend_status{{$key}}" value="Leave" id="leave{{$key}}" {{ ($data->attend_status == 'Leave') ? 'checked' : '' }}>
                                                                    <label for="leave{{$key}}">Leave</label>

                                                                    <input type="radio" name="attend_status{{$key}}" value="Absent" id="absent{{$key}}" {{ ($data->attend_status == 'Absent') ? 'checked' : '' }}>
                                                                    <label for="absent{{$key}}">Absent</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>


                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->

        </div>
    </div>
<!-- /.content-wrapper -->

@endsection
