<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        User::truncate();
//        factory(User::class, 5)->create();
        
        Article::truncate();
        factory(Article::class, 50)->create();
    }
}
