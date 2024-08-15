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
                    <td class="col-3">{{ $businessForm->phone_number }}</td>
                    <td class="col-5">{{ $businessForm->message }}</td>
                    <td class="col-3">
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
                <td colspan="4">No messages found.</td>
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
