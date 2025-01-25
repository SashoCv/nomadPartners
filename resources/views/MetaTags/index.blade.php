@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="my-4">Meta Tags Management</h1>

        {{-- Alert Messages --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add Meta Tag Form (Collapsible) --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Add New Meta Tag</span>
                <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#addMetaTagForm" aria-expanded="false" aria-controls="addMetaTagForm">
                    <span class="collapsed">&#9662;</span>
                    <span class="expanded">&#9652;</span>
                </button>
            </div>
            <div id="addMetaTagForm" class="collapse">
                <div class="card-body">
                    <form action="{{ route('metaTags.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="page_id">Page</label>
                            <select name="page_id" id="page_id" class="form-control" required>
                                <option value="">-- Select Page --</option>
                                @foreach(App\Models\Page::all() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="keywords">Keywords (comma-separated)</label>
                            <input type="text" name="keywords" id="keywords" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="meta_cannonical_link">Canonical Link</label>
                            <input type="text" name="meta_cannonical_link" id="meta_cannonical_link" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Add Meta Tag</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Meta Tags Table --}}
        <div class="card">
            <div class="card-header">All Meta Tags</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Page</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Keywords</th>
                        <th>Canonical Link</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($metaTags as $metaTag)
                        <tr>
                            <td>{{ $metaTag->id }}</td>
                            <td>{{ $metaTag->page->title }}</td>
                            <td>{{ $metaTag->meta_title }}</td>
                            <td>{{ $metaTag->meta_description }}</td>
                            <td>{{ implode(', ', $metaTag->keywords->pluck('keyword')->toArray()) }}</td>
                            <td>{{ $metaTag->meta_cannonical_link }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editMetaTagModal"
                                        data-id="{{ $metaTag->id }}"
                                        data-page-id="{{ $metaTag->page_id }}"
                                        data-title="{{ $metaTag->meta_title }}"
                                        data-description="{{ $metaTag->meta_description }}"
                                        data-keywords="{{ implode(', ', $metaTag->keywords->pluck('keyword')->toArray()) }}"
                                        data-canonical-link="{{ $metaTag->meta_cannonical_link }}">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Edit Meta Tag Modal --}}
    <div class="modal fade" id="editMetaTagModal" tabindex="-1" aria-labelledby="editMetaTagModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMetaTagModalLabel">Edit Meta Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editMetaTagForm" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="edit_page_id">Page</label>
                            <select name="page_id" id="edit_page_id" class="form-control" required>
                                <option value="">-- Select Page --</option>
                                @foreach(App\Models\Page::all() as $page)
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="edit_title">Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="edit_description">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="edit_keywords">Keywords (comma-separated)</label>
                            <input type="text" name="keywords" id="edit_keywords" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="edit_meta_cannonical_link">Canonical Link</label>
                            <input type="text" name="meta_cannonical_link" id="edit_meta_cannonical_link" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var editMetaTagModal = document.getElementById('editMetaTagModal');
            editMetaTagModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var pageId = button.getAttribute('data-page-id');
                var title = button.getAttribute('data-title');
                var description = button.getAttribute('data-description');
                var keywords = button.getAttribute('data-keywords');
                var canonicalLink = button.getAttribute('data-canonical-link');

                var form = document.getElementById('editMetaTagForm');
                form.action = `/metaTags/${id}`;

                document.getElementById('edit_page_id').value = pageId;
                document.getElementById('edit_title').value = title;
                document.getElementById('edit_description').value = description;
                document.getElementById('edit_keywords').value = keywords;
                document.getElementById('edit_meta_cannonical_link').value = canonicalLink;
            });
        });
    </script>
@endsection
