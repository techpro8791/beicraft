@extends('admin.admin_master')
@section('admin-content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Edit Assigned Subject</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('assign.subject.view') }}">Assign Subject</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Assigned Subject</li>
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
                    <h4 class="box-title">Edit Assigned Subject</h4>
                    <h6 class="box-subtitle">On how to use form please visit <a class="text-warning" href="http://chream/holy-infant-academy.co.uk">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    <div class="col">
                        <form method="POST" action=" {{ route('assign.subject.update', $edit_data[0]->class_id) }} ">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="add_item">

                                        <div class="form-group">
                                            <h5> Student Class <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="class_id" required class="form-control">
                                                    <option value="" selected disabled>Select Class</option>
                                                    @foreach ($student_classes as $student_class)
                                                        <option value="{{ $student_class->id }}" {{ ($edit_data['0']->class_id == $student_class->id)? "selected" : "" }} >{{ $student_class->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        @foreach($edit_data as $edit)
                                            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5> Student Subject<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="subject_id[]" required class="form-control">
                                                                    <option value="" selected disabled>Select Subject</option>
                                                                    @foreach ($school_subjects as $school_subject)
                                                                        <option value="{{ $school_subject->id }}" {{ ($edit->subject_id == $school_subject->id) ? "selected" : ""}}>{{ $school_subject->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div><!-- ./controls -->
                                                        </div><!-- ./form-group -->
                                                    </div><!-- ./col-md-3 -->

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Full Mark<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="full_mark[]" value=" {{ $edit->full_mark }} " class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div><!-- ./col-md-2 -->

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Pass Mark<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pass_mark[]" value=" {{ $edit->pass_mark }} " class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div><!-- ./col-md-2 -->

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h5>Subjective Mark<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="subjective_mark[]" value=" {{ $edit->subjective_mark }} " class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div><!-- ./col-md-2 -->

                                                    <div class="col-md-2" style="padding-top: 23px;">
                                                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                                                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                                                    </div><!-- ./col-md-2 -->

                                                </div><!-- ./row -->
                                            </div><!-- ./delete_whole_extra_item_add -->
                                        @endforeach

                                    </div><!-- /.add_item -->

                                </div><!-- /.col-12 -->
                            </div><!-- /.row -->
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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

    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <h5> Student Subject<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subject_id[]" required class="form-control">
                                    <option value="" selected disabled>Select Subject</option>
                                    @foreach ($school_subjects as $school_subject)
                                        <option value="{{ $school_subject->id }}">{{ $school_subject->name }}</option>
                                    @endforeach
                                </select>
                            </div><!-- ./controls -->
                        </div><!-- ./form-group -->
                    </div><!-- ./col-md-3 -->

                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Full Mark<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" class="form-control" required>
                            </div>
                        </div>
                    </div><!-- ./col-md-2 -->

                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Pass Mark<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" class="form-control" required>
                            </div>
                        </div>
                    </div><!-- ./col-md-2 -->

                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Subjective Mark<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subjective_mark[]" class="form-control" required>
                            </div>
                        </div>
                    </div><!-- ./col-md-2 -->

                    <div class="col-md-2" style="padding-top: 23px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                    </div><!-- ./col-md-2 -->

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            var counter = 0;
            $(document).on("click", ".addeventmore", function(){
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function(){
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1
            });
        });
    </script>

@endsection
