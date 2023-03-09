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

       $participants = ["三木地蔵","ワン木地蔵","ツー木地蔵"];

        foreach($participants as $participant){
        DB::table('daily_reports')->insert([
            'meeting_date' => '2021/12/01',
            'participant_matsui' => $participant,
            'participant_client' => '三木太郎',
            'content' => 'この打合せは成功でした。いい感触をいただきました。次回は正式に採用いただける予定です。',
            'image'=>'URL',
            'created_at'=>'2022/01/01 11:11:11',
        ]);
        };
    }
}
