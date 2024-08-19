<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="/common.css">

    @yield('style')

    <style>
        .content {
            margin-top: 50px;
        }
        @media (min-width: 770px) {
            .mainContainer {
                width: 100%;
            }

            .content {
                width: 100%;
                margin-left: 260px;
                margin-right: 30px;
            }
        }
    </style>

</head>

<body>
    <div class="d-flex mainContainer">
        <div class="sideBar">
            @include('layouts.sidebar')
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

    @yield('scripts')

    <script>
        $(document).ready(function() {
            // Toggle sidebar on hamburger icon click
            $("#sidebarToggle").click(function() {
                $(".sidebarNav").toggleClass("active");
            });
        });
    </script>
</body>


</html>
