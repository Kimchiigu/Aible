<?php

namespace Database\Seeders;

use App\Models\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = [
            [
                'title' => 'Introduction to Computer Programming',
                'slug' => "introductiontocomputerprogramming",
                'excerpt' => 'Covers basic programming concepts and languages such as Python, Java, or C++. Emphasizes problem-solving and logical thinking skills.',
                'body' => 'This course introduces learners to the fundamental principles of computer programming, focusing on developing problem-solving skills through coding. It includes modules on syntax, control structures, data types, and algorithms. Students will work on hands-on projects to practice writing and debugging code. By the end of the course, participants will be able to create simple programs and understand the basics of how software is developed.',
                'src' => 'assets/images/programmingtraining.webp',
            ],
            [
                'title' => 'Graphic Design Fundamentals',
                'slug' => 'graphicdesignfundamentals',
                'excerpt' => 'Teaches the principles of graphic design, including typography, color theory, and layout, using software like Adobe Photoshop and Illustrator.',
                'body' => 'This training material covers the core concepts of graphic design, helping learners develop a strong foundation in visual communication. Topics include understanding color theory, selecting appropriate fonts, and creating balanced layouts. The course also includes practical exercises using industry-standard software such as Adobe Photoshop and Illustrator, allowing students to apply their knowledge in real-world scenarios and create professional-quality designs.',
                'src' => 'assets/images/graphicdesigntraining.jpg',
            ]
        ];

        DB::table('materials')->insert($materials);
    }
}
