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
            ],
            [
                'name'=>"西本 哲也",
                'email'=>"b@gmail.com",
            ],
            [
                'name'=>"中西 周大",
                'email'=>"c@gmail.com",
            ],
            [
                'name'=>"松本 優斗",
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
