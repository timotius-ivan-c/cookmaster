<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Grace Davis', 'email' => 'graced@gmail.com', 'password' => Hash::make('grd0801'), 'balance' => 110000, 'role_id' => 1, 'tier_id' => 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 2, 'name' => 'Joseph Foley', 'email' => 'jfoley@gmail.com', 'password' => Hash::make('jof991'), 'balance' => 70000, 'role_id' => 1, 'tier_id' => 3, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 3, 'name' => 'Dale Carnage', 'email' => 'dcarnage@gmail.com', 'password' => Hash::make('dac1109'), 'balance' => 32000, 'role_id' => 1, 'tier_id' => 2, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 4, 'name' => 'Carl Junior', 'email' => 'carljr@gmail.com', 'password' => Hash::make('cajr99'), 'balance' => 93000, 'role_id' => 1, 'tier_id' => 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 5, 'name' => 'Frank Conner', 'email' => 'frankconner@gmail.com', 'password' => Hash::make('fc12345'), 'balance' => 600000, 'role_id' => 2, 'tier_id' => 5, 'fame' => 180, 'free_recipes_count' => 5, 'paid_recipes_count' => 0],
            ['id' => 6, 'name' => 'Choi Soobin', 'email' => 'soobin@gmail.com', 'password' => Hash::make('csb0512'), 'balance' => 150000, 'role_id' => 1, 'tier_id' => 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 7, 'name' => 'Kim Seokjin', 'email' => 'ksjin@gmail.com', 'password' => Hash::make('wwh921204'), 'balance' => 85000, 'role_id' => 1, 'tier_id' => 3, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 8, 'name' => 'Kim Yong-sun', 'email' => 'solarsido@gmail.com', 'password' => Hash::make('mmm0611'), 'balance' => 33500, 'role_id' => 1, 'tier_id' => 2, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 9, 'name' => 'Coltrane Maverick', 'email' => 'coltmav@gmail.com', 'password' => Hash::make('mavcol00'), 'balance' => 103000, 'role_id' => 1, 'tier_id' => 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 10, 'name' => 'William Poernomo', 'email' => 'willpoer@gmail.com', 'password' => Hash::make('butterpo12'), 'balance' => 590000, 'role_id' => 2, 'tier_id' => 5, 'fame' => 190, 'free_recipes_count' => 5, 'paid_recipes_count' => 0],
            ['id' => 11, 'name' => 'Charles Lee', 'email' => 'charll@gmail.com', 'password' => Hash::make('asfdghjkl'), 'balance' => 100000, 'role_id' => 1, 'tier_id' => 1, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 12, 'name' => 'Vladmir Horowitz', 'email' => 'vhorowitz@gmail.com', 'password' => Hash::make('imacomposer'), 'balance' => 30000, 'role_id' => 1, 'tier_id' => 3, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 13, 'name' => 'Frederich Chopin', 'email' => 'chopinf@gmail.com', 'password' => Hash::make('propianist'), 'balance' => 1000000, 'role_id' => 1, 'tier_id' => 2, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 14, 'name' => 'Perry Cooper', 'email' => 'cooper@gmail.com', 'password' => Hash::make('easypassword'), 'balance' => 200000, 'role_id' => 2, 'tier_id' => 5, 'fame' => 150, 'free_recipes_count' => 2, 'paid_recipes_count' => 0],
            ['id' => 15, 'name' => 'Daniel Climber', 'email' => 'danielcl@gmail.com', 'password' => Hash::make('lovebread'), 'balance' => 550000, 'role_id' => 2, 'tier_id' => 3, 'fame' => 70, 'free_recipes_count' => 3, 'paid_recipes_count' => 0],
            ['id' => 16, 'name' => 'Jerry Michael', 'email' => 'jerry.michael@gmail.com', 'password' => Hash::make('jerry12345'), 'balance' => 350000, 'role_id' =>1, 'tier_id'=> 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 17, 'name' => 'Tom Harry', 'email' => 'tomharry001@gmail.com', 'password' => Hash::make('tharry01'), 'balance' => 125000, 'role_id' =>1, 'tier_id'=> 2, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 18, 'name' => 'Jack Smith', 'email' => 'jackSmith23@gmail.com', 'password' => Hash::make('jackSmith23'), 'balance' => 75000, 'role_id' =>1, 'tier_id'=> 1, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 19, 'name' => 'Lee dong-suk', 'email' => 'chefleedongsuk@gmail.com', 'password' => Hash::make('cookwithpassion'), 'balance' => 253000, 'role_id' =>3, 'tier_id'=> 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
            ['id' => 20, 'name' => 'Han Ji-pyeong', 'email' => 'jipyeong@gmail.com', 'password' => Hash::make('teamhanjipyeong'), 'balance' => 85000, 'role_id' =>2, 'tier_id'=> 3, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
        ]);
    }
}
