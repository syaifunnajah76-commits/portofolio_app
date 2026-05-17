<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\karyas;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'labiblpc@gmail.com',
            'password' => Hash::make('12345678'),
        ]);


        $web = Categories::create([
            'name_category' => 'Web Development',
        ]);
        $mobile = Categories::create([
            'name_category' => 'Mobile Development',
        ]);


        karyas::create([
            'title' => 'Portofolio Website',
            'description' => 'A personal portfolio website built using Laravel, showcasing my projects and skills in web development.',
            'image' => 'portofolio_website.jpg',
            'category_id' => $web->id,
        ]);
        karyas::create([
            'title' => 'E-commerce Mobile App',
            'description' => 'A mobile application for e-commerce built using Flutter, allowing users to browse and purchase products seamlessly.',
            'image' => 'ecommerce_mobile_app.jpg',
            'category_id' => $mobile->id,
        ]);
    }
}
