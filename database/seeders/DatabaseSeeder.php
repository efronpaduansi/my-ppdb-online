<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\StatusPendaftaran;
use App\Models\Website;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        StatusPendaftaran::create([
            'status' => 'Menunggu Diverifikasi',
        ]);

        StatusPendaftaran::create([
            'status' => 'Diverifikasi',
        ]);

        StatusPendaftaran::create([
            'status' => 'Diterima',
        ]);

        StatusPendaftaran::create([
            'status' => 'Ditolak',
        ]);

        // Seeder for default website setting
        Website::create([
            'company_name' => 'PPDB ONLINE',
            'logo'         => 'ifiber-logo.png',
            'address'      => 'Jl. Permata No. 03 RT.01 RW.02, Kel. Contoh',
        ]);
    }
}
