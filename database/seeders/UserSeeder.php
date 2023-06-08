<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggotas = ([
            'name'=>'anggota',
            'email'=>'anggota@gmail.com',
            'password'=>Hash::make('anggota123'),
            'gender'=>'L',
            'no_pensiun'=>'123456',
            'NIK'=>'123',
            'tempat_lahir'=>'Cities',
            'tanggal_lahir'=>Carbon::parse('2000-01-02'),
            'alamat_lengkap'=>'Full Address',
            'no_telp'=>'08123456789',
            'role'=>'anggota'
        ]);
        DB::table('users')->insert($anggotas);

        $pengurus = ([
            'name'=>'pengurus',
            'email'=>'pengurus@gmail.com',
            'password'=>Hash::make('pengurus123'),
            'gender'=>'L',
            'no_pensiun'=>'123456',
            'NIK'=>'123',
            'tempat_lahir'=>'Cities',
            'tanggal_lahir'=>Carbon::parse('2000-01-02'),
            'alamat_lengkap'=>'Full Address',
            'no_telp'=>'08123456789',
            'role'=>'pengurus'
        ]);
        DB::table('users')->insert($pengurus);
    }
}
