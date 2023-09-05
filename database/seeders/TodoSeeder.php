<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'user_id' => 1,
                'title' => 'リスト1',
                'datetime' => '2023/09/01 00:00:00',
                'check_flg' => true,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
            [
                'user_id' => 1,
                'title' => 'リスト2',
                'datetime' => '2023/09/02 00:00:00',
                'check_flg' => false,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
            [
                'user_id' => 1,
                'title' => 'リスト3',
                'datetime' => '2023/09/02 08:00:00',
                'check_flg' => false,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
        ]);
    }
}
