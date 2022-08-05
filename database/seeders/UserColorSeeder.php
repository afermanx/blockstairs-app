<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #vinculando cor para usuário
        DB::table('color_user')->insert([
            'user_id' => 1,
            'color_id' => 1,
        ]);
        DB::table('color_user')->insert([
            'user_id' => 1,
            'color_id' => 5,
        ]);
        DB::table('color_user')->insert([
            'user_id' => 1,
            'color_id' => 3,
        ]);

        #vinculando cor para usuário

        DB::table('color_user')->insert([
            'user_id' => 2,
            'color_id' => 1,
        ]);
        DB::table('color_user')->insert([
            'user_id' => 2,
            'color_id' => 2,
        ]);
        DB::table('color_user')->insert([
            'user_id' => 2,
            'color_id' => 3,
        ]);
        DB::table('color_user')->insert([
            'user_id' => 2,
            'color_id' => 4,
        ]);

        #vinculando cor para usuário 3
        DB::table('color_user')->insert([
            'user_id' => 3,
            'color_id' => 3,
        ]);
        DB::table('color_user')->insert([
            'user_id' => 3,
            'color_id' => 2,
        ]);

    }
}
