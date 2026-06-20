<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="card shadow p-3">
        <h5 class="fw-bold mb-0">{{ $title }}</h5>
    </div>

    @push('modals')
    @endpush

    @push('scripts')
    @endpush
</x-app>
