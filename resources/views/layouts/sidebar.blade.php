<?php

use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Home;

$home = Home::all();
$aboutPage = AboutUs::all();
$contactPage = Contact::all();
?>

    <!-- Mobile Menu Trigger -->
<button class="hamburger-btn d-md-none" onclick="toggleSidebar()">
    <i id="hamburgerIcon" class="fa-solid fa-bars"></i>
</button>

<!-- Sidebar -->
<div id="sidebar" class="sidebarNav flex-column p-3 bg-light">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4" id="page-title">Nomad Partners</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item d-flex align-items-center justify-content-between">
            @if($home->isEmpty())
                <a href="{{ route('admin.homePageView') }}" class="nav-link link-dark {{ request()->routeIs('admin.homePageView') ? 'underline' : '' }}">
                    Home Page
                </a>
            @else
                <a href="{{ route('admin.homeViewForUpdate') }}" class="nav-link link-dark {{ request()->routeIs('admin.homeViewForUpdate') ? 'underline' : '' }}">
                    Home Page
                </a>
            @endif
            <i class="fa-solid fa-house-chimney-window"></i>
        </li>
        @if($aboutPage->isEmpty())
            <li class="nav-item d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.aboutUsView') }}" class="nav-link link-dark {{ request()->routeIs('admin.aboutUsView') ? 'underline' : '' }}">
                    About Page
                </a>
                <i class="fa-regular fa-address-book"></i>
            </li>
        @else
            <li class="nav-item d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.aboutUsViewForUpdate') }}" class="nav-link link-dark {{ request()->routeIs('admin.aboutUsViewForUpdate') ? 'underline' : '' }}">
                    About Page
                </a>
                <i class="fa-regular fa-address-book"></i>
            </li>
        @endif
        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.blogsView') }}" class="nav-link link-dark {{ request()->routeIs('admin.blogsView') ? 'underline' : '' }}">
                Blogs
            </a>
            <i class="fa-brands fa-codepen"></i>
        </li>
        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.createBlogView') }}" class="nav-link link-dark {{ request()->routeIs('admin.createBlogView') ? 'underline' : '' }}">
                Add Blog
            </a>
            <i class="fa-brands fa-discourse"></i>
        </li>
        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.partnersView') }}" class="nav-link link-dark {{ request()->routeIs('admin.partnersView') ? 'underline' : '' }}">
                Partners
            </a>
            <i class="fa-solid fa-handshake-simple"></i>
        </li>
        @if($contactPage->isEmpty())
            <li class="nav-item d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.contactView') }}" class="nav-link link-dark">
                    Contact Section
                </a>
                <i class="fa-solid fa-envelope"></i>
            </li>
        @else
            <li class="nav-item d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.contactViewForUpdate') }}" class="nav-link link-dark">
                    Contact Section
                </a>
                <i class="fa-solid fa-envelope"></i>
            </li>
        @endif
        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.contactUsSubmitView') }}" class="nav-link link-dark {{ request()->routeIs('admin.contactUsSubmitView') ? 'underline' : '' }}">
                Contact Us form submits
            </a>
            <i class="fa-solid fa-chart-line"></i>
        </li>
        <li class="nav-item d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.forBusinessView') }}" class="nav-link link-dark {{ request()->routeIs('admin.forBusinessView') ? 'underline' : '' }}">
                Business form submits
            </a>
            <i class="fa-solid fa-chart-line"></i>
        </li>
        <li class="nav-item d-flex align-items-center justify-content-between">
            <form action="{{ route('admin.logout') }}" method="post" class="nav-link link-dark">
                @csrf
                <button class="btn-sideBar" type="submit">Logout</button>
            </form>
            <i class="fa-solid fa-right-from-bracket"></i>
        </li>
    </ul>
</div>

<style>
    /* Sidebar and Main Content Layout */
    #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 230px;
        background-color: #f8f9fa;
        padding-top: 20px;
        transition: transform 0.3s ease;
        z-index: 1000;
    }

    #sidebar.show {
        transform: translateX(0); /* Show sidebar on toggle */
    }

    #sidebar.hide {
        transform: translateX(-230px); /* Hide sidebar on toggle */
    }

    /* Hamburger Button */
    .hamburger-btn {
        position: fixed;
        top: 15px;
        left: 15px;
        background: none;
        border: none;
        font-size: 24px;
        z-index: 1001;
    }

    /* Ensuring content doesn't get covered by sidebar */
    main {
        margin-left: 230px;
        transition: margin-left 0.3s ease;
    }

    @media (max-width: 767px) {
        .content {
            max-width: unset;
            padding-inline: 20px;
        }
        #sidebar {
            width: 100%; /* Full width on mobile */
            transform: translateX(-100%); /* Hide by default */
        }

        #sidebar.show {
            transform: translateX(0); /* Show when toggled */
        }

        main {
            margin-left: 0; /* No margin on mobile */
        }

        /* Fix hamburger button in mobile */
        .hamburger-btn {
            z-index: 1001;
            left: 15px;
            top: 15px;
        }
        #page-title {
            margin-left: 25px;
        }
    }
</style>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var icon = document.getElementById('hamburgerIcon');

        sidebar.classList.toggle('show');

        if (sidebar.classList.contains('show')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times'); // Change to X icon
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars'); // Revert to hamburger icon
        }
    }
</script>
