<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Riza Hariati',
            'email' => 'riza@yahoo.com',
            'password' => bcrypt('password'),
            'gender' => 1,
            'username' => 'riza-hariati',
            'is_admin' => true
        ]);
        User::factory(4)->create();
        Post::factory(50)->create();
        Category::create([
            'name' => 'Love',
            'slug' => 'love'
        ]);
        Category::create([
            'name' => 'Economy',
            'slug' => 'economy'
        ]);
        Category::create([
            'name' => 'Fiction',
            'slug' => 'fiction'
        ]);
        Category::create([
            'name' => 'Diet',
            'slug' => 'diet'
        ]);
        Category::create([
            'name' => 'Minimalism',
            'slug' => 'minimalism'
        ]);
        Category::create([
            'name' => 'Culture',
            'slug' => 'culture'
        ]);
        Category::create([
            'name' => 'Education',
            'slug' => 'education'
        ]);
        Category::create([
            'name' => 'Feminism',
            'slug' => 'feminism'
        ]);
    }
}
