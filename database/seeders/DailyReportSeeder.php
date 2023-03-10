<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hach;

class DailyReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
                DB::table('daily_reports')->insert([
                [
                    'meeting_date' => '2021/12/01',
                    'participant_matsui' => '新田太郎',
                    'participant_client' => '三木太郎',
                    'content' => 'この打合せは成功でした。いい感触をいただきました。次回は正式に採用いただける予定です。',
                    'image' => 'URL',
                    'project_id' => 1,
                    'client_id' => 2,
                    'created_at' => '2022/01/01 11:11:11',
                ],
                [
                    'meeting_date' => '2021/12/01',
                    'participant_matsui' => '北本太郎',
                    'participant_client' => '山元太郎',
                    'content' => 'この打合せは成功でした。いい感触をいただきました。次回は正式に採用いただける予定です。',
                    'image' => 'URL',
                    'project_id' => 1,
                    'client_id' => 1,
                    'created_at' => '2022/01/01 11:11:11',
                ],
                ]);
    }
}
