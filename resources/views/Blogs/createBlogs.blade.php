@extends('layouts.main')

@section('activePage')


@endsection

@section('style')

<style>
    .formBlogs {
        gap: 20px;
    }

    .leftForm {
        width: 50%;
    }

    .rightForm {
        width: 50%;
    }
</style>

@endsection

@section('content')

<h2 class="mb-5 pt-3">Create Blogs</h2>

<form>
    @csrf
    <div class="d-flex formBlogs mb-3">
        <div class="leftForm">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group mt-2">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" placeholder="Enter email">
            </div>
        </div>

        <div class="rightForm">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" placeholder="Enter email">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection