<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view('user.index',
        [ 'title' => 'User',
        'users' => User::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('user.create', [
            'title' => 'Tambah User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:users,email', 
            'password'          => 'required|string|min:8', 
            'passwordconfirm'   => 'required|same:password', 
            'avatar'            => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
            'role'              => 'required|in:Superadmin,Admin',
        ],
        [
            'name.required'     => 'Nama tidak boleh kosong.',
            'name.max'          => 'Nama maksimal 255 karakter.',
            
            'email.required'    => 'Email tidak boleh kosong.',
            'email.email'       => 'Format email tidak valid.',
            'email.max'         => 'Email maksimal 255 karakter.',
            'email.unique'      => 'Email sudah terdaftar.',
            
            'password.required' => 'Password tidak boleh kosong.',
            'password.min'      => 'Password minimal harus 8 karakter.',
            
            'avatar.image'      => 'Avatar harus berupa gambar.',
            'avatar.mimes'      => 'Format gambar harus jpeg, png, atau jpg.',
            'avatar.max'        => 'Ukuran gambar maksimal 2MB.',
            
            'role.required'     => 'Role harus dipilih.',
            'role.in'           => 'Role yang dipilih tidak valid (harus Superadmin atau Admin).',
        ]);

            try{

            if($request->file('avatar')) {
                $validated['avatar'] = $request->file('avatar')->store('avatar', 'public');
            }

                DB::beginTransaction();
                $user = User::create($validated);
                DB::commit();
                return to_route('user.index')->withSuccess('Data berhasil ditambahkan');
            }catch(\Exception $e){
                DB::rollBack();
                return to_route('user.create')->withError('Data gagal ditambahkan');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
