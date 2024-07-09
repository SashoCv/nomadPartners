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
<h2 class="mb-5 pt-3 titleBlogs">Visitor Messages</h2>

<!-- Table for listing partners -->
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
        <tr>
            <td class="col-2">John Doe</td>
            <td class="col-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec purus ac libero ultrices aliquam. Donec nec nunc nec nunc.</td>
            <td class="col-3">
                <a href="">saso@gmail.com</a>
            </td>
            
            <td class="col-2">
                <button type="button" class="btn-sideBar" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-partner="John Doe" data-action="{{ route('admin.deletePartner', 1) }}">
                    Delete
                </button>
            </td>
        </tr>
    </tbody>
</table>

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
