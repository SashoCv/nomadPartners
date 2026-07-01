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
    </style>
@endsection

@section('content')
    <div style="display: flex; justify-content: space-between">
        <h2 class="mb-3 pt-3 titleBlogs">COUNTRIES</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCountryModal">
            Add Country
        </button>
    </div>

    <p class="text-muted">
        Cards shown on the home page in the <strong>order</strong> below (lowest first), in the language you are currently editing.
        Use the same <strong>slug</strong> for the matching country in the other language so the "See more" link resolves across languages.
        The <strong>ISO code</strong> (2 letters, e.g. <code>np</code>, <code>in</code>, <code>bd</code>) renders the flag automatically.
    </p>

    <table class="table align-middle">
        <thead>
        <tr>
            <th>Image</th>
            <th>ISO</th>
            <th>Slug</th>
            <th>Name</th>
            <th>Card text</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($countries as $country)
            <tr>
                <td>
                    @if ($country->imagePath)
                        <img src="{{ Storage::url($country->imagePath) }}" alt="" style="max-width:80px;max-height:60px;object-fit:cover;border-radius:6px;">
                    @else
                        <span class="text-muted">—</span>
                    @endif
                </td>
                <td><code>{{ $country->iso_code }}</code></td>
                <td><code>{{ $country->slug }}</code></td>
                <td>{{ $country->name }}</td>
                <td style="max-width:280px;">{{ Str::limit($country->short_description, 90) }}</td>
                <td>{{ $country->order }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCountryModal"
                            data-id="{{ $country->id }}"
                            data-slug="{{ $country->slug }}"
                            data-iso="{{ $country->iso_code }}"
                            data-name="{{ $country->name }}"
                            data-title="{{ $country->title }}"
                            data-short="{{ $country->short_description }}"
                            data-content="{{ $country->content }}"
                            data-sectors="{{ $country->sectors }}"
                            data-languages="{{ $country->languages }}"
                            data-permit="{{ $country->permit_time }}"
                            data-order="{{ $country->order }}"
                            data-image="{{ $country->imagePath ? Storage::url($country->imagePath) : '' }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteCountryModal"
                            data-country="{{ $country->name }}"
                            data-action="{{ route('admin.deleteCountry', $country->id) }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Add Country Modal -->
    <div class="modal fade" id="addCountryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.countriesPost') }}" method="POST" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        <div class="form-group">
                            <label>Name (in current language) <small class="text-muted">e.g. "Непал"</small></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Card / hero heading <small class="text-muted">e.g. "Работници от Непал" (defaults to name)</small></label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Slug <small class="text-muted">language-agnostic, e.g. "nepal"</small></label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                        <div class="form-group">
                            <label>ISO code <small class="text-muted">2 letters for the flag, e.g. "np"</small></label>
                            <input type="text" class="form-control" name="iso_code" maxlength="2">
                        </div>
                        <div class="form-group">
                            <label>Card text <small class="text-muted">short blurb on the home-page card</small></label>
                            <textarea class="form-control" name="short_description" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Detail page content <small class="text-muted">full text shown on the country page</small></label>
                            <textarea class="form-control" name="content" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sectors <small class="text-muted">comma-separated, e.g. "Туризъм, Строителство, Логистика"</small></label>
                            <input type="text" class="form-control" name="sectors">
                        </div>
                        <div class="form-group">
                            <label>Languages <small class="text-muted">comma-separated</small></label>
                            <input type="text" class="form-control" name="languages">
                        </div>
                        <div class="form-group">
                            <label>Permit timeline <small class="text-muted">e.g. "до 10 дни (сезонна)"</small></label>
                            <input type="text" class="form-control" name="permit_time">
                        </div>
                        <div class="form-group">
                            <label>Photo <small class="text-muted">card / hero background</small></label>
                            <input type="file" class="form-control-file" name="imagePath" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" name="order">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Country Modal -->
    <div class="modal fade" id="editCountryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Country</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editCountryForm" method="POST" action="" enctype="multipart/form-data" class="formAddHomePage">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="editCountryName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Card / hero heading</label>
                            <input type="text" class="form-control" id="editCountryTitle" name="title">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" id="editCountrySlug" name="slug">
                        </div>
                        <div class="form-group">
                            <label>ISO code</label>
                            <input type="text" class="form-control" id="editCountryIso" name="iso_code" maxlength="2">
                        </div>
                        <div class="form-group">
                            <label>Card text</label>
                            <textarea class="form-control" id="editCountryShort" name="short_description" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Detail page content</label>
                            <textarea class="form-control" id="editCountryContent" name="content" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sectors</label>
                            <input type="text" class="form-control" id="editCountrySectors" name="sectors">
                        </div>
                        <div class="form-group">
                            <label>Languages</label>
                            <input type="text" class="form-control" id="editCountryLanguages" name="languages">
                        </div>
                        <div class="form-group">
                            <label>Permit timeline</label>
                            <input type="text" class="form-control" id="editCountryPermit" name="permit_time">
                        </div>
                        <div class="form-group">
                            <label>Photo <small class="text-muted">(leave empty to keep current)</small></label>
                            <input type="file" class="form-control-file" id="editCountryImage" name="imagePath" accept="image/*">
                            <img id="editCountryImagePreview" src="" alt="" style="margin-top:8px;max-width:160px;max-height:120px;object-fit:cover;border-radius:6px;display:none;">
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" class="form-control" id="editCountryOrder" name="order">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmDeleteCountryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="confirmDeleteCountryItem"></strong>?</p>
                    <form id="confirmDeleteCountryForm" method="POST" action="">
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
        $('#editCountryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);

            modal.find('#editCountryName').val(button.data('name'));
            modal.find('#editCountryTitle').val(button.data('title'));
            modal.find('#editCountrySlug').val(button.data('slug'));
            modal.find('#editCountryIso').val(button.data('iso'));
            modal.find('#editCountryShort').val(button.data('short'));
            modal.find('#editCountryContent').val(button.data('content'));
            modal.find('#editCountrySectors').val(button.data('sectors'));
            modal.find('#editCountryLanguages').val(button.data('languages'));
            modal.find('#editCountryPermit').val(button.data('permit'));
            modal.find('#editCountryOrder').val(button.data('order'));

            var image = button.data('image');
            var preview = modal.find('#editCountryImagePreview');
            if (image) {
                preview.attr('src', image).show();
            } else {
                preview.hide();
            }

            $('#editCountryForm').attr('action', '/countries/' + id);
        });

        $('#confirmDeleteCountryModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#confirmDeleteCountryItem').text(button.data('country'));
            $('#confirmDeleteCountryForm').attr('action', button.data('action'));
        });
    </script>
@endsection
