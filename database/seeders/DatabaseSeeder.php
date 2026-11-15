<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        PostCategory::factory(5)->create()->each(function (PostCategory $category): void {
            Post::factory(2)->create([
                'category' => $category->name,
            ]);
        });

        ProjectCategory::factory(5)->create()->each(function (ProjectCategory $category): void {
            Project::factory(2)->create([
                'project_category_id' => $category->id,
            ]);
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
