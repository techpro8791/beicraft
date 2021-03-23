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
                </td>
        </tr>


        </table>

        @php

            $student_fee = App\Models\AccountStudentFee::whereBetween('date',[$start_date,$end_date])->sum('amount');

            $other_cost = App\Models\AccountOtherCost::whereBetween('date',[$sdate,$edate])->sum('amount');

            $emp_salary = App\Models\AccountEmployeeSalary::whereBetween('date',[$start_date,$end_date])->sum('amount');

            $total_cost = $other_cost + $emp_salary;
            $profit     = $student_fee - $total_cost;

        @endphp

        <table id="customers">
            <tr>
                <td colspan="2" style="text-align: center">
                    <h4>Reporting Date: {{ date('d M Y', strtotime($sdate)) }} - {{ date('d M Y', strtotime($edate)) }}</h4>
                </td>
            </tr>
            <tr>
                <td width='50%'><h4>Purpose</h4></td>
                <td width='50%'><h4>Amount</h4></td>
            </tr>
            <tr>
                <td><b>Student Fee</b></td>
                <td>₦ {{ number_format($student_fee,2) }}</td>
            </tr>
            <tr>
                <td><b>Employee Salary</b></td>
                <td>₦ {{ number_format($emp_salary,2) }}</td>
            </tr>
            <tr>
                <td><b>Other Cost</b></td>
                <td>₦ {{ number_format($other_cost,2) }}</td>
            </tr>
            <tr>
                <td><b>Total Cost </b></td>
                <td>₦ {{ number_format($total_cost, 2)  }}</td>
            </tr>

            <tr>
                <td><b>Profit / Loss</b></td>
                <td>₦ {{ number_format($profit, 2) }}</td>
            </tr>

        </table>
        <br> <br>
        <i style="font-size: 10px; float: right;">Printed on : {{ date("d M Y") }}</i>
        <hr style="border: dashed 2px; width: 95%; color: #000000; margin-bottom: 50px">
    </body>
</html>
