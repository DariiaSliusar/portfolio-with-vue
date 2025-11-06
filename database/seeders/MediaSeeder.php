<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Media::insert([
            [
                'link' => 'https://www.instagram.com',
                'icon' => 'fab fa-instagram',
            ],
            [
                'link' => 'https://www.linkedin.com',
                'icon' => 'fab fa-linkedin-in',
            ],
        ]);
    }
}
