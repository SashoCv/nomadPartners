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
    <h2 class="mb-5 pt-3 titleBlogs">Partners</h2>

    <!-- Table for listing partners -->
    <table class="table">
        <thead>
        <tr>
            <th>Name Partner</th>
            <th>Logo Partner</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($partners as $partner)
            <tr>
                <td>{{ $partner->namePartner }}</td>
                <td style="width: 100px; height: 100px">
                    <img src="{{ Storage::url($partner->logoPath) }}" alt="Partner Logo" width="100%">
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPartnerModal" data-id="{{ $partner->id }}" data-name="{{ $partner->namePartner }}" data-logo="{{ Storage::url($partner->logoPath) }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-partner="{{ $partner->namePartner }}" data-action="{{ route('admin.deletePartner', $partner->id) }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Button to trigger form popup -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
        Add Partner
    </button>

    <!-- Modal for adding a partner -->
    <div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPartnerModalLabel">Add Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.partnersPost') }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        <div class="form-group">
                            <label for="namePartner">Name Partner</label>
                            <input type="text" class="form-control" id="namePartner" name="namePartner" required>
                        </div>

                        <div class="form-group">
                            <label for="logoPathPartner">Logo Partner</label>
                            <input type="file" class="form-control-file" id="logoPathPartner" name="logoPathPartner" required>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing a partner -->
    <div class="modal fade" id="editPartnerModal" tabindex="-1" aria-labelledby="editPartnerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPartnerModalLabel">Edit Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPartnerForm" method="POST" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editNamePartner">Name Partner</label>
                            <input type="text" class="form-control" id="editNamePartner" name="namePartner" required>
                        </div>

                        <div class="form-group">
                            <label for="editLogoPathPartner">Logo Partner</label>
                            <input type="file" class="form-control-file" id="editLogoPathPartner" name="logoPathPartner">
                            <img id="editLogoPreview" src="" alt="Current Logo" style="margin-top: 10px; width: 100px; height: auto;">
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <span id="partnerName"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script>
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var partnerName = button.data('partner');
            var action = button.data('action');

            var modal = $(this);
            modal.find('#partnerName').text(partnerName);
            modal.find('#deleteForm').attr('action', action);
        });

        $('#editPartnerModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var partnerId = button.data('id');
            var partnerName = button.data('name');
            var partnerLogo = button.data('logo');

            var modal = $(this);
            var form = modal.find('#editPartnerForm');
            form.attr('action', '{{ url("partners") }}/' + partnerId);
            form.find('#editNamePartner').val(partnerName);
            form.find('#editLogoPreview').attr('src', partnerLogo);
        });
    </script>
@endsection
