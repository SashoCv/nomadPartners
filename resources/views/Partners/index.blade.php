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
            <th>Link Partner</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($partners as $partner)
        <tr>
            <td>{{ $partner->namePartner }}</td>
            <td><img src="{{ asset('storage/' .$partner->logoPath) }}" alt="Partner Logo" width="50"></td>
            <td><a href="{{ $partner->linkPartner }}" target="_blank">{{ $partner->linkPartner }}</a></td>
            <td>
                <button type="button" class="btn-sideBar" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-partner="{{ $partner->namePartner }}" data-action="{{ route('admin.deletePartner', $partner->id) }}">
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

<!-- Modal for the form -->
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
                        <input type="text" class="form-control" id="namePartner" name="namePartner">
                    </div>

                    <div class="form-group">
                        <label for="logoPathPartner">Logo Partner</label>
                        <input type="file" class="form-control-file" id="logoPathPartner" name="logoPathPartner">
                    </div>

                    <div class="form-group">
                        <label for="linkPartner">Link Partner</label>
                        <input type="text" class="form-control" id="linkPartner" name="linkPartner">
                    </div>

                    <button type="submit" class="btn btn-primary mb-3 w-100">Submit</button>
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
</script>
@endsection