<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        $tag = [
            ['name' => 'gk ngeri'],
            ['name' => 'mengerikan'],
            ['name' => 'lucu']
        ];
        
        foreach ($tag as $t) {
            Tag::create([
                'name' => $t['name']
            ]);
        }
    }
}
