<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
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

        .formForChangingLanguage {
            position: fixed;
            top: 20px;
            right: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 2, 0.1);
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


        <div class="formForChangingLanguage">
            <?php
            $languageId = \Illuminate\Support\Facades\Auth::user()->language_id;
            ?>
            <form id="languageForm" action="{{ route('admin.update-language') }}" method="post">
                @csrf
                <select id="languageSelect" name="language" class="form-select" aria-label="Default select example">
                    <option value="1" <?php echo $languageId == 1 ? 'selected' : ''; ?>>English </option>
                    <option value="2" <?php echo $languageId == 2 ? 'selected' : ''; ?>>Bulgarian</option>
                </select>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

    @yield('scripts')

    <script>
        $(document).ready(function() {
            // Toggle sidebar on hamburger icon click
            $("#sidebarToggle").click(function() {
                $(".sidebarNav").toggleClass("active");
            });
        });


        document.getElementById('languageSelect').addEventListener('change', function() {
            const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : null;

            // Check if csrfToken exists before proceeding
            if (!csrfToken) {
                console.error('CSRF token not found.');
                return;  // Exit if CSRF token is missing
            }

            // Get selected language
            const languageId = this.value;

            console.log('Selected language:', languageId);
            // Send POST request using Fetch API
            fetch('{{ route('admin.update-language') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ language: languageId })
            })
                .then(response => response.json())
                .then(data => {
                    if(data.success) {
                        // Optionally, refresh page or update content dynamically
                        location.reload();
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>


</html>
