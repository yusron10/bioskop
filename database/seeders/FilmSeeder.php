<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Film::truncate();
        Schema::enableForeignKeyConstraints();

        $filmD = [
            [
                'genre_id' => 1,
            'judul' => 'The Medium', 
            'tahun' => '2021',
            'deskripsi' => 'Saat tim dokumenter mengikuti Nim seorang dukun di daerah Isan - Thailand Utara mereka bertemu dengan keponakannya bernama Mink yang menunjukkan gejala aneh. Nampaknya Mink akan mewarisi bakat dukun dari keturunan keluarga mereka', 
            'image' => 'none.jpg'
            ],

            [
                'genre_id' => 4,
                'judul' => 'Luck',
                'tahun' => '2022', 
                'deskripsi' => 'Luck adalah film komedi fantasi animasi komputer tahun 2022 yang disutradarai oleh Peggy Holmes, disutradarai oleh Javier Abad, dan ditulis oleh Kiel Murray yang menulis cerita bersama Jonathan Aibel dan Glenn Berger, berdasarkan konsep asli oleh Rebeca Carrasco, Juan De Dios dan Julián Romero.', 
             
              'image' => 'none.jpg'
            ]

        ];
        
        foreach ($filmD as $fd) {
            Film::create([
                'genre_id' => $fd['genre_id'],
                'judul' => $fd['judul'], 
                'tahun' => Carbon::parse($fd['tahun']),
                'deskripsi' => $fd['deskripsi'],
                'image' => $fd['image'],
                
            ]);
        }
    }
}
