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

        .card.card-body {
            white-space: pre-wrap;
            font-size: 0.95rem;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-outline-primary {
            font-size: 0.85rem;
        }

        .titleBlogs {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
        }

        .img-thumbnail {
            object-fit: cover;
        }

        .btn-toggle-message.active {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        .collapse.full-width-collapse td[colspan] {
            padding: 0 !important;
        }

        /* Custom collapse logic */
        tr[data-message-row] {
            display: none;
        }

        tr[data-message-row].open {
            display: table-row;
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

    <!-- Modal for editing -->
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

    <!-- Table for listing business form messages -->
    <table class="table table-bordered align-middle">
        <thead class="table-light">
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
                    <td>{{ $businessForm->first_name }} {{ $businessForm->last_name }}</td>
                    <td>{{ $businessForm->company_name }}</td>
                    <td>{{ $businessForm->phone_number }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary btn-toggle-message" type="button"
                                data-bs-target="#message{{ $businessForm->id }}">
                            View Message
                        </button>
                    </td>
                    <td>
                        <a href="mailto:{{ $businessForm->email }}">{{ $businessForm->email }}</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.deleteBusinessSubmit', $businessForm->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this submit?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                <tr id="message{{ $businessForm->id }}" data-message-row>
                    <td colspan="6" class="full-width-collapse">
                        <div class="card card-body bg-light">
                            {{ $businessForm->message }}
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center text-muted">No messages found.</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.btn-toggle-message');
            const collapses = document.querySelectorAll('tr[data-message-row]');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-bs-target');
                    const targetRow = document.querySelector(targetId);
                    const isOpen = targetRow.classList.contains('open');

                    // Затвори сите
                    collapses.forEach(row => row.classList.remove('open'));
                    buttons.forEach(btn => btn.classList.remove('active'));

                    // Ако не е отворен, отвори го тековниот
                    if (!isOpen) {
                        targetRow.classList.add('open');
                        this.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection
