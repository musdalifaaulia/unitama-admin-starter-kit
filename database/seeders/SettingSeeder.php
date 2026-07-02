<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Setting::create([
            'app_name' => 'Admin Laravel',
            'copyright' => 'Admin Laravel || 2026',
            'login_title' => 'Admin Laravel',
            'description' => '"Jelajahi [Nama Brand], platform digital modern berbasis Laravel yang dirancang untuk memberikan solusi [sebutkan fungsi utama website, misal: manajemen bisnis / layanan e-commerce] yang cepat, aman, dan responsif. Temukan fitur unggulan kami sekarang!"',
            'keywords' => '"web app laravel, aplikasi web [Nama Brand], sistem informasi modern, platform [Jenis Layanan Anda], fitur canggih [Nama Brand], solusi digital bisnis"',
        ]);
    }
}

