@extends('admin.admin_master')
@section('admin-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Edit Grade Marks</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('marks.entry.grade.view') }}">View Grade Marks</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Grade Marks</li>
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
                    <h4 class="box-title">Edit Grade Marks</h4>
                    <h6 class="box-subtitle">On how to use form please visit <a class="text-warning" href="http://chream/holy-infant-academy.co.uk">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('marks.entry.grade.update', $edit_data->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-12">

                                <!-- ROW 1 : Student, Father and Mother's Names -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Grade Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="grade_name" class="form-control" value="{{ $edit_data->grade_name }}" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Grade Point<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="grade_point" class="form-control" value="{{ $edit_data->grade_point }}" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Start Marks<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="start_marks" class="form-control" value="{{ $edit_data->start_marks }}" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 1 -->

                                <!-- ROW 2 : Mobile, Address and Gender -->
                                <div class="row">


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>End Marks<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="end_marks" class="form-control" value="{{ $edit_data->end_marks }}" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Start Point<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="start_point" class="form-control" value="{{ $edit_data->start_point }}" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>End Point<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="end_point" class="form-control" value="{{ $edit_data->end_point }}" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->


                                </div><!-- ./row 2 -->

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Remarks<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="remarks" class="form-control" value="{{ $edit_data->remarks }}" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->
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
