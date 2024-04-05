<!DOCTYPE html>
<html lang="en">
<head>

    @include('admin.css')

</head>
<body>

    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
         @include('admin.sidebar')
      <!-- partial -->

         @include('admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div align="center" style="padding-top: 100px;">

                <table>
                    <tr style="background-color: black;">
                        <th style="padding: 10px;">Doctor's Name</th>
                        <th style="padding: 10px;">Phone Number</th>
                        <th style="padding: 10px;">Room Number</th>
                        <th style="padding: 10px;">Speciality</th>
                        <th style="padding: 10px;">Image</th>
                        <th style="padding: 10px;">Update</th>
                        <th style="padding: 10px;">Delete</th>
                    </tr>

                  @foreach ($data as $doctor)
                    <tr align="center">
                        <td style="padding: 10px;">{{ $doctor->name }}</td>
                        <td style="padding: 10px;">{{ $doctor->number }}</td>
                        <td style="padding: 10px;">{{ $doctor->room }}</td>
                        <td style="padding: 10px;">{{ $doctor->speciality }}</td>
                        <td style="padding: 10px;">
                            <img style="padding: 5px;" height="120px" width="100px" src="/doctorimage/{{ $doctor->image }}" alt="No available photo">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('update-doctor', $doctor->id) }}">Update</a>
                        </td>
                        <td>
                            <a onclick="return confirm('You will be deleting this doctor')" class="btn btn-danger" href="{{ url('delete-doctor', $doctor->id) }}">Delete</a>
                        </td>
                    </tr>
                  @endforeach
                </table>

            </div>

        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->

@include('admin.script')

</body>
</html>
