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
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Name Service</th>--}}
{{--                    <th>Description Service</th>--}}
{{--                    <th>Actions</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @if(!$services)--}}
{{--                    <tr>--}}
{{--                        <td colspan="3">No services found</td>--}}
{{--                    </tr>--}}
{{--                @else--}}
{{--                    <tr>--}}
{{--                        <td>{{ $services->title }}</td>--}}
{{--                        <td>{{ $services->description }}</td>--}}
{{--                        <td>--}}
{{--                            <!-- Button to trigger edit modal for the main service -->--}}
{{--                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMainServiceModal">Edit</button>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endif--}}
{{--                </tbody>--}}
{{--            </table>--}}

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
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editServiceBoxModal" data-title="{{ $box->title }}" data-description="{{ $box->description }}" data-id="{{ $box->id }}">Edit</button>
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
                    <input type="text" name="title" class="form-control mb-3" placeholder="Name Service">
                    <textarea id="serviceBoxDescription" name="description" class="form-control mb-3" placeholder="Subtitle Service"></textarea>
                    <input type="file" name="iconForStore" class="form-control mb-3 mt-3">
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
                    <form action="{{ route('servicesBox.update', 'placeholder_id') }}" method="post" enctype="multipart/form-data" id="editServiceBoxForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="service_id" value="{{ $services->id }}">
                        <input type="text" name="title" class="form-control mb-3" placeholder="Name Service" id="serviceBoxTitle">
                        <textarea name="description" class="form-control mb-3" placeholder="Subtitle Service" id="serviceBoxDescriptionModal"></textarea>
                        <input type="file" name="iconForEdit" class="form-control mb-3 mt-3">
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
                const title = button.getAttribute('data-title'); // Extract info from data-* attributes
                const description = button.getAttribute('data-description');
                const id = button.getAttribute('data-id');

                // Update the modal's content
                const titleInput = editModal.querySelector('#serviceBoxTitle');
                const descriptionInput = editModal.querySelector('#serviceBoxDescriptionModal');
                const formAction = editModal.querySelector('#editServiceBoxForm');

                titleInput.value = title;
                descriptionInput.value = description;
                formAction.action = formAction.action.replace('placeholder_id', id); // Update the form action URL
            });

            // Initialize CKEditor for service box description in edit modal
            editModal.addEventListener('shown.bs.modal', function() {
                const descriptionInput = editModal.querySelector('#serviceBoxDescriptionModal');
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

            // Destroy CKEditor instance when modal is hidden and refresh page
            editModal.addEventListener('hidden.bs.modal', function() {
                const descriptionInput = editModal.querySelector('#serviceBoxDescriptionModal');
                if (descriptionInput.classList.contains('ck-editor__editable')) {
                    ClassicEditor.instances[descriptionInput.id].destroy()
                        .catch(error => {
                            console.error(error);
                        });
                }
                // Refresh the page
                location.reload();
            });
        });
    </script>
@endsection
