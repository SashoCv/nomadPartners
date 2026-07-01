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

        .faq-answer-cell {
            max-width: 480px;
            white-space: pre-line;
        }
    </style>
@endsection

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2 class="mb-3 pt-3 titleBlogs">FREQUENTLY ASKED QUESTIONS</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addFaqModal">
            Add Question
        </button>
    </div>

    <p class="text-muted">
        Questions are shown on the public site in the <strong>order</strong> below (lowest first),
        in the language you are currently editing. Switch the admin language to manage the other version.
    </p>

    <table class="table">
        <thead>
        <tr>
            <th style="width:40px;">Order</th>
            <th style="width:35%;">Question</th>
            <th>Answer</th>
            <th style="width:140px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($faqs as $faq)
            <tr>
                <td>{{ $faq->order }}</td>
                <td>{{ $faq->question }}</td>
                <td class="faq-answer-cell">{{ Str::limit($faq->answer, 220) }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editFaqModal"
                            data-id="{{ $faq->id }}"
                            data-question="{{ $faq->question }}"
                            data-answer="{{ $faq->answer }}"
                            data-order="{{ $faq->order }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteFaqModal"
                            data-question="{{ $faq->question }}"
                            data-action="{{ route('admin.deleteFaq', $faq->id) }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Add FAQ Modal -->
    <div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="addFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFaqModalLabel">Add Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.faqsPost') }}" method="POST" class="formAddHomePage">
                        @csrf
                        <div class="form-group">
                            <label for="faqQuestion">Question (in current language)</label>
                            <input type="text" class="form-control" id="faqQuestion" name="question" required>
                        </div>
                        <div class="form-group">
                            <label for="faqAnswer">Answer</label>
                            <textarea class="form-control" id="faqAnswer" name="answer" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="faqOrder">Order <small class="text-muted">(leave empty to append at the end)</small></label>
                            <input type="number" class="form-control" id="faqOrder" name="order">
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit FAQ Modal -->
    <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFaqModalLabel">Edit Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editFaqForm" method="POST" action="" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editFaqQuestion">Question</label>
                            <input type="text" class="form-control" id="editFaqQuestion" name="question" required>
                        </div>
                        <div class="form-group">
                            <label for="editFaqAnswer">Answer</label>
                            <textarea class="form-control" id="editFaqAnswer" name="answer" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editFaqOrder">Order</label>
                            <input type="number" class="form-control" id="editFaqOrder" name="order">
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteFaqModal" tabindex="-1" aria-labelledby="confirmDeleteFaqModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteFaqModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="confirmDeleteFaqItem"></strong>?</p>
                    <form id="confirmDeleteFaqForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mb-3 w-100">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#editFaqModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);

            modal.find('#editFaqQuestion').val(button.data('question'));
            modal.find('#editFaqAnswer').val(button.data('answer'));
            modal.find('#editFaqOrder').val(button.data('order'));

            $('#editFaqForm').attr('action', '/faqs/' + id);
        });

        $('#confirmDeleteFaqModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#confirmDeleteFaqItem').text(button.data('question'));
            $('#confirmDeleteFaqForm').attr('action', button.data('action'));
        });
    </script>
@endsection
