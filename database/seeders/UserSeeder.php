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
                'name'=>"山本 浩二",
                'email'=>"password@gmail.com",
                'admin'=>"1",
            ],
            [
                'name'=>"西本 哲也",
                'email'=>"b@gmail.com",
                'admin'=>"0",
            ],
            [
                'name'=>"中西 周大",
                'email'=>"c@gmail.com",
                'admin'=>"0",
            ],
            [
                'name'=>"松本 優斗",
                'email'=>"d@gmail.com",
                'admin'=>"0",
            ],    
        ];

        // foreachを使用しなければ、うまくシードを挿入できない。
        foreach($users as $user){
            DB::table('users')->insert([
                'name' => $user['name'],
                'admin' => $user['admin'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
            ]);
        };
       
    }
}
