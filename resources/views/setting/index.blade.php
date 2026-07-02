<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow p-3">
        <h5 class="fw-bold mb-0">{{ $title }}</h5>
    </div>

    <div class="card shadow p-3">
        <form method="POST" action="{{ route('setting.update', $setting) }}" class="form" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="app_name" class="form-label required">App Name</label>
                    <input type="text" class="form-control @error('app_name') is-invalid @enderror" id="app_name"
                        name="app_name" value="{{ old('app_name', $setting->app_name) }}" required>

                    @error('app_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="login_title" class="form-label required">Login Title</label>
                    <input type="text" class="form-control @error('login_title') is-invalid @enderror"
                        id="login_title" name="login_title" value="{{ old('login_title', $setting->login_title) }}"
                        required>

                    @error('login_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="copyright" class="form-label required">Copyright</label>
                    <input type="text" class="form-control @error('copyright') is-invalid @enderror" id="copyright"
                        name="copyright" required value="{{ old('copyright', $setting->copyright) }}">

                    @error('copyright')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="keywords" class="form-label">Keywords</label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                        name="keywords" value="{{ old('keywords', $setting->keywords) }}">

                    @error('keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                        id="description" name="description" value="{{ old('description', $setting->description) }}">

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="logo" class="form-label">logo (MaxSize 1Mb)</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="upload"
                        name="logo">

                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <img src="{{ $setting->logo ? asset('storage/' . $setting->logo) : asset('niceadmin/img/logo.png') }}"
                        alt="logo" class="w-50 rounded mt-2" id="preview">
                </div>
            </div>
            <div class="text-end">
                <a class="btn btn-warning" href="{{ route('setting.index') }}" role="button">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    @push('modals')
    @endpush

    @push('scripts')
    @endpush

</x-app>
