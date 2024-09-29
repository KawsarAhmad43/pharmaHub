@extends('layouts.app')
@section('title', 'PharmaHub | Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>User Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between m-3">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add</a>
                        </div>

                        <h5 class="card-title">User List</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="path/to/image1.jpg" alt="User Image" class="rounded-circle" width="40"></td>
                                    <td>Rahul Ahmed</td>
                                    <td>rahul.ahmed@gmail.com</td>
                                    <td>+880 01712345678</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="path/to/image2.jpg" alt="User Image" class="rounded-circle" width="40"></td>
                                    <td>Fatema Nasrin</td>
                                    <td>fatema.nasrin@gmail.com</td>
                                    <td>+880 01812345678</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="path/to/image3.jpg" alt="User Image" class="rounded-circle" width="40"></td>
                                    <td>Samir Hossain</td>
                                    <td>samir.hossain@gmail.com</td>
                                    <td>+880 01912345678</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="path/to/image4.jpg" alt="User Image" class="rounded-circle" width="40"></td>
                                    <td>Maria Rahman</td>
                                    <td>maria.rahman@gmail.com</td>
                                    <td>+880 01798765432</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="path/to/image5.jpg" alt="User Image" class="rounded-circle" width="40"></td>
                                    <td>Aminul Islam</td>
                                    <td>aminul.islam@gmail.com</td>
                                    <td>+880 01976543210</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>


            </div>
        </div>
    </section>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        <div class="mb-3">
                            <label for="userName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="userName" required>
                        </div>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userPhone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="userPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="userGender" class="form-label">Gender</label>
                            <select class="form-select" id="userGender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="addUserForm">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector(".btn-primary").addEventListener("click", function () {
            // Add your logic to save the user data here

        });
    });
</script>
@endpush
