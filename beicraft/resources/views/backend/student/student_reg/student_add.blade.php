@extends('admin.admin_master')
@section('admin-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Add Student Record</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('student.registration.view') }}">View Students Record</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Student Record</li>
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
                    <h4 class="box-title">Add Student Record</h4>
                    <h6 class="box-subtitle">On how to use form please visit <a class="text-warning" href="http://chream/holy-infant-academy.co.uk">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('student.registration.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-12">

                                <!-- ROW 1 : Student, Father and Mother's Names -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Father's Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="father_name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mother's Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mother_name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 1 -->

                                <!-- ROW 2 : Mobile, Address and Gender -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mobile Number<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Address<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Gender<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="gender" required class="form-control">
                                                    <option value="" selected disabled>Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 2 -->

                                <!-- ROW 3 : Religion, Date of Birth and Discount -->
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Religion<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="religion" id="religion" required class="form-control">
                                                    <option value="" selected disabled>Select Religion</option>
                                                    <option value="Christian">Christian</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Artiest">Artiest</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date of Birth<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="dob" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Discount<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 3 -->

                                <!-- ROW 4 : class, year and group -->
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Year<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="year_id" required class="form-control">
                                                    <option value="" selected disabled>Select Year</option>
                                                    @foreach ($years as $year)
                                                        <option value="{{ $year->id }}">{{ $year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Class<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="class_id" required class="form-control">
                                                    <option value="" selected disabled>Select Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Group<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="group_id" required class="form-control">
                                                    <option value="" selected disabled>Select Group</option>
                                                    @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 3 -->

                                <!-- ROW 5 : shift, image -->
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Shift<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="shift_id" required class="form-control">
                                                    <option value="" selected disabled>Select Shift</option>
                                                    @foreach ($shifts as $shift)
                                                        <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Profile Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" class="form-control" id="image">
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <img id="show_image" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #000000;">
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 3 -->


                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
