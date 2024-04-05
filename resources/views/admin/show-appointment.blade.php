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
                <th style="padding: 10px;">Patient's Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Date</th>
                <th style="padding: 10px;">Doctor's Name</th>
                <th style="padding: 10px;">Number</th>
                <th style="padding: 10px;">Message</th>
                <th style="padding: 10px;">Status</th>
                <th style="padding: 10px;">Approved</th>
                <th style="padding: 10px;">Cancelled</th>
             </tr>

             @foreach ($data as $appoint)
             <tr align="center">
                <td style="padding: 10px;">{{ $appoint->name }}</td>
                <td style="padding: 10px;">{{ $appoint->email }}</td>
                <td style="padding: 10px;">{{ $appoint->date }}</td>
                <td style="padding: 10px;">{{ $appoint->doctor }}</td>
                <td style="padding: 10px;">{{ $appoint->number }}</td>
                <td style="padding: 10px;">{{ $appoint->message }}</td>
                <td style="padding: 10px;">{{ $appoint->status }}</td>
                <td>
                    <a href="{{ url('approve', $appoint->id) }}" class="btn btn-success">
                        Approve
                    </a>
                </td>
                <td>
                    <a href="{{ url('cancel', $appoint->id) }}" class="btn btn-danger">
                        Cancel
                    </a>
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
