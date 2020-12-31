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
        DB::table('user')->insert([
           ['id' => 6, 'name' => 'Choi Soobin', 'email' => 'soobin@gmail.com', 'password' => Hash::make('csb0512'), 'balance' => 150000, 'role_id' => 1, 'tier_id' => 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
           ['id' => 7, 'name' => 'Kim Seokjin', 'email' => 'ksjin@gmail.com', 'password' => Hash::make('wwh921204'), 'balance' => 85000, 'role_id' => 1, 'tier_id' => 3, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
           ['id' => 8, 'name' => 'Kim Yong-sun', 'email' => 'solarsido@gmail.com', 'password' => Hash::make('mmm0611'), 'balance' => 33500, 'role_id' => 1, 'tier_id' => 2, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
           ['id' => 9, 'name' => 'Coltrane Maverick', 'email' => 'coltmav@gmail.com', 'password' => Hash::make('mavcol00'), 'balance' => 103000, 'role_id' => 1, 'tier_id' => 4, 'fame' => 0, 'free_recipes_count' => 0, 'paid_recipes_count' => 0],
           ['id' => 10, 'name' => 'William Poernomo', 'email' => 'willpoer@gmail.com', 'password' => Hash::make('butterpo12'), 'balance' => 590000, 'role_id' => 2, 'tier_id' => 5, 'fame' => 190, 'free_recipes_count' => 5, 'paid_recipes_count' =>0],
        ]);
    }
}
