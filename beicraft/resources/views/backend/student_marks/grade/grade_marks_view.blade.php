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
                                <h3 class="box-title">Grade Mark List</h3>
                                <a href="{{ route('marks.entry.grade.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Grade Mark</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SN</th>
                                                <th>Grade Name</th>
                                                <th>Grade Point</th>
                                                <th>Start Marks</th>
                                                <th>End Marks</th>
                                                <th>Point Rage</th>
                                                <th>Remarks</th>

                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_data as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value->grade_name }}</td>
                                                    <td>{{ $value->grade_point }}</td>
                                                    <td>{{ $value->start_marks }}</td>
                                                    <td>{{ $value->start_point }} - {{ $value->end_point }}</td>
                                                    <td>{{ $value->remarks }}</td>
                                                    <td>{{ '₦ '.number_format($value->salary) }}</td>

                                                    <td>
                                                        {{-- {{ route('value.registration.edit',$value->id) }} --}}
                                                        <center>
                                                            <a title="Edit" href="" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
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
