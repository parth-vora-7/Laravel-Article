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
        //User::truncate();
        //factory(User::class, 10)->create();
        
        Article::truncate();
        factory(Article::class, 25)->create();
    }
}
