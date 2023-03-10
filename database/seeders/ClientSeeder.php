<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $clients = ["A社","B社","C社","D社"];

        // foreachを使用しなければ、うまくシードを挿入できない。
        foreach($clients as $client){
            DB::table('clients')->insert([
                'name' => $client,
                'charge' => '三木谷太郎',
                'address' => '京都',
                'created_at'=>'2022/01/01 11:11:11',
            ]);
        };
    }
}