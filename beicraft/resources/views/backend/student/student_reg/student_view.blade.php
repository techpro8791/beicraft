@extends('admin.admin_master')
@section('admin-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            {{-- <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">Add Student</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('student.registration.view') }}">View Students</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="box bb-3 border-warning">

                            <div class="box-header">
                                <h4 class="box-title">Student <strong>Search</strong></h4>
                            </div>

                            <div class="box-body">
                                <form action="{{ route('student.year.class.search') }}" method="GET">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Year</h5>
                                                <div class="controls">
                                                    <select name="year_id" required class="form-control">
                                                        <option value="" selected disabled>Select Year</option>
                                                        @foreach ($years as $year)
                                                            <option value="{{ $year->id }}" {{ (@$year_id == $year->id ? "selected" : "") }}>{{ $year->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- ./col-md-4 -->

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Class</h5>
                                                <div class="controls">
                                                    <select name="class_id" required class="form-control">
                                                        <option value="" selected disabled>Select Class</option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{ $class->id }}" {{ (@$class_id == $class->id ? "selected" : "") }}>{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- ./col-md-4 -->

                                        <div class="col-md-4" style="padding-top: 25px;">
                                            <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search" >
                                        </div><!-- ./col-md-4 -->

                                    </div><!--/.row -->
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Student</h3>
                                <a href="{{ route('student.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Student</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    {{-- @if (!@search) --}}
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SN</th>
                                                    <th>Name</th>
                                                    <th>ID Number</th>
                                                    <th>Role</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    @if (Auth::user()->role == "Admin")
                                                        <th>Code</th>
                                                    @endif


                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_data as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value['student']['name'] }}</td>
                                                        <td>{{ $value['student']['id_number'] }}</td>
                                                        <td>{{ $value->role }}</td>
                                                        <td>{{ $value['student_year']['name'] }}</td>
                                                        <td>{{ $value['student_class']['name'] }}</td>

                                                        <td>
                                                            <img id="show_image" src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}" style="width: 50px; height: 50px; ">

                                                        </td>
                                                        <td>{{ $value->year_id }}</td>
                                                        <td>
                                                            <a href=" {{ route('student.registration.edit', $value->student_id) }} " class="btn btn-info">Edit</a>
                                                            <a href=" {{ route('student.registration.promotion', $value->student_id) }} " class="btn btn-success">Promote</a>
                                                            <a href=" {{ route('student.registration.promotion', $value->student_id) }} " class="btn btn-info">Details</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    {{-- @else
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">SN</th>
                                                    <th>Name</th>
                                                    <th>ID Number</th>
                                                    <th>Role</th>
                                                    <th>Year</th>
                                                    <th>Class</th>
                                                    <th>Image</th>
                                                    @if (Auth::user()->role == "Admin")
                                                        <th>Code</th>
                                                    @endif


                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_data as $key => $value)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $value['student']['name'] }}</td>
                                                        <td>{{ $value['student']['id_number'] }}</td>
                                                        <td>{{ $value->role }}</td>
                                                        <td>{{ $value['student_year']['name'] }}</td>
                                                        <td>{{ $value['student_class']['name'] }}</td>

                                                        <td>
                                                            <img id="show_image" src="{{ (!empty($value['student']['image'])) ? url('upload/student_images/'.$value['student']['image']) : url('upload/no_image.jpg') }}" style="width: 50px; height: 50px; ">

                                                        </td>
                                                        <td>{{ $value->year_id }}</td>
                                                        <td>
                                                            <a href="  " class="btn btn-info">Edit</a>
                                                            <a href="  " class="btn btn-danger" id="delete">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif --}}

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
