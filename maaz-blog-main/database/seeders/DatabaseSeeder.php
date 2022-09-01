<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //creating 10 users and 10 posts respectively below, everytime we seed:
        Post::factory(10)->create(); //when seeding Posts table, the users are also created respectively


    }
}
