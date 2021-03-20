<!DOCTYPE html>
<html>
    <head>
        <style>
        #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
        }
        </style>
    </head>

    <body>
        <table id="customers">
        <tr>
            <td>
                <h2>
                    <?php $image_path = '/upload/no_image.jpg'; ?>
                    <img src="{{ public_path() . $image_path }}" width="200" height="100">
                </h2>
            </td>
                <td>
                    <h2>Holy Infant Academy</h2>
                    <p>School Address</p>
                    <p>Phone : 343434343434</p>
                    <p>Email : holyinfant@chream.com</p>
                    <p>Employee : <b> Payslip</b> </p>
                </td>
        </tr>


        </table>

        @php
            $date = date('Y-m',strtotime($details['0']->date));
            if ($date !='') {
                $where[] = ['date','like',$date.'%'];
            }

            $total_attend = App\Models\EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $details['0']->employee_id)->get();

            $salary = (float)$details['0']['user']['salary'];
            $salary_per_day = (float)$salary/30;
            $absent_count = count($total_attend->where('attend_status','Absent'));
            $total_absent_deduction = (float)$absent_count * (float)$salary_per_day;
            $total_salary = (float)$salary - (float)$total_absent_deduction;

        @endphp

        <table id="customers">
            <tr>
                <th width="10%">SN</th>
                <th width="45%">Employee Details</th>
                <th width="45%">Employee Data</th>
            </tr>
            <tr>
                <td>1</td>
                <td><b>Employee Name</b></td>
                <td>{{ $details['0']['user']['name'] }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td><b>Basic Salary</b></td>
                <td>₦ {{ number_format($details['0']['user']['salary'], 2) }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td><b>Month</b></td>
                <td>{{ date('M Y', strtotime($details['0']->date)) }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td><b>Total Absent This Month</b></td>
                <td> {{ $absent_count }} @if ($absent_count > 1) days @else day @endif </td>
            </tr>
            <tr>
                <td>5</td>
                <td><b>Absent Deduction </b></td>
                <td>₦ {{ number_format($total_absent_deduction, 2)  }}</td>
            </tr>

            <tr>
                <td>6</td>
                <td><b>Salary This Month</b></td>
                <td>₦ {{ number_format($total_salary, 2) }}</td>
            </tr>


        </table>
        <br> <br>
        <i style="font-size: 10px; float: right;">Print Data : {{ date("d M Y") }}</i>

        <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">

        <table id="customers">
            <tr>
                <th width="10%">SN</th>
                <th width="45%">Employee Details</th>
                <th width="45%">Employee Data</th>
            </tr>
            <tr>
                <td>1</td>
                <td><b>Employee Name</b></td>
                <td>{{ $details['0']['user']['name'] }}</td>
            </tr>
            <tr>
                <td>2</td>
                <td><b>Basic Salary</b></td>
                <td>₦ {{ number_format($details['0']['user']['salary'], 2) }}</td>
            </tr>
            <tr>
                <td>3</td>
                <td><b>Month</b></td>
                <td>{{ date('M Y', strtotime($details['0']->date)) }}</td>
            </tr>
            <tr>
                <td>4</td>
                <td><b>Total Absent This Month</b></td>
                <td> {{ $absent_count }} @if ($absent_count > 1) days @else day @endif </td>
            </tr>
            <tr>
                <td>5</td>
                <td><b>Absent Deduction </b></td>
                <td>₦ {{ number_format($total_absent_deduction, 2)  }}</td>
            </tr>

            <tr>
                <td>6</td>
                <td><b>Salary This Month</b></td>
                <td>₦ {{ number_format($total_salary, 2) }}</td>
            </tr>


        </table>
        <br> <br>
        <i style="font-size: 10px; float: right;">Print Date : {{ date("d M Y") }}</i>

    </body>
</html>
