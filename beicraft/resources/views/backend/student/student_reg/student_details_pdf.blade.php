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
            <td><h2>Beicraft-CHREAM</h2></td>
            <td>
              <h2>Shool ERP-CHREAM</h2>
                <p> School Address : </p>
                <p> Phone :  </p>
                <p> Email : </p>
            </td>
        </tr>
      </table>

    <table id="customers">
    <tr>
        <th width="10%">SN</th>
        <th width="45%">Student Details</th>
        <th width="45%">Student Data</th>
    </tr>
    <tr>
        <td><b>1</b></td>
        <td><b>Name</b></td>
        <td>{{ $details['student']['name'] }}</td>
    </tr>
    <tr>
        <td><b>2</b></td>
        <td><b>Father's Name</b></td>
        <td>{{ $details['student']['father_name'] }}</td>
    </tr>
    <tr>
        <td><b>3</b></td>
        <td><b>Mother's Name</b></td>
        <td>{{ $details['student']['mother_name'] }}</td>
    </tr>
    <tr>
        <td><b>4</b></td>
        <td><b>Mobile Number</b></td>
        <td>{{ $details['student']['mobile'] }}</td>
    </tr>
    <tr>
        <td><b>5</b></td>
        <td><b>Address</b></td>
        <td>{{ $details['student']['address'] }}</td>
    </tr>
    <tr>
        <td><b>6</b></td>
        <td><b>Gender</b></td>
        <td>{{ $details['student']['gender'] }}</td>
    </tr>
    <tr>
        <td><b>8</b></td>
        <td><b>Student ID Number</b></td>
        <td>{{ $details['student']['id_number'] }}</td>
    </tr>
    <tr>
        <td><b>9</b></td>
        <td><b>Religion</b></td>
        <td>{{ $details['student']['religion'] }}</td>
    </tr>
    <tr>
        <td><b>10</b></td>
        <td><b>Date of Birth</b></td>
        <td>{{ $details['student']['dob'] }}</td>
    </tr>
    <tr>
        <td><b>11</b></td>
        <td><b>Discount</b></td>
        <td>{{ $details['discount']['discount'] }} %</td>
    </tr>
    <tr>
        <td><b>12</b></td>
        <td><b>Session Year</b></td>
        <td>{{ $details['student_year']['name'] }}</td>
    </tr>
    <tr>
        <td><b>13</b></td>
        <td><b>Student Class</b></td>
        <td>{{ $details['student_class']['name'] }}</td>
    </tr>
    <tr>
        <td><b>14</b></td>
        <td><b>Student Group</b></td>
        <td>{{ $details['group']['name'] }}</td>
    </tr>
    <tr>
        <td><b>15</b></td>
        <td><b>Shift</b></td>
        <td>{{ $details['shift']['name'] }}</td>
    </tr>
    <tr>
        <td><b>16</b></td>
        <td><b>Student Roll</b></td>
        <td>{{ $details->roll }}</td>
    </tr>

    </table>
    <br>
    <i style="font-size: 10px; float: right;">Print Date: {{ date("d M Y") }} </i>

</body>
</html>
