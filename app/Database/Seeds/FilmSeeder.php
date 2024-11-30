<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'        => 'The Shawshank Redemption',
                'genre'        => 'drama',
                'tahun_terbit' => '1994',
            ],
            [
                'judul'        => 'The Hangover',
                'genre'        => 'comedy',
                'tahun_terbit' => '2009',
            ],
            [
                'judul'        => 'A Nightmare on Elm Street',
                'genre'        => 'horror',
                'tahun_terbit' => '1984',
            ],
            [
                'judul'        => 'Inception',
                'genre'        => 'thriller',
                'tahun_terbit' => '2010',
            ],
            [
                'judul'        => 'The Godfather',
                'genre'        => 'drama',
                'tahun_terbit' => '1972',
            ],
            [
                'judul'        => 'Superbad',
                'genre'        => 'comedy',
                'tahun_terbit' => '2007',
            ],
            [
                'judul'        => 'The Conjuring',
                'genre'        => 'horror',
                'tahun_terbit' => '2013',
            ],
            [
                'judul'        => 'Gone Girl',
                'genre'        => 'thriller',
                'tahun_terbit' => '2014',
            ],
            [
                'judul'        => 'Pulp Fiction',
                'genre'        => 'thriller',
                'tahun_terbit' => '1994',
            ],
        ];
        $this->db->table('film')->insertBatch($data);
    }
}
