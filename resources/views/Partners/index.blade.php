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

        .table th, .table td {
            vertical-align: middle; /* Поравнување на текстот по центар */
        }

        .table .partner-name {
            width: 30%; /* Ширина за името на партнерот */
        }

        .table .partner-logo {
            width: 100px; /* Ограничена ширина */
            object-fit: contain; /* Одржување на пропорциите на сликата */
        }

        .table .actions {
            width: 120px; /* Ширина за копчињата за акција */
            text-align: right; /* Поравнување на копчињата десно */
        }

        .partnersNameAndAdd {
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endsection

@section('content')
   <div class="d-flex partnersNameAndAdd">
       <h2 class="mb-5 titleBlogs">Partners</h2>

       <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
           Add Partner
       </button>
   </div>
  <!-- Table for listing titles and descriptions -->
  <table class="table mb-3">
        <thead>
        <tr>
            <th>Title Page</th>
            <th>Description Page</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($items)
            <tr>
                <td>{{ $items->title }}</td>
                <td>{{ $items->description }}</td>
                <td>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#editItemModal"
                            data-id="{{ $items->id }}"
                            data-title="{{ $items->title }}"
                            data-description="{{ $items->description }}">
                        Edit
                    </button>
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    <!-- Modal for editing title and description -->
    <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editItemForm" method="POST" action="{{ route('admin.updatePartnerInfo', $items->id) }}" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editItemTitle">Title</label>
                            <input type="text" class="form-control" id="editItemTitle" name="title" value="{{ $items->title }}">
                        </div>

                        <div class="form-group mt-3">
                            <label for="editItemDescription">Description</label>
                            <textarea class="form-control" id="editItemDescription" name="description" rows="4">{{ $items->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 mt-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Button to trigger form popup -->

    <!-- Table for listing partners -->
    <table class="table">
        <thead>
        <tr>
            <th style="width: 25%; text-align: left;">Name Partner</th> <!-- Поголема ширина -->
            <th style="width: 30%; text-align: left;">Logo Partner</th> <!-- Ограничена ширина -->
            <th style="width: 5%; text-align: center;">Order</th> <!-- Централно порамнување -->
            <th style="width: 40%; text-align: right;">Actions</th> <!-- Поголема ширина -->
        </tr>
        </thead>
        <tbody>
        @foreach ($partners as $partner)
            <tr>
                <td class="partner-name">{{ $partner->namePartner }}</td>
                <td class="partner-logo" style="text-align: left;">
                    <img src="{{ Storage::url($partner->logoPath) }}" alt="Partner Logo" class="img-fluid" style="width: 100%; height: auto; max-width: 80px;">
                </td>
                <td style="text-align: center;">{{ $partner->order }}</td>
                <td class="actions" style="text-align: right;">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPartnerModal"
                            data-id="{{ $partner->id }}"
                            data-name="{{ $partner->namePartner }}"
                            data-logo="{{ Storage::url($partner->logoPath) }}"
                            data-order="{{ $partner->order }}">
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

                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" class="form-control" id="order" name="order" required>
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

                        <div class="form-group">
                            <label for="editOrder">Order</label>
                            <input type="number" class="form-control" id="editOrder" name="order" required>
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
            var partnerOrder = button.data('order');

            var modal = $(this);
            var form = modal.find('#editPartnerForm');
            form.attr('action', '{{ url("partners") }}/' + partnerId);
            form.find('#editNamePartner').val(partnerName);
            form.find('#editLogoPreview').attr('src', partnerLogo);
            form.find('#editOrder').val(partnerOrder);
        });
    </script>
@endsection
