<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Justin Elbert',
            'username' => 'Elbert',
            'email' => 'jelbert@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Daniel Christian',
            'username' => 'Dece',
            'email' => 'dchrist@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'name' => 'Mathew Marcellino',
            'username' => 'Memet',
            'email' => 'matmarcel@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Category::create([
            'name' => 'Illustrations',
            'slug' => 'illustrations'
        ]);

        Category::create([
            'name' => 'Live2D Modelling',
            'slug' => 'live2d-modelling'
        ]);

        Category::create([
            'name' => 'Live2D Rigging',
            'slug' => 'live2d-rigging'
        ]);

        Post::factory(25)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'slug' => 'judul-pertama',
        //     'src' => "assets/nijigenmaLogo.png",
        //     // 'artist' => 'Justin Elbert',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, qui magni? Nostrum facere iste quasi cumque porro quod libero iusto?'
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'slug' => 'judul-kedua',
        //     'src' => "assets/nijigenmaLogo.png",
        //     // 'artist' => 'Justin Elbert',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, qui magni? Nostrum facere iste quasi cumque porro quod libero iusto?'
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'category_id' => 3,
        //     'user_id' => 1,
        //     'slug' => 'judul-ketiga',
        //     'src' => "assets/nijigenmaLogo.png",
        //     // 'artist' => 'Justin Elbert',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, qui magni? Nostrum facere iste quasi cumque porro quod libero iusto?'
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'slug' => 'judul-keempat',
        //     'src' => "assets/nijigenmaLogo.png",
        //     // 'artist' => 'Justin Elbert',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, qui magni? Nostrum facere iste quasi cumque porro quod libero iusto?'
        // ]);

        // Post::create([
        //     'title' => 'Judul Kelima',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'slug' => 'judul-kelima',
        //     'src' => "assets/nijigenmaLogo.png",
        //     // 'artist' => 'Justin Elbert',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, qui magni? Nostrum facere iste quasi cumque porro quod libero iusto?'
        // ]);
    }
}
