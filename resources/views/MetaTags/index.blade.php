@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="my-4">Meta Tags Management</h1>

        {{-- Избор на страна --}}
        <div class="form-group mb-4">
            <label for="select_page">Select Page</label>
            <select id="select_page" class="form-control">
                <option value="">-- Select Page --</option>
                @foreach(App\Models\Page::all() as $page)
                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                @endforeach
            </select>
        </div>


        <div id="metaTagsFormContainer" style="display: none;">
            <form id="editMetaTagsForm" action="" method="POST">
                @csrf
                @method('PUT')

                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th class="text-end align-middle bg-light fw-bold" style="width: 20%;">Title</th>
                        <td>
                            <input type="text" name="title" id="meta_title" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-end align-middle bg-light fw-bold">Description</th>
                        <td>
                            <textarea name="description" id="meta_description" class="form-control" rows="3" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-end align-middle bg-light fw-bold">Keywords</th>
                        <td>
                            <input type="text" name="keywords" id="meta_keywords" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-end align-middle bg-light fw-bold">Canonical Link</th>
                        <td>
                            <input type="text" name="meta_cannonical_link" id="meta_canonical_link" class="form-control">
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectPage = document.getElementById('select_page');
            const metaTagsFormContainer = document.getElementById('metaTagsFormContainer');
            const form = document.getElementById('editMetaTagsForm');

            selectPage.addEventListener('change', function () {
                const pageId = this.value;

                if (pageId) {
                    fetch(`/metaTags/${pageId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.meta_tag) {
                                metaTagsFormContainer.style.display = 'block';
                                form.action = `/metaTags/${data.meta_tag.id}`;
                                console.log(data.meta_tag.keywords)
                                let keywords = data.meta_tag.keywords;

                                if (keywords.length > 0) {
                                    let keywordsString = '';
                                    keywords.forEach(keyword => {
                                        keywordsString += keyword.keyword + ',';
                                    });
                                    keywordsString = keywordsString.slice(0, -1);
                                    data.meta_tag.keywords = keywordsString;
                                }


                                document.getElementById('meta_title').value = data.meta_tag.meta_title;
                                document.getElementById('meta_description').value = data.meta_tag.meta_description;
                                document.getElementById('meta_keywords').value = data.meta_tag.keywords;
                                document.getElementById('meta_canonical_link').value = data.meta_tag.meta_cannonical_link;
                            } else {
                                metaTagsFormContainer.style.display = 'none';
                                alert('No meta tags found for the selected page.');
                            }
                        });
                } else {
                    metaTagsFormContainer.style.display = 'none';
                }
            });
        });
    </script>
@endsection
