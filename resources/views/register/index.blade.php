@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <main class="form-registration w-100 m-auto">

                <div class="div text-center">
                    <img class="mb-4" src="/assets/nijigenmaLogo.png" alt="" width="250" height="57">
                </div>

                <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

                <form action="/register" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror" id="Password"
                            placeholder="Password" required>
                        <label for="Password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Have an account already? <a href="/login">Login here!</a></small>
            </main>
        </div>
    </div>
@endsection
