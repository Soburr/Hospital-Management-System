<!DOCTYPE html>
<html lang="en">

<head>

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }

        input {
            width: 200px

        }
    </style>
    <base href="/public">

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


            <div class="container" align="center" style="padding-top: 100px;">

                @if (session()->has('message'))
                <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">x</button>

                   {{ session()->get('message') }}

                </div>
               @endif


                <form action="{{ url('editdoctor', $data->id) }}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div style="padding: 15px">
                        <label for="">DOCTOR NAME</label>
                        <input type="text" name="name" placeholder="Write the name" value={{ $data->name }}>
                    </div>

                    <div style="padding: 15px">
                        <label for="">PHONE NUMBER</label>
                        <input type="number" name="number" placeholder="Enter the Number" value={{ $data->number }}>
                    </div>

                    <div style="padding: 15px">
                        <label>SPECIALITY</label>
                        <input name="speciality" style="width: 200px;" value={{ $data->speciality }}>
                    </div>

                    <div style="padding: 15px">
                        <label for="">ROOM NUMBER</label>
                        <input type="text" name="room" placeholder="Enter the Room Number" value={{ $data->room }}>
                    </div>

                    <div style="padding: 15px">
                        <label for="">OLD IMAGE</label>
                        <img height="150px" src="doctorimage/{{ $data->image }}" alt="">
                    </div>

                    <div style="padding: 15px;">
                        <label for="">CHANGE IMAGE</label>
                        <input type="file" name="file">
                    </div>

                    <div style="padding: 15px">
                        <input type="submit" class="btn btn-success" value="UPDATE">
                    </div>

                </form>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->

        @include('admin.script')

</body>

</html>
