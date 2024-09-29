@extends('layouts.auth-layout')

@section('title', 'PharmaHub | Log In')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Log In to Your Account</h5>
                <p class="text-center small">Enter your email and password to log in</p>
            </div>
            <form id="loginForm" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                    <label for="loginEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" id="loginEmail" required>
                    <div class="invalid-feedback email-error"></div>
                </div>
                <div class="col-12">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="loginPassword" required>
                    <div class="invalid-feedback password-error"></div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Log In</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let form = new FormData(this);

        fetch('{{ route('login.store') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: form
            })
            .then(response => {
                if (response.status === 422) {
                    return response.json().then(errors => {
                        // Clear previous errors
                        document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                        // Display validation errors
                        if (errors.errors) {
                            Object.keys(errors.errors).forEach(key => {
                                let errorElement = document.querySelector(`.${key}-error`);
                                if (errorElement) {
                                    errorElement.textContent = errors.errors[key][0];
                                    document.querySelector(`[name="${key}"]`).classList.add('is-invalid');
                                }
                            });
                        }
                    });
                } else if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Network response was not ok');
                }
            })
            .then(data => {
                if (data && data.success) {
                    let redirectUrl = '';

                    switch (data.role) {
                        case 1:
                        case 2:
                            redirectUrl = "{{ route('admin.dashboard') }}";
                            break;
                        case 3:
                            redirectUrl = "{{ route('user.dashboard') }}";
                            break;
                        case 4:
                            redirectUrl = "{{ route('manufacturer.dashboard') }}";
                            break;
                        default:
                            redirectUrl = "{{ route('home') }}";
                    }

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1000
                    }).then(() => {
                        window.location.href = redirectUrl;
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
    });
</script>
@endpush
