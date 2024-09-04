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
    <h2 class="mb-5 pt-3 titleBlogs">Team Members</h2>

    <!-- Table for listing team members -->
    <table class="table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Position</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($team_members as $team_member)
            <tr>
                <td>{{ $team_member->full_name }}</td>
                <td>{{ $team_member->position }}</td>
                <td style="width: 100px; height: 100px">
                    <img src="{{ Storage::url($team_member->imagePath) }}" alt="Team Member Image" width="100%">
                </td>
                <td>{{ $team_member->description }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTeamMemberModal" data-id="{{ $team_member->id }}" data-name="{{ $team_member->full_name }}" data-position="{{ $team_member->position }}" data-description="{{ $team_member->description }}" data-image="{{ Storage::url($team_member->imagePath) }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-team-member="{{ $team_member->full_name }}" data-action="{{ route('admin.deleteTeamMember', $team_member->id) }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Button to trigger form popup -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTeamMemberModal">
        Add Team Member
    </button>

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
                            <label for="teamMemberDescription">Team Member Description</label>
                            <input type="text" class="form-control" id="teamMemberDescription" name="description">
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
                    <form id="editTeamMemberForm" method="POST" action="{{route('admin.updateTeamMember')}}" enctype="multipart/form-data" class="formAddHomePage">
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
                            <img id="editImagePreview" src="" alt="Current Image" style="margin-top: 10px; width: 100px; height: auto;">
                        </div>

                        <div class="form-group">
                            <label for="editTeamMemberDescription">Team Member Description</label>
                            <input type="text" class="form-control" id="editTeamMemberDescription" name="description">
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
                    Are you sure you want to delete <span id="teamMemberName"></span>?
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
            var teamMemberName = button.data('team-member');
            var action = button.data('action');

            var modal = $(this);
            modal.find('#teamMemberName').text(teamMemberName);
            modal.find('#deleteForm').attr('action', action);
        });

        $('#editTeamMemberModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var teamMemberId = button.data('id');
            var teamMemberName = button.data('name');
            var teamMemberPosition = button.data('position');
            var teamMemberDescription = button.data('description');
            var teamMemberImage = button.data('image');

            var modal = $(this);
            var form = modal.find('#editTeamMemberForm');
            form.attr('action', '{{ url("team-members") }}/' + teamMemberId);
            form.find('#editTeamMemberName').val(teamMemberName);
            form.find('#editTeamMemberPosition').val(teamMemberPosition);
            form.find('#editTeamMemberDescription').val(teamMemberDescription);
            form.find('#editImagePreview').attr('src', teamMemberImage);
        });
    </script>
@endsection
