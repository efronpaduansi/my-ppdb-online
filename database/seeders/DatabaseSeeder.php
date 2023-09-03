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

        User::create([
            'name' => 'Siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'siswa',
        ]);

        User::create([
            'name' => 'Calon Siswa',
            'email' => 'calonsiswa@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'guest',
        ]);

     
        StatusPendaftaran::create([
            'status' => 'Menunggu Diverifikasi',
        ]);

        StatusPendaftaran::create([
            'status' => 'Diterima',
        ]);

        StatusPendaftaran::create([
            'status' => 'Ditolak',
        ]);

        // Seeder for default website setting
        Website::create([
            'company_name' => 'Iconmedia',
            'logo'         => 'ifiber-logo.png',
            'address'      => 'Inkopad Blok. ABC',
        ]);
    }
}
