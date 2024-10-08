<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articlesTitles = [
            "The Art of Scoring Goals",
            "Mastering the Perfect Serve",
            "Unleashing Your Inner Athlete",
            "The Science of Sports Performance",
            "Achieving Victory Through Teamwork",
            "Exploring the World of Extreme Sports"
        ];

        $articlesShortDescriptions = [
            "Learn how to score goals like a pro with this comprehensive guide to the art of goal-scoring.",
            "Master the perfect serve with this step-by-step guide to serving in tennis.",
            "Unleash your inner athlete with this guide to becoming the best athlete you can be.",
            "Discover the science behind sports performance and how to improve your game.",
            "Achieve victory through teamwork with this guide to working together as a team.",
            "Explore the world of extreme sports and learn how to get started with this guide."
        ];

        $users = User::all();

        foreach ($articlesTitles as $index => $title) {
            $article = Article::firstOrCreate(
                ['title' => $title],
                [
                    'short_description' => $articlesShortDescriptions[$index],
                    'description' => "This is the description of the article with title: $title",
                    'author_id' => $users->random()->id,
                ]
            );

            $article->save();
        }
    }
}
