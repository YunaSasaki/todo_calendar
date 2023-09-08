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
                'check_flg' => 1,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
            [
                'user_id' => 1,
                'title' => 'リスト2',
                'datetime' => '2023/09/02 00:00:00',
                'check_flg' => null,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
            [
                'user_id' => 1,
                'title' => 'リスト3',
                'datetime' => '2023/09/02 08:00:00',
                'check_flg' => null,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
            [
                'user_id' => 1,
                'title' => 'リスト4',
                'datetime' => '2023/09/03 00:00:00',
                'check_flg' => 1,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
            [
                'user_id' => 1,
                'title' => 'リスト5',
                'datetime' => '2023/09/02 08:00:00',
                'check_flg' => null,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
            [
                'user_id' => 1,
                'title' => 'リスト6',
                'datetime' => '2023/09/04 00:00:00',
                'check_flg' => null,
                'content' => 'Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細＊Todoの詳細',
            ],
        ]);
    }
}
