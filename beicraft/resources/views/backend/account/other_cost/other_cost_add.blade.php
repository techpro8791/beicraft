@extends('admin.admin_master')
@section('admin-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Add Other Cost</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('other.cost.view') }}">View Other Cost</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Other Cost</li>
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
                    <h4 class="box-title">Add Other Cost</h4>
                    <h6 class="box-subtitle">On how to use form please visit <a class="text-warning" href="http://chream/holy-infant-academy.co.uk">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('other.cost.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-12">

                                <!-- ROW 1 : class, year and group -->
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Amount<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="amount" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" class="form-control" id="image">
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 3 -->

                                <!-- ROW 2 : shift, image -->
                                <div class="row">

                                    <div class="col-md-8" >
                                        <div class="form-group">
                                            <h5>Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="description" id="description" class="form-control" required="" placeholder="Textarea text" aria-invalid="false"></textarea>
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div><!-- ./col-md-4 -->

                                    <div class="col-md-4">
                                           <div class="form-group" style="padding-top: 25px;">
                                                <div class="controls">
                                                    <img id="show_image" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height: 100px; border: 1px solid #000000;">
                                                </div>
                                            </div>
                                    </div><!-- ./col-md-4 -->

                                </div><!-- ./row 2 -->


                            </div>
                            <div class="col-md-4">
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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
