<?php

namespace Database\Seeders;

use App\Models\Kebaya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KebayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kebayas = [
            [
                'title' => 'Kebaya Modern',
                'description' => 'Kebaya modern dengan desain kontemporer yang elegan dan nyaman dipakai untuk berbagai acara.',
                'price' => 'Rp 150.000',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Kebaya Tradisional',
                'description' => 'Kebaya tradisional dengan motif klasik yang cocok untuk acara adat dan formal.',
                'price' => 'Rp 200.000',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Kebaya Wisuda',
                'description' => 'Kebaya khusus untuk acara wisuda dengan desain yang anggun dan formal.',
                'price' => 'Rp 175.000',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Kebaya Wedding',
                'description' => 'Kebaya pernikahan dengan detail yang mewah dan elegan untuk acara pernikahan.',
                'price' => 'Rp 250.000',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($kebayas as $kebaya) {
            // Cek apakah kebaya sudah ada berdasarkan title
            $existingKebaya = Kebaya::where('title', $kebaya['title'])->first();
            
            if (!$existingKebaya) {
                Kebaya::create($kebaya);
                $this->command->info("Kebaya '{$kebaya['title']}' berhasil ditambahkan.");
            } else {
                $this->command->warn("Kebaya '{$kebaya['title']}' sudah ada, dilewati.");
            }
        }

        $this->command->info('Seeder kebaya selesai dijalankan!');
    }
}
