@extends('layouts.auth-layout')
@section('title', 'PharmaHub | Password Recover')
@section('content')
                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Password Recovery</h5>
                                        <p class="text-center small">Enter your email to recover password</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate>

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">User Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">Email</span>
                                                <input type="text" name="username" class="form-control"
                                                    id="yourUsername" required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Submit</button>
                                        </div>
                                        <div class="row"></div>
                                        <div class="col-6">
                                            <a class="btn btn-outline-success w-100" href="{{ route('login') }}"
                                                type="submit">Back to Log in</a>
                                            {{-- <p class="small mb-0"><a href="{{route('register')}}">Create an account</a></p> --}}
                                        </div>

                                    </form>

                                </div>
                            </div>
@endsection
