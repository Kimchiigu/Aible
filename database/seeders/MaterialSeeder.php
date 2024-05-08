<?php

namespace Database\Seeders;

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
        $title = Str::random(8);
        DB::table('materials')->insert([
            'title' => $title,
            'slug' => Str::slug(strtolower($title), '_'),
            'excerpt' => Str::random(15),
            'body' => Str::random(40),
            'src' => "assets/images/dummy.jpg"
        ]);
    }
}
