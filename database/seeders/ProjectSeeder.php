<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = ["開発品A","開発品B","開発品C","開発品D","開発品E"];

        foreach($projects as $project){
        DB::table('projects')->insert([
            'name' => $project,
            'created_at'=>'2022/01/01 11:11:11',
        ]);
        };
    }
}
