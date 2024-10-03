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
            <a class="nav-link" data-bs-toggle="tab" href="#addService">Add Service Box</a>
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

            <!-- Modal for Editing Main Service -->
            <div class="modal fade" id="editMainServiceModal" tabindex="-1" aria-labelledby="editMainServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMainServiceModalLabel">Edit Main Service</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        @if($services)
                            <div class="modal-body">
                                <form action="{{ route('services.update', $services->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="title" class="form-control mb-3" value="{{ $services->title }}" placeholder="Name Service">
                                    <textarea name="description" class="form-control mb-3" placeholder="Description Service">{{ $services->description }}</textarea>
                                    <button class="btn btn-primary">Update Service</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Table for listing service boxes -->
            <table class="table">
                <thead>
                <tr>
                    <th>Name Service</th>
                    <th>Subtitle Service</th>
                    <th>Icon</th>
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
                            <td>{{ $box->description }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $box->icon) }}" alt="no icon" style="max-width: 50px;">
                            </td>
                            <td>
                                <div class="d-flex" style="gap:10px">
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editServiceBoxModal{{ $box->id }}">Edit</button>
                                    <form action="{{ route('servicesBox.destroy', $box->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal for Editing Service Box -->
                        <div class="modal fade" id="editServiceBoxModal{{ $box->id }}" tabindex="-1" aria-labelledby="editServiceBoxModalLabel{{ $box->id }}" aria-hidden="true" data-bs-backdrop="static">
                            <div class="modal-dialog" style="max-width: 800px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editServiceBoxModalLabel{{ $box->id }}">Edit Service Box</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('servicesBox.update', $box->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="service_id" value="{{ $services->id }}">
                                            <input type="text" name="title" class="form-control mb-3" value="{{ $box->title }}" placeholder="Name Service">
                                            <textarea name="description" class="form-control mb-3" placeholder="Subtitle Service">{{ $box->description }}</textarea>
                                            <input type="file" name="iconForEdit" class="form-control mb-3">
                                            <button class="btn btn-primary">Update Service Box</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <input type="file" name="iconForStore" class="form-control mb-3">
                    <button class="btn btn-primary mb-3">Add Service Box</button>
                </form>
            </div>
        @endif
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

            // Initialize CKEditor for service box description in edit modals
            document.querySelectorAll('[id^="editServiceBoxModal"]').forEach(modal => {
                modal.addEventListener('shown.bs.modal', function() {
                    const textarea = modal.querySelector('textarea[name="description"]');
                    if (textarea.classList.contains('ck-editor__editable')) {
                        ClassicEditor.instances[textarea.id].destroy()
                            .then(() => {
                                ClassicEditor.create(textarea, {
                                    ckfinder: {
                                        uploadUrl: "{{ route('admin.updatePicture') }}?_token=" + csrfToken
                                    },
                                    toolbar: [
                                        'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                                        'blockQuote', 'imageUpload', 'insertTable', 'undo', 'redo'
                                    ],
                                });
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    } else {
                        ClassicEditor.create(textarea, {
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
                    }
                });
            });
        });
    </script>
@endsection
