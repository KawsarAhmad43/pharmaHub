@extends('layouts.auth-layout')
@section('title', 'PharmaHub | Sign Up')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                <p class="text-center small">Enter your personal details to create an account</p>
            </div>
            <form id="registrationForm" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-12">
                    <label for="yourName" class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" id="yourName" required>
                    <div class="invalid-feedback name-error"></div>
                </div>
                <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback email-error"></div>
                </div>
                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback password-error"></div>
                </div>
                <div class="col-12">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" required>
                    <div class="invalid-feedback password_confirmation-error"></div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="1" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback terms-error"></div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let form = new FormData(this);

            fetch('{{ route('register.store') }}', {
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
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Account created successfully! Please log in.',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
                            window.location.href = "{{ route('login') }}";
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
