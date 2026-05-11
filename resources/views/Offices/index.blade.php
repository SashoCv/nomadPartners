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
    <div style="display: flex; justify-content: space-between">
        <h2 class="mb-3 pt-3 titleBlogs">OFFICES</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addOfficeModal">
            Add Office
        </button>
    </div>

    <p class="text-muted">
        Use the <strong>slug</strong> to link offices across languages (e.g. <code>sofia</code>, <code>plovdiv</code>, <code>headquarters</code>).
        Use the same slug for the matching office in another language so team members from different language versions can share the same logical office.
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Slug</th>
            <th>Name</th>
            <th>City</th>
            <th>Country</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($offices as $office)
            <tr>
                <td>
                    @if ($office->imagePath)
                        <img src="{{ Storage::url($office->imagePath) }}" alt="Office image" style="max-width:80px;max-height:80px;object-fit:cover;border-radius:6px;">
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </td>
                <td><code>{{ $office->slug }}</code></td>
                <td>{{ $office->name }}</td>
                <td>{{ $office->city }}</td>
                <td>{{ $office->country }}</td>
                <td>{{ $office->order }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editOfficeModal"
                            data-id="{{ $office->id }}"
                            data-slug="{{ $office->slug }}"
                            data-name="{{ $office->name }}"
                            data-city="{{ $office->city }}"
                            data-country="{{ $office->country }}"
                            data-address="{{ $office->address }}"
                            data-order="{{ $office->order }}"
                            data-image="{{ $office->imagePath ? Storage::url($office->imagePath) : '' }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteOfficeModal"
                            data-office="{{ $office->name }}"
                            data-action="{{ route('admin.deleteOffice', $office->id) }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Add Office Modal -->
    <div class="modal fade" id="addOfficeModal" tabindex="-1" aria-labelledby="addOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOfficeModalLabel">Add Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.officesPost') }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        <div class="form-group">
                            <label for="officeSlug">Slug <small class="text-muted">(language-agnostic identifier, e.g. "sofia")</small></label>
                            <input type="text" class="form-control" id="officeSlug" name="slug">
                        </div>
                        <div class="form-group">
                            <label for="officeName">Name (in current language)</label>
                            <input type="text" class="form-control" id="officeName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="officeCity">City</label>
                            <input type="text" class="form-control" id="officeCity" name="city">
                        </div>
                        <div class="form-group">
                            <label for="officeCountry">Country</label>
                            <input type="text" class="form-control" id="officeCountry" name="country">
                        </div>
                        <div class="form-group">
                            <label for="officeAddress">Address</label>
                            <input type="text" class="form-control" id="officeAddress" name="address">
                        </div>
                        <div class="form-group">
                            <label for="officeImage">Image <small class="text-muted">(cover photo for the office card)</small></label>
                            <input type="file" class="form-control-file" id="officeImage" name="imagePath" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="officeOrder">Order</label>
                            <input type="number" class="form-control" id="officeOrder" name="order">
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Office Modal -->
    <div class="modal fade" id="editOfficeModal" tabindex="-1" aria-labelledby="editOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOfficeModalLabel">Edit Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editOfficeForm" method="POST" action="" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editOfficeSlug">Slug</label>
                            <input type="text" class="form-control" id="editOfficeSlug" name="slug">
                        </div>
                        <div class="form-group">
                            <label for="editOfficeName">Name</label>
                            <input type="text" class="form-control" id="editOfficeName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editOfficeCity">City</label>
                            <input type="text" class="form-control" id="editOfficeCity" name="city">
                        </div>
                        <div class="form-group">
                            <label for="editOfficeCountry">Country</label>
                            <input type="text" class="form-control" id="editOfficeCountry" name="country">
                        </div>
                        <div class="form-group">
                            <label for="editOfficeAddress">Address</label>
                            <input type="text" class="form-control" id="editOfficeAddress" name="address">
                        </div>
                        <div class="form-group">
                            <label for="editOfficeImage">Image <small class="text-muted">(leave empty to keep current)</small></label>
                            <input type="file" class="form-control-file" id="editOfficeImage" name="imagePath" accept="image/*">
                            <img id="editOfficeImagePreview" src="" alt="" style="margin-top:8px;max-width:160px;max-height:120px;object-fit:cover;border-radius:6px;display:none;">
                        </div>
                        <div class="form-group">
                            <label for="editOfficeOrder">Order</label>
                            <input type="number" class="form-control" id="editOfficeOrder" name="order">
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteOfficeModal" tabindex="-1" aria-labelledby="confirmDeleteOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteOfficeModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="confirmDeleteOfficeItem"></strong>?</p>
                    <p class="text-muted small">Team members assigned to this office will keep their record but lose the office association.</p>
                    <form id="confirmDeleteOfficeForm" method="POST" action="">
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
        $('#editOfficeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);

            modal.find('#editOfficeSlug').val(button.data('slug'));
            modal.find('#editOfficeName').val(button.data('name'));
            modal.find('#editOfficeCity').val(button.data('city'));
            modal.find('#editOfficeCountry').val(button.data('country'));
            modal.find('#editOfficeAddress').val(button.data('address'));
            modal.find('#editOfficeOrder').val(button.data('order'));

            var image = button.data('image');
            var preview = modal.find('#editOfficeImagePreview');
            if (image) {
                preview.attr('src', image).show();
            } else {
                preview.hide();
            }

            $('#editOfficeForm').attr('action', '/offices/' + id);
        });

        $('#confirmDeleteOfficeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#confirmDeleteOfficeItem').text(button.data('office'));
            $('#confirmDeleteOfficeForm').attr('action', button.data('action'));
        });
    </script>
@endsection
