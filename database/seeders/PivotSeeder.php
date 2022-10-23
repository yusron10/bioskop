<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Pivot::truncate();
        Schema::enableForeignKeyConstraints();

        $pivot = [
            ['movie_id' => 1, 'tag_id' => 1],
            ['movie_id' => 1, 'tag_id' => 2],
            ['movie_id' => 2, 'tag_id' => 3]
            
            
        ];
        
        foreach ($pivot as $p) {
            Pivot::create([
                'movie_id' => $p['movie_id'],
                'tag_id' => $p['tag_id']
            ]);
        }
    }
}
