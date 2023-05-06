<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ["提案中","契約締結中","開発中","上市準備","上市完了","提案失敗"];

        foreach($statuses as $status){
        DB::table('statuses')->insert([
            'name' => $status,
        ]);
        };
    }
}
