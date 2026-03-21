<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Project::create([
            'title' => 'DevNet Portfolio',
            'description' => 'مشروع متكامل لعرض الأعمال باستخدام React و Laravel API.',
            'technologies' => ['Laravel', 'React', 'Tailwind'],
            'github_url' => 'https://github.com/NadaS2003',
        ]);
    }
}
