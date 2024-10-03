@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/styleHomePage.css">
    <style>
        .formAddHomePage .form-group {
            margin-bottom: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .section-heading {
            margin-top: 40px;
        }

        .img-thumbnail {
            max-width: 150px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')

    <h2 class="mb-5 pt-3 titleBlogs">Services</h2>

    <!-- Tab navigation -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#serviceList">Service List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#addService">Add Service Page</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <!-- Service List Tab -->
        <div id="serviceList" class="tab-pane fade show active">
            <!-- Table for listing main services -->
            <table class="table">
                <thead>
                <tr>
                    <th>Name Service</th>
                    <th>Description Service</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(!$services)
                    <tr>
                        <td colspan="3">No services found</td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $services->title }}</td>
                        <td>{{ $services->description }}</td>
                        <td>
                            <!-- Button to trigger edit modal for the main service -->
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMainServiceModal">Edit</button>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>

            <!-- Table for listing service boxes -->
            <table class="table">
                <thead>
                <tr>
                    <th>Name Service</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(!$servicesBoxes)
                    <tr>
                        <td colspan="4">No services found</td>
                    </tr>
                @else
                    @foreach($servicesBoxes as $box)
                        <tr class="w-100">
                            <td>{{ $box->title }}</td>
                            <td>
                                <div class="d-flex" style="gap:10px">
                                    <button class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editServiceBoxModal"
                                            data-title="{{ $box->title }}"
                                            data-description="{{ $box->description }}"
                                            data-id="{{ $box->id }}"
                                            data-icon-url="{{ Storage::url($box->icon) }}"
                                            data-image-url="{{ Storage::url($box->image) }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('servicesBox.destroy', $box->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

        <!-- Add Service Box Tab -->
        @if($services)
            <div id="addService" class="tab-pane fade">
                <form action="{{ route('servicesBox.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $services->id }}">

                    <!-- Title Field -->
                    <div class="form-group mb-3">
                        <label for="title">Service Name</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter the name of the service">
                    </div>

                    <!-- Description Field -->
                    <div class="form-group mb-3">
                        <label for="serviceBoxDescription">Service Subtitle</label>
                        <textarea id="serviceBoxDescription" name="description" class="form-control" placeholder="Enter a short description of the service"></textarea>
                    </div>

                    <!-- Icon Upload -->
                    <div class="form-group mb-3">
                        <label for="iconForStore">Upload Service Icon</label>
                        <input type="file" name="iconForStore" class="form-control" id="iconForStore" accept="image/*">
                        <small class="form-text text-muted">Accepted file formats: jpg, png, svg</small>
                    </div>

                    <!-- Image Upload -->
                    <div class="form-group mb-3">
                        <label for="imageServiceBox">Upload Service Image</label>
                        <input type="file" name="imageServiceBox" class="form-control" id="imageServiceBox" accept="image/*">
                        <small class="form-text text-muted">Accepted file formats: jpg, png, svg</small>
                    </div>

                    <button class="btn btn-primary mb-3">Add Service Page</button>
                </form>
            </div>
        @endif
    </div>

    <!-- Modal for Editing Service Box -->
    <div class="modal fade" id="editServiceBoxModal" tabindex="-1" aria-labelledby="editServiceBoxModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editServiceBoxModalLabel">Edit Service Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for Editing Service Box -->
                    <form action="{{ route('servicesBox.update', 'placeholder_id') }}" method="post" enctype="multipart/form-data" id="editServiceBoxForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="service_id" value="{{ $services->id }}">
                        <input type="text" name="title" class="form-control mb-3" placeholder="Name Service" id="serviceBoxTitle">
                        <textarea name="description" class="form-control mb-3" placeholder="Subtitle Service" id="serviceBoxDescriptionModal"></textarea>

                        <!-- Icon preview -->
                        <div id="iconPreviewContainer" class="mb-3 mt-3" style="display: none;">
                            <label>Current Icon:</label>
                            <img id="iconPreview" class="img-thumbnail">
                        </div>
                        <input type="file" name="iconForEdit" class="form-control mb-3 mt-3" accept="image/*">

                        <!-- Image preview -->
                        <div id="imagePreviewContainer" class="mb-3" style="display: none;">
                            <label>Current Image:</label>
                            <img id="imagePreview" class="img-thumbnail">
                        </div>
                        <input type="file" name="imageServiceBox" class="form-control mb-3 mt-3" accept="image/*">

                        <button class="btn btn-primary">Update Service Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const csrfToken = '{{ csrf_token() }}';

            // Initialize CKEditor for service box description textarea
            ClassicEditor
                .create(document.querySelector('#serviceBoxDescription'), {
                    ckfinder: {
                        uploadUrl: "{{ route('admin.updatePicture') }}?_token=" + csrfToken
                    },
                    toolbar: [
                        'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                        'blockQuote', 'imageUpload', 'insertTable', 'undo', 'redo'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });

            // Initialize CKEditor for service box description in edit modal
            const editModal = document.getElementById('editServiceBoxModal');
            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const title = button.getAttribute('data-title');
                const description = button.getAttribute('data-description');
                const id = button.getAttribute('data-id');
                const iconUrl = button.getAttribute('data-icon-url');
                const imageUrl = button.getAttribute('data-image-url');

                // Update the modal's content
                const titleInput = editModal.querySelector('#serviceBoxTitle');
                const descriptionInput = editModal.querySelector('#serviceBoxDescriptionModal');
                const formAction = editModal.querySelector('#editServiceBoxForm');

                // Handle Icon Preview
                const iconPreviewContainer = editModal.querySelector('#iconPreviewContainer');
                const iconPreview = editModal.querySelector('#iconPreview');
                if (iconUrl) {
                    iconPreview.src = iconUrl;
                    iconPreviewContainer.style.display = 'block';
                } else {
                    iconPreviewContainer.style.display = 'none';
                }

                // Handle Image Preview
                const imagePreviewContainer = editModal.querySelector('#imagePreviewContainer');
                const imagePreview = editModal.querySelector('#imagePreview');
                if (imageUrl) {
                    imagePreview.src = imageUrl;
                    imagePreviewContainer.style.display = 'block';
                } else {
                    imagePreviewContainer.style.display = 'none';
                }

                titleInput.value = title;
                descriptionInput.value = description;
                formAction.action = formAction.action.replace('placeholder_id', id);

                // Initialize CKEditor for service box description in the modal
                ClassicEditor
                    .create(descriptionInput, {
                        ckfinder: {
                            uploadUrl: "{{ route('admin.updatePicture') }}?_token=" + csrfToken
                        },
                        toolbar: [
                            'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                            'blockQuote', 'imageUpload', 'insertTable', 'undo', 'redo'
                        ],
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        });
    </script>
@endsection
