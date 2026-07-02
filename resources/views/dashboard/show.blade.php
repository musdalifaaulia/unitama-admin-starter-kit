<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="card shadow p-3">
        <h5 class="fw-bold mb-0">{{ $title }}</h5>
    </div>

    <div class="card shadow p-3">
        <div class="row g-3">
            <div class="col-md-3">
                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('niceadmin/img/aul.png') }}"
                    alt="Avatar" class="w-100 rounded">
            </div>
            <div class="col-md-9">
                <table class="table">
                    <tr>
                        <td width="10">Email</td>
                        <td width="3">:</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>:</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    <tr>
                        <td>Dibuat</td>
                        <td>:</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                    </tr>
                    <tr>
                        <td>Diubah</td>
                        <td>:</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a class="btn btn-warning" href="{{ route('dashboard.edit') }}" role="button">Ubah Data</a>
                </div>
            </div>
        </div>

    </div>

    @push('modals')
    @endpush

    @push('scripts')
    @endpush

</x-app>
