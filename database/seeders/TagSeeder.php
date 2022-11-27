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
            ['pagar' => 'gk ngeri'],
            ['pagar' => 'mengerikan'],
            ['pagar' => 'lucu']
        ];
        
        foreach ($tag as $t) {
            Tag::create([
                'pagar' => $t['pagar']
            ]);
        }
    }
}
