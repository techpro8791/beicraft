@extends('admin.admin_master')
@section('admin-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Employee List</h3>
                                <a href="{{ route('employee.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Employee</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SN</th>
                                                <th>Name</th>
                                                <th>ID NO.</th>
                                                <th>Mobile</th>
                                                <th>Gender</th>
                                                <th>Join Date</th>
                                                <th>Salary</th>

                                                @if (Auth::user()->role == 'Admin')
                                                    <th>Code</th>
                                                @endif

                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_data as $key => $employee)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $employee->name }}</td>
                                                    <td>{{ $employee->id_number }}</td>
                                                    <td>{{ $employee->mobile }}</td>
                                                    <td>{{ $employee->gender }}</td>
                                                    <td>{{ $employee->join_date }}</td>
                                                    <td>{{ '₦ '.number_format($employee->salary) }}</td>

                                                    @if (Auth::user()->role == 'Admin')
                                                        <td>{{ $employee->code }}</td>
                                                    @endif

                                                    <td>
                                                        <center>
                                                            <a title="Edit" href="{{ route('employee.registration.edit',$employee->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                                            <a target="_blank" title="Details" href="{{ route('employee.registration.detail',$employee->id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
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
