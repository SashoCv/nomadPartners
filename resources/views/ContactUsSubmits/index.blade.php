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

        .btn-toggle-message.active {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        tr[data-message-row] {
            display: none;
        }

        tr[data-message-row].open {
            display: table-row;
        }

        .card.card-body {
            white-space: pre-wrap;
            font-size: 0.95rem;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn-sideBar {
            font-size: 0.85rem;
        }
    </style>
@endsection

@section('content')
    <h2 class="mb-5 pt-3 titleBlogs">Visitor Messages</h2>

    <table class="table">
        <thead>
        <tr>
            <th>From</th>
            <th>Message</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($allContactForms->count() > 0)
            @foreach ($allContactForms as $contactForm)
                <tr>
                    <td class="col-2">{{ $contactForm->full_name }}</td>
                    <td class="col-5">
                        <button class="btn btn-sm btn-outline-primary btn-toggle-message" type="button"
                                data-bs-target="#message{{ $contactForm->id }}">
                            View Message
                        </button>
                    </td>
                    <td class="col-3">
                        <a href="mailto:{{ $contactForm->email }}">{{ $contactForm->email }}</a>
                    </td>
                    <td class="col-2">
                        <form action="{{ route('admin.deleteContactSubmit', $contactForm->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this submit?');" class="m-0 p-0" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sideBar">Delete</button>
                        </form>
                    </td>
                </tr>
                <tr id="message{{ $contactForm->id }}" data-message-row>
                    <td colspan="4">
                        <div class="card card-body bg-light">
                            {{ $contactForm->message }}
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4">No messages found.</td>
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

                    // Close all rows and remove active from buttons
                    collapses.forEach(row => row.classList.remove('open'));
                    buttons.forEach(btn => btn.classList.remove('active'));

                    if (!isOpen) {
                        targetRow.classList.add('open');
                        this.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection
