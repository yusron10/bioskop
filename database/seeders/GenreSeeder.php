<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Genre::truncate();
        Schema::enableForeignKeyConstraints();

        $genre = [
            ['name' => 'Horor'],
            ['name' => 'Drama'],
            ['name' => 'Romance'],
            ['name' => 'Komedi']
        ];
        
        foreach ($genre as $g) {
            Genre::create([
                'name' => $g['name']
            ]);
        }
    }
}
