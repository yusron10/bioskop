<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $isi = [
            ['name' => 'Admin', 'role_id' => 1, 'email' => 'mrx@gmail.com', 'password' => '12345'],
            ['name' => 'User', 'role_id' => 2, 'email' => 'mry@gmail.com', 'password' => '12345']
        ];

        foreach ($isi as $i) {
            
        User::create([
            'name' => $i['name'],
            'role_id' => $i['role_id'],
            'email' => $i['email'],
            'password' => Hash::make($i['password'])
        ]);
        }
    }
}
