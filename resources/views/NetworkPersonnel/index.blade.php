@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/styleHomePage.css">

    <style>
        .formAddNetworkPage .form-group {
            margin-bottom: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .section-heading {
            margin-top: 40px;
        }

        .section-content {
            display: none;
        }

        .navbar .add-carts-button {
            margin-left: auto;
        }

        .divContainer {
            justify-content: space-between;
        }
    </style>
@endsection

@section('content')
    <div>
        <h2 class="mb-5 pt-3 titleBlogs">Edit Network</h2>

        <nav class="navbar navbar-expand navbar-light bg-light w-100">
            <div class="w-100 d-flex divContainer">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#networkInfoSection">Network Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonialSection">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cartsSection">Carts Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cartsListSection">Carts List</a>
                    </li>
                </ul>
                <button type="button" class="btn btn-secondary add-carts-button" data-bs-toggle="modal" data-bs-target="#addCartsModal">
                    Add Carts
                </button>
            </div>
        </nav>

        <form action="{{ route('admin.networkPersonnelPost', $network->id) }}" method="POST" enctype="multipart/form-data" class="formAddNetworkPage">
            @csrf
            @method('PUT')

            <div id="networkInfoSection" class="section-content">
                <h2 class="section-heading">Network Information Section</h2>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $network->title }}">
                </div>

                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $network->subtitle }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $network->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <img src="{{ asset('storage/' . $network->image) }}" alt="Network Image" class="mt-3" style="width: 150px;">
                </div>
            </div>

            <div id="testimonialSection" class="section-content">
                <h2 class="section-heading">Testimonial Section</h2>
                <div class="form-group">
                    <label for="testimonial_title">Testimonial Title</label>
                    <input type="text" class="form-control" id="testimonial_title" name="testimonial_title" value="{{ $network->testimonial_title }}">
                </div>

                <div class="form-group">
                    <label for="testimonial_description">Testimonial Description</label>
                    <textarea class="form-control" id="testimonial_description" name="testimonial_description">{{ $network->testimonial_description }}</textarea>
                </div>
            </div>

            <div id="cartsSection" class="section-content">
                <h2 class="section-heading">Carts Section</h2>
                <div class="form-group">
                    <label for="carts_title">Carts Title</label>
                    <input type="text" class="form-control" id="carts_title" name="carts_title" value="{{ $network->carts_title }}">
                </div>

                <div class="form-group">
                    <label for="button_text">Button Text</label>
                    <input type="text" class="form-control" id="button_text" name="button_text" value="{{ $network->button_text }}">
                </div>

                <div class="form-group">
                    <label for="button_link">Button Link</label>
                    <input type="text" class="form-control" id="button_link" name="button_link" value="{{ $network->button_link }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-3 w-50" id="submitButton">Submit</button>
        </form>

        <!-- Modal for Add Carts -->
        <div class="modal fade" id="addCartsModal" tabindex="-1" aria-labelledby="addCartsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCartsModalLabel">Add Carts</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.addCarts') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $network->id }}" name="network_personnel_id">
                            <div class="form-group">
                                <label for="cart_title">Title</label>
                                <input type="text" class="form-control" id="cart_title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="cart_description">Description</label>
                                <textarea class="form-control" id="cart_description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cart_icon">Icon</label>
                                <input type="file" class="form-control" id="cart_icon" name="icon">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="cartsListSection" class="section-content mt-5">
            <h2 class="section-heading">Carts List</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Icon</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($carts as $cart)
                    <tr>
                        <td>{{ $cart->title }}</td>
                        <td>{{ $cart->description }}</td>
                        <td>
                            @if($cart->icon)
                                <img src="{{ asset('storage/' . $cart->icon) }}" alt="Cart Icon" style="width: 50px;">
                            @else
                                No icon
                            @endif
                        </td>
                        <td>
                            {{--need to be implemented--}}
                            <button type="button" class="btn btn-primary btn-sm btn-edit" data-bs-toggle="modal" data-bs-target="#editCartModal"
                                    data-id="{{ $cart->id }}" data-title="{{ $cart->title }}" data-description="{{ $cart->description }}">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#deleteCartModal"
                                    data-id="{{ $cart->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal for Edit Cart -->
        <div class="modal fade" id="editCartModal" tabindex="-1" aria-labelledby="editCartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCartModalLabel">Edit Cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCartForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="cart_id" id="edit_cart_id">

                            <div class="form-group">
                                <label for="edit_cart_title">Title</label>
                                <input type="text" class="form-control" id="edit_cart_title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="edit_cart_description">Description</label>
                                <textarea class="form-control" id="edit_cart_description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit_cart_icon">Icon</label>
                                <input type="file" class="form-control" id="edit_cart_icon" name="icon">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Delete Cart Confirmation -->
        <div class="modal fade" id="deleteCartModal" tabindex="-1" aria-labelledby="deleteCartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteCartModalLabel">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this cart? You need to have a minimum of 3 carts for this section.</p>
                    </div>
                    <div class="modal-footer">
                        <form id="deleteCartForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        const submitButton = document.getElementById('submitButton');

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.section-content').forEach(section => {
                    section.style.display = 'none';
                });

                const section = document.querySelector(this.getAttribute('href'));
                if (section) {
                    section.style.display = 'block';
                }

                if (this.getAttribute('href') === '#cartsListSection') {
                    submitButton.style.display = 'none';
                } else {
                    submitButton.style.display = 'block';
                }
            });
        });

        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const cartId = this.dataset.id;
                const title = this.dataset.title;
                const description = this.dataset.description;

                document.getElementById('edit_cart_id').value = cartId;
                document.getElementById('edit_cart_title').value = title;
                document.getElementById('edit_cart_description').value = description;

                const editCartForm = document.getElementById('editCartForm');
                editCartForm.action = `/update-carts/${cartId}`;
            });
        });

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const cartId = this.dataset.id;

                const deleteCartForm = document.getElementById('deleteCartForm');
                deleteCartForm.action = `/delete-carts/${cartId}`;
            });
        });
    </script>

@endsection
