<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Platinum',
                'price' => '450rb',
                'description' => 'Paket makeup dasar dengan kualitas terjamin',
                'features' => [
                    'Prewedding',
                    'Photoshoot for Event',
                    'Graduation / Wisuda',
                    'Sweet Seventeen',
                    'Makeup Party'
                ],
                'color_gradient' => 'from-gray-400 to-gray-600',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Titanium',
                'price' => '550rb',
                'description' => 'Paket makeup dengan variasi lebih lengkap',
                'features' => [
                    'Prewedding',
                    'Photoshoot for Event',
                    'Graduation / Wisuda',
                    'Sweet Seventeen',
                    'Makeup Party',
                    'Bridesmaid of Bride',
                    'Angpao Girls of Bride'
                ],
                'color_gradient' => 'from-gray-500 to-gray-700',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Premium',
                'price' => '650rb',
                'description' => 'Paket makeup premium untuk acara spesial',
                'features' => [
                    'Prewedding',
                    'Photoshoot for Event',
                    'Graduation / Wisuda',
                    'Sweet Seventeen',
                    'Makeup Party',
                    'Bridesmaid of Bride',
                    'Angpao Girls of Bride',
                    'Mature (Tante) of Bride',
                    'Sister of Bride'
                ],
                'color_gradient' => 'from-pink-500 to-pink-700',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Gold',
                'price' => '750rb',
                'description' => 'Paket makeup gold dengan layanan lengkap',
                'features' => [
                    'Prewedding',
                    'Engagement / Sangjit',
                    'Photoshoot for Event',
                    'Graduation / Wisuda',
                    'Sweet Seventeen',
                    'Makeup Party',
                    'Bridesmaid of Bride',
                    'Angpao Girls of Bride',
                    'Mature (Tante) of Bride',
                    'Sister of Bride',
                    'Mature (Mama) of Bride'
                ],
                'color_gradient' => 'from-yellow-500 to-yellow-700',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Luxury',
                'price' => '900rb',
                'description' => 'Paket makeup luxury dengan semua layanan terbaik',
                'features' => [
                    'Prewedding',
                    'Engagement / Sangjit',
                    'Wedding',
                    'Photoshoot for Event',
                    'Graduation / Wisuda',
                    'Sweet Seventeen',
                    'Makeup Party',
                    'Bridesmaid of Bride',
                    'Angpao Girls of Bride',
                    'Mature (Tante) of Bride',
                    'Sister of Bride',
                    'Mature (Mama) of Bride'
                ],
                'color_gradient' => 'from-purple-600 to-purple-800',
                'order' => 5,
                'is_active' => true
            ],
        ];

        foreach ($packages as $package) {
            Package::updateOrCreate(
                ['name' => $package['name']],
                $package
            );
        }

        $this->command->info('Packages seeded successfully!');
    }
}
