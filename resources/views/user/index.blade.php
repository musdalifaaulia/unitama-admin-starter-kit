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

                                <button type="button" class="btn btn-info btn-sm btn-detail" data-bs-toggle="modal"
                                    data-bs-target="#detailModal" data-route="{{ route('user.show', $user) }}">
                                    <i class='bx bx-show'></i>
                                </button>

                                <a class="btn btn-warning btn-sm" href="{{ route('user.edit', $user) }}"
                                    role="button"><i class='bx bx-edit-alt'></i></a>

                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-route="{{ route('user.destroy', $user) }}">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @push('modals')
        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="detailModalLabel">Detail {{ $title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-detail">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('scripts')
        <script>
            $('#data-table').on('click', '.btn-delete', function() {
                $('#form-delete').attr('action', $(this).data('route'))
            })
            $('#data-table').on('click', '.btn-detail', function() {
                $('#modal-detail').load($(this).data('route'))
            })
        </script>
    @endpush
</x-app>
