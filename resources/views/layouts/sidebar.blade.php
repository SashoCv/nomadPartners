<div class="d-flex sidebarNav flex-column p-3 bg-light" style="height: 100vh; position:fixed">

    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Nomad Partners</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="" class="nav-link activeDashboard link-dark">
                Dashboard
            </a>
            <i class="fa-brands fa-codepen"></i>
        </li>

        <li class="nav-item d-flex align-items-center justify-content-between">

            <a href="" class="nav-link link-dark activeBlogs">
                Blogs
            </a>
            <i class="fa-brands fa-discourse"></i>
        </li>

        <li class="nav-item d-flex align-items-center justify-content-between">
            <form action="" method="post" class="nav-link link-dark">
                @csrf
                <button class="" type="submit">Logout</button>
            </form>
            <i class="fa-solid fa-right-from-bracket "></i>
        </li>
    </ul>
</div>