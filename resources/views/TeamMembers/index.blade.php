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

        img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2 class="mb-3 pt-3 titleBlogs">TEAMS</h2>
        <!-- Button to trigger Add Team Member form -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTeamMemberModal">
            Add Team Member
        </button>
    </div>

    <!-- Table for listing titles and descriptions -->
    <table class="table mb-4">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($items)
            <tr>
                <td>{{ $items->title }}</td>
                <td>{{ $items->description }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editItemModal"
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
                    <form id="editItemForm" method="POST" action="{{ route('admin.updateTeam', $items->id) }}" class="formAddHomePage">
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

                        <button type="submit" class="btn btn-primary mb-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Table for listing team members -->
    <table class="table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Position</th>
            <th>Image</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($team_members as $team_member)
            <tr>
                <td>{{ $team_member->full_name }}</td>
                <td>{{ $team_member->position }}</td>
                <td>
                    <img src="{{ Storage::url($team_member->imagePath) }}" alt="Team Member Image">
                </td>
                <td>{{ $team_member->order }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTeamMemberModal"
                            data-id="{{ $team_member->id }}"
                            data-name="{{ $team_member->full_name }}"
                            data-position="{{ $team_member->position }}"
                            data-image="{{ Storage::url($team_member->imagePath) }}"
                            data-order="{{ $team_member->order }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                            data-team-member="{{ $team_member->full_name }}"
                            data-action="{{ route('admin.deleteTeamMember', $team_member->id) }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal for adding a team member -->
    <div class="modal fade" id="addTeamMemberModal" tabindex="-1" aria-labelledby="addTeamMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeamMemberModalLabel">Add Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.teamMembersPost') }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        <div class="form-group">
                            <label for="teamMemberName">Team Member Full Name</label>
                            <input type="text" class="form-control" id="teamMemberName" name="full_name">
                        </div>

                        <div class="form-group">
                            <label for="teamMemberPosition">Team Member Position</label>
                            <input type="text" class="form-control" id="teamMemberPosition" name="position">
                        </div>

                        <div class="form-group">
                            <label for="teamMemberImage">Team Member Image</label>
                            <input type="file" class="form-control-file" id="teamMemberImage" name="imagePath">
                        </div>

                        <div class="form-group">
                            <label for="teamMemberOrder">Team Member Order</label>
                            <input type="number" class="form-control" id="teamMemberOrder" name="order">
                        </div>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing a team member -->
    <div class="modal fade" id="editTeamMemberModal" tabindex="-1" aria-labelledby="editTeamMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeamMemberModalLabel">Edit Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editTeamMemberForm" method="POST" action="{{ route('admin.updateTeamMember', $team_member->id) }}" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="editTeamMemberName">Team Member Full Name</label>
                            <input type="text" class="form-control" id="editTeamMemberName" name="full_name">
                        </div>

                        <div class="form-group">
                            <label for="editTeamMemberPosition">Team Member Position</label>
                            <input type="text" class="form-control" id="editTeamMemberPosition" name="position">
                        </div>

                        <div class="form-group">
                            <label for="editTeamMemberImage">Team Member Image</label>
                            <input type="file" class="form-control-file" id="editTeamMemberImage" name="imagePath">
                            <img id="editImagePreview" src="" alt="Current Image" style="margin-top: 10px;">
                        </div>

                        <div class="form-group">
                            <label for="editTeamMemberOrder">Team Member Order</label>
                            <input type="number" class="form-control" id="editTeamMemberOrder" name="order">
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
                    <p>Are you sure you want to delete <strong id="confirmDeleteItem"></strong>?</p>
                    <form id="confirmDeleteForm" method="POST" action="">
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
        // Edit team member modal functionality
        $('#editTeamMemberModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var position = button.data('position');
            var image = button.data('image');
            var order = button.data('order');
            var modal = $(this);

            modal.find('#editTeamMemberName').val(name);
            modal.find('#editTeamMemberPosition').val(position);
            modal.find('#editImagePreview').attr('src', image); // Ensure the image preview updates
            modal.find('#editTeamMemberOrder').val(order);
            // Set the action URL for the form
            $('#editTeamMemberForm').attr('action', '/team-members/' + id);
        });

        // Delete team member modal functionality
        $('#confirmDeleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var teamMember = button.data('team-member');
            var action = button.data('action');
            var modal = $(this);

            modal.find('#confirmDeleteItem').text(teamMember);
            $('#confirmDeleteForm').attr('action', action);
        });
    </script>
@endsection
