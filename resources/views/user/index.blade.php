<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="card shadow p-3">
        <h5 class="fw-bold mb-0">{{ $title }}</h5>
    </div>

    <div class="card shadow p-3">

        <div>
            <a class="btn btn-primary mb-3" href="{{ route('user.create') }}" role="button">Create</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered border-dark table-hover w-100" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-start">{{ $user->name }}</td>
                            <td class="text-start">{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td class="text-nowrap">

                                <a class="btn btn-warning btn-sm" href="{{ route('user.edit', $user) }}"
                                    role="button"><i class='bx bx-edit-alt'></i></a>

                                <form action="{{ route('user.destroy', $user) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"onclick="return confirm('Anda Yakin')"><i
                                            class='bx bx-trash'></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @push('modals')
    @endpush

    @push('scripts')
    @endpush
</x-app>
