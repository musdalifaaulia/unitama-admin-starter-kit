<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setting.index', [
            'title' => 'Setting',
            'setting' => Setting::first(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'app_name'    => 'required|string|max:255',
            'copyright'   => 'required|string|max:255',
            'login_title' => 'required|string|max:255',
            'keywords'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1048', // Maksal 2MB
        ],
        [
            'app_name.required'    => 'Nama aplikasi tidak boleh kosong.',
            'app_name.max'         => 'Nama aplikasi maksimal 255 karakter.',
            
            'copyright.required'   => 'Hak cipta (copyright) tidak boleh kosong.',
            'copyright.max'        => 'Copyright maksimal 255 karakter.',
            
            'login_title.required' => 'Judul halaman login tidak boleh kosong.',
            'login_title.max'      => 'Judul halaman login maksimal 255 karakter.',
            
            'keywords.max'         => 'Kata kunci (keywords) maksimal 255 karakter.',
            
            'logo.image'           => 'Logo harus berupa gambar.',
            'logo.mimes'           => 'Format logo harus jpeg, png, jpg, atau svg.',
            'logo.max'             => 'Ukuran gambar logo maksimal 1MB.',
        ]);

        DB::beginTransaction();
        try {
            if ($request->file('logo')) {
                $validated['logo'] = $request->file('logo')->store('logo', 'public');
                if ($setting->logo) {
                    FacadesStorage::disk('public')->delete($setting->logo);
                }
            }

            $setting->update($validated);
            DB::commit();

            return to_route('setting.index')->withSuccess('Data berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('setting.index', $setting)->withError('Data gagal disimpan');
        }
    }

}
