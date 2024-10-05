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
    <h2 class="mb-5 ml-2 pt-3 titleBlogs">Visitor Messages</h2>

    <table class="table mb-4">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($items)
            <tr>
                <td>{{ $items->title }}</td>
                <td>{{ $items->description }}</td>
                <td>
                    @if($items->image)
                        <img src="{{ Storage::url($items->image) }}" alt="Item image" class="img-thumbnail" width="100">
                    @endif
                </td>
                <td>
                    <!-- Edit button to trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editItemModal"
                            data-id="{{ $items->id }}"
                            data-title="{{ $items->title }}"
                            data-description="{{ $items->description }}"
                            data-image="{{ $items->image }}">
                        Edit
                    </button>
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    <!-- Modal for editing title, description, and image -->
    <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editItemForm" method="POST" action="{{ route('admin.updateBusiness', $items->id) }}" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editItemTitle">Title</label>
                            <input type="text" class="form-control" id="editItemTitle" name="title" value="{{ $items->title }}">
                        </div>

                        <div class="form-group">
                            <label for="editItemDescription">Description</label>
                            <textarea class="form-control" id="editItemDescription" name="description" rows="4">{{ $items->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="editItemImage">Image</label>
                            <input type="file" class="form-control" id="editItemImage" name="image">
                            @if($items->image)
                                <img src="{{ Storage::url($items->image) }}" alt="Item image" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Table for listing business forms (messages) -->
    <table class="table">
        <thead>
        <tr>
            <th>From</th>
            <th>Company</th>
            <th>Phone number</th>
            <th>Message</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($allBusinessForms->count() > 0)
            @foreach ($allBusinessForms as $businessForm)
                <tr>
                    <td class="col-2">{{ $businessForm->first_name }} {{ $businessForm->last_name }}</td>
                    <td class="col-3">{{ $businessForm->company_name }}</td>
                    <td class="col-2">{{ $businessForm->phone_number }}</td>
                    <td class="col-4">{{ $businessForm->message }}</td>
                    <td class="col-2">
                        <a href="mailto:{{ $businessForm->email }}">{{ $businessForm->email }}</a>
                    </td>
                    <td class="col-2">
                        <form action="{{ route('admin.deleteBusinessSubmit', $businessForm->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this submit?');" class="m-0 p-0" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sideBar">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No messages found.</td>
            </tr>
        @endif
        </tbody>
    </table>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
        $('#editItemModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var description = button.data('description');
            var image = button.data('image');

            var modal = $(this);
            modal.find('#editItemTitle').val(title);
            modal.find('#editItemDescription').val(description);
        });
    </script>
@endsection
