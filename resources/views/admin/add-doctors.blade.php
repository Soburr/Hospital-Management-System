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


                <form action="{{ url('upload-doctor') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div style="padding: 15px">
                        <label for="">DOCTOR NAME</label>
                        <input type="text" name="name" placeholder="Write the name">
                    </div>

                    <div style="padding: 15px">
                        <label for="">PHONE NUMBER</label>
                        <input type="number" name="number" placeholder="Enter the Number">
                    </div>

                    <div style="padding: 15px">
                        <label>SPECIALITY</label>
                        <select name="speciality" style="width: 200px;">
                            <option>--Select</option>
                            <option value="skin">Skin</option>
                            <option value="heart">Heart</option>
                            <option value="eye">Eye</option>
                            <option value="nose">Nose</option>
                        </select>
                    </div>

                    <div style="padding: 15px">
                        <label for="">ROOM NUMBER</label>
                        <input type="text" name="room" placeholder="Enter the Room Number">
                    </div>

                    <div style="padding: 15px">
                        <label for="">DOCTOR IMAGE</label>
                        <input type="file" name="file">
                    </div>

                    <div style="padding: 15px">
                        <input type="submit" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->

        @include('admin.script')

</body>

</html>
