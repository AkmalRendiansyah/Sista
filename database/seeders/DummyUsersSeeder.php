<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $userData = [
            [
            'name'=>'administrator',
            'email'=>'administrator@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('123456')
            ],
            [
            'name'=>'akmal',
            'email'=>'akmal@gmail.com',
            'role'=>'mahasiswa',
            'password'=>bcrypt('123456')
            ],
            [
            'name'=>'meri',
            'email'=>'meri@gmail.com',
            'role'=>'kaprodi',
            'password'=>bcrypt('123456')
            ],
            [
            'name'=>'deni',
            'email'=>'deni@gmail.com',
            'role'=>'dosen',
            'password'=>bcrypt('123456')
            ],
            ];
            
            foreach($userData as $key => $val){
                User::create($val);

            }

    }
}
