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
                                <h3 class="box-title">Employee Salary List</h3>
                                <a href="{{ route('account.salary.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add / Edit Salary</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SN</th>
                                                <th>ID No</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_data as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value['user']['id_number'] }}</td>
                                                    <td>{{ $value['user']['name']  }}</td>
                                                    <td>{{ '₦ '.number_format($value->amount, 2)  }}</td>
                                                    <td>{{ date('M Y', strtotime($value->date))  }}</td>
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
