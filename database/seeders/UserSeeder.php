<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>"a",
                'email'=>"password@gmail.com",
            ],
            [
                'name'=>"b",
                'email'=>"b@gmail.com",
            ],
            [
                'name'=>"c",
                'email'=>"c@gmail.com",
            ],
            [
                'name'=>"d",
                'email'=>"d@gmail.com",
            ],    
        ];

        // foreachを使用しなければ、うまくシードを挿入できない。
        foreach($users as $user){
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
            ]);
        };
       
    }
}
