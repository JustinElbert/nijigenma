@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-5 mt-5">
        <main class="form-registration w-100 m-auto">
            <form>
                <div class="div text-center">
                    <img class="mb-4" src="/assets/nijigenmaLogo.png" alt="" width="250" height="57">
                </div>


                <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top" id="name" placeholder="Name">
                    <label for="name">Name</label>
                </div>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>

                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom" id="Password" placeholder="Password">
                    <label for="Password">Password</label>
                </div>

              <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Have an account already? <a href="/login">Login here!</a></small>
        </main>
    </div>
</div>



@endsection
