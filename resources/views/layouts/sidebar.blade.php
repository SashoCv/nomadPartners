<div class="d-flex sidebarNav flex-column p-3 bg-light" style="height: 100vh; position:fixed; width: 230px">

    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Nomad Partners</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.blogsView') }}" class="nav-link activeDashboard link-dark">
                Dashboard
            </a>
            <i class="fa-brands fa-codepen"></i>
        </li>

        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.homePageView') }}" class="nav-link activeDashboard link-dark">
                Home Page
            </a>
            <i class="fa-solid fa-house-chimney-window"></i>
        </li>

        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.aboutUsView') }}" class="nav-link activeDashboard link-dark">
                About Page
            </a>
            <i class="fa-regular fa-address-book"></i>
        </li>

        <li class="nav-item d-flex align-items-center justify-content-between">

            <a href="{{ route('admin.createBlogPost') }}" class="nav-link link-dark activeBlogs">
                Blogs
            </a>
            <i class="fa-brands fa-discourse"></i>
        </li>

        <li class="nav-item d-flex align-items-center justify-content-between">
            <form action="" method="post" class="nav-link link-dark">
                @csrf
                <button class="btn-sideBar" type="submit">Logout</button>
            </form>
            <i class="fa-solid fa-right-from-bracket "></i>
        </li>
    </ul>
</div>