<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Functions\Helper;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->sentence();
            $new_project->slug = Helper::generateSlug($new_project->title, Project::class);
            $new_project->body = $faker->paragraphs(4, true);
            $new_project->save();
        }
    }
}
