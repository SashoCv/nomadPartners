@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/styleHomePage.css">

    <style>
        .formAddContactPage .form-group {
            margin-bottom: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .section-heading {
            margin-top: 40px;
        }

        .section-content {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div>
        <h2 class="mb-5 pt-3 titleBlogs">Edit Contact Page</h2>

        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="w-100">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#contactInfoSection">Contact Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#workingHoursSection">Working Hours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#editAddressesSection">Edit Addresses</a>
                    </li>
                </ul>
            </div>
        </nav>

        <form action="{{ route('admin.contactUpdate', $contact->id) }}" method="POST" enctype="multipart/form-data" class="formAddContactPage">
            @csrf
            @method('PUT')

            <div id="contactInfoSection" class="section-content">
                <h2 class="section-heading">Contact Information Section</h2>
                <div class="form-group">
                    <label for="titleContact">Title Contact</label>
                    <input type="text" class="form-control" id="titleContact" name="titleContact" value="{{ $contact->titleContact }}">
                </div>

                <div class="form-group">
                    <label for="subtitleContact">Subtitle Contact</label>
                    <input type="text" class="form-control" id="subtitleContact" name="subtitleContact" value="{{ $contact->subtitleContact }}">
                </div>

                <div class="form-group">
                    <label for="descriptionContact">Description</label>
                    <textarea class="form-control" id="descriptionContact" name="descriptionContact">{{ $contact->descriptionContact }}</textarea>
                </div>

                <div class="form-group">
                    <label for="phoneContact">Phone Contact</label>
                    <input type="text" class="form-control" id="phoneContact" name="phoneContact" value="{{ $contact->phoneContact }}">
                </div>

                <div class="form-group">
                    <label for="emailContact">Email Contact</label>
                    <input type="email" class="form-control" id="emailContact" name="emailContact" value="{{ $contact->emailContact }}">
                </div>
            </div>

            <div id="workingHoursSection" class="section-content">
                <h2 class="section-heading">Working Hours Section</h2>
                <div class="form-group">
                    <label for="workingHoursContact">Working Hours Contact</label>
                    <input type="text" class="form-control" id="workingHoursContact" name="workingHoursContact" value="{{ $contact->workingHoursContact }}">
                </div>
            </div>


            <div id="editAddressesSection" class="section-content">
                <div class="d-flex justify-content-between">
                <h2 class="section-heading">Edit Addresses</h2>
                <button type="button" class="btn btn-secondary mt-2" id="addAddressBtn">Add New Address</button>
                </div>
                <div id="addressesWrapper">
                    @foreach($contact->addresses as $address)
                        <div class="form-group address-item">
                            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                            <input type="hidden" name="addresses[{{ $loop->index }}][id]" value="{{ $address->id }}">
                            <label for="address_{{ $loop->index }}">Full Address</label>
                            <input type="text" class="form-control" id="address_{{ $loop->index }}" name="addresses[{{ $loop->index }}][fullAddress]" value="{{ $address->fullAddress }}">
                        </div>
                    @endforeach
                </div>

            </div>

            <button type="submit" class="btn btn-primary mb-3 w-50">Submit</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.section-content').forEach(section => {
                    section.style.display = 'none';
                });
                const section = document.querySelector(this.getAttribute('href'));
                if (section) {
                    section.style.display = 'block';
                }
            });
        });

        const addAddressBtn = document.getElementById('addAddressBtn');
        const addressesWrapper = document.getElementById('addressesWrapper');

        addAddressBtn.addEventListener('click', () => {
            const index = addressesWrapper.children.length;
            const addressItem = document.createElement('div');
            addressItem.classList.add('form-group', 'address-item');

            addressItem.innerHTML = `
            <label for="address_${index}">Full Address</label>
            <input type="text" class="form-control" id="address_${index}" name="addresses[${index}][fullAddress]" placeholder="Enter address">
        `;

            addressesWrapper.appendChild(addressItem);
        });
    </script>
@endsection
