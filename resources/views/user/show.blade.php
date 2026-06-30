<div class="row g-3">
    <div class="col-md-3">
        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('niceadmin/img/noprofil.png') }}"
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
    </div>
</div>
