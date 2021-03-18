@extends('admin.admin_master')
@section('admin-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Salary Review</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('employee.salary.view') }}">Salary List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Salary Review</li>
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
                    <h4 class="box-title">Salary Review</h4>
                    <h6 class="box-subtitle">On how to use form please visit <a class="text-warning" href="http://chream/holy-infant-academy.co.uk">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    <div class="col">
                        <form method="POST" action=" {{ route('employee.salary.store', $edit_data->id) }} ">
                            @csrf
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Salary Increament Amount<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="increament_salary" class="form-control" value=" {{ $edit_data->salary }} " required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Effected Date<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="effected_salary" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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
