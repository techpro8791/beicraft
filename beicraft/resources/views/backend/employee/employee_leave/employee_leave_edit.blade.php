@extends('admin.admin_master')
@section('admin-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <div class="content-header">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <h3 class="page-title">Edit Employee Leave</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('employee.leave.view') }}">Manage Employee Leave</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Employee Leave</li>
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
                    <h4 class="box-title">Edit Employee Leave</h4>
                    <h6 class="box-subtitle">On how to use form please visit <a class="text-warning" href="http://chream/holy-infant-academy.co.uk">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('employee.leave.update', $edit_data->id) }}">
                                @csrf
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5> Employee Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="employee_id" required class="form-control">
                                                    <option value="" selected disabled>Select Name</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}" {{ ($edit_data->employee_id == $employee->id) ? 'selected' : '' }}>{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Start Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input required type="date" name="start_date" value="{{ $edit_data->start_date }}"  class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5> Leave Purpose <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="leave_purpose_id" id="leave_purpose_id" required class="form-control">
                                                    <option value="" selected disabled>Select Purpose</option>
                                                    @foreach ($leave_purpose as $purpose)
                                                        <option value="{{ $purpose->id }}" {{ ($edit_data->leave_purpose_id == $purpose->id) ? 'selected' : '' }}>{{ $purpose->name }}</option>
                                                    @endforeach
                                                    <option value="0">Add New Purpose</option>
                                                </select>
                                                <input type="text" name="name" id="add_another" class="form-control" placeholder="Enter New Purpose" style="display: none;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>End Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input required type="date" name="end_date" value="{{ $edit_data->end_date }}" class="form-control" />
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

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','#leave_purpose_id',function(){
			var leave_purpose_id = $(this).val();
			if (leave_purpose_id == '0') {
				$('#add_another').show();
			}else{
				$('#add_another').hide();
			}
		});
	});
</script>

@endsection
