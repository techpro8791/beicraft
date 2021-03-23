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
                                <h3 class="box-title">Other Cost List</h3>
                                <a href="{{ route('other.cost.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Other Cost</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SN</th>
                                                <th width="13%">Date</th>
                                                <th width="15%">Amount</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <center>
                                                    <th width="10%">Action</th>
                                                </center>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_data as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->date))  }}</td>
                                                    <td>{{ '₦ '.number_format($value->amount,2)}}</td>
                                                    <td>{{ $value->description }}</td>
                                                    <td style="width: 70px; height: 50px">
                                                        <center>
                                                            <img src="{{ (!empty($value->image)) ? url('upload/cost_images/'.$value->image) : url('upload/no_image.jpg') }}" alt="User Avatar">
                                                        </center>
                                                    </td>
                                                    <td>
                                                         <center>
                                                            <a title="Edit Details" href="{{ route('other.cost.edit', $value->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
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
