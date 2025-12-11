<?php

namespace Database\Seeders;

use App\Models\Pupuk;
use Illuminate\Database\Seeder;

class PupukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pupukData = [
            [
                'nama_pupuk' => 'Urea',
                'jenis_pupuk' => 'Nitrogen',
                'deskripsi' => 'Pupuk urea mengandung nitrogen tinggi yang baik untuk pertumbuhan tanaman',
                'stok' => 100,
                'harga' => 85000,
                'satuan' => 'kg',
            ],
            [
                'nama_pupuk' => 'NPK Phonska',
                'jenis_pupuk' => 'NPK',
                'deskripsi' => 'Pupuk NPK lengkap dengan kandungan nitrogen, fosfor, dan kalium',
                'stok' => 150,
                'harga' => 120000,
                'satuan' => 'kg',
            ],
            [
                'nama_pupuk' => 'TSP (Triple Super Phosphate)',
                'jenis_pupuk' => 'Fosfor',
                'deskripsi' => 'Pupuk yang mengandung fosfor tinggi untuk pertumbuhan akar',
                'stok' => 80,
                'harga' => 95000,
                'satuan' => 'kg',
            ],
            [
                'nama_pupuk' => 'KCl (Kalium Klorida)',
                'jenis_pupuk' => 'Kalium',
                'deskripsi' => 'Pupuk kalium untuk meningkatkan kualitas buah dan ketahanan tanaman',
                'stok' => 75,
                'harga' => 110000,
                'satuan' => 'kg',
            ],
            [
                'nama_pupuk' => 'Pupuk Organik Kompos',
                'jenis_pupuk' => 'Organik',
                'deskripsi' => 'Pupuk organik dari bahan alami untuk memperbaiki struktur tanah',
                'stok' => 200,
                'harga' => 50000,
                'satuan' => 'karung',
            ],
        ];

        foreach ($pupukData as $data) {
            Pupuk::create($data);
        }
    }
}