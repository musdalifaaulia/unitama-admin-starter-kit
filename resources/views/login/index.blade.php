<x-guest>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card mb-3">

        <div class="card-body">

            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">{{ $setting->login_title }}</h5>
            </div>

            <form class="row g-3 needs-validation" novalidate method="post" action="{{ route('login.authenticate') }}">
                @csrf

                <div class="col-12">
                    <label for="yourEmail" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
            </form>

        </div>
    </div>

</x-guest>
