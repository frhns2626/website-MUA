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
            // Wedding Packages
            [
                'name' => 'Platinum',
                'category' => 'wedding',
                'price' => 'Rp 2.500.000',
                'description' => 'Paket wedding makeup dengan busana wanita',
                'features' => [
                    'Makeup Wedding (No Retouch)',
                    'Busana Wanita 1 (1 Female Attire)',
                    'Hijab Modern',
                    'Softlens Normal'
                ],
                'color_gradient' => 'from-gray-400 to-gray-600',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Titanium',
                'category' => 'wedding',
                'price' => 'Rp 3.000.000',
                'description' => 'Paket wedding makeup lengkap dengan busana sepasang',
                'features' => [
                    'Makeup Wedding (No Retouch)',
                    '1 Pasang Busana Wedding (1 Pair of Wedding Attire)',
                    'Hijab Modern',
                    'Softlens Normal',
                    'Ronce Melati Fresh (Fresh Jasmine Garland)',
                    'Kuku Palsu (False Nails)'
                ],
                'color_gradient' => 'from-gray-500 to-gray-700',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Premium',
                'category' => 'wedding',
                'price' => 'Rp 4.300.000',
                'description' => 'Paket wedding makeup premium dengan busana 2x dan adat panggih',
                'features' => [
                    'Makeup Wedding (Free Retouch)',
                    'Busana 2x (Akad & Resepsi)',
                    'Hijab Modern / Solo / Sunda',
                    'Softlens Normal',
                    'Henna & Kuku Palsu',
                    'Free Adat Panggih',
                    'Ronce Melati Fresh'
                ],
                'color_gradient' => 'from-pink-500 to-pink-700',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Gold',
                'category' => 'wedding',
                'price' => 'Rp 5.500.000',
                'description' => 'Paket wedding makeup gold lengkap dengan busana keluarga dan adat panggih dobel',
                'features' => [
                    'Makeup Wedding (Free Retouch)',
                    'Busana 2x (Akad & Resepsi)',
                    'Hijab Modern / Solo / Sunda',
                    'Softlens Normal',
                    'Henna & Kuku Palsu',
                    'Free Adat Panggih',
                    'Makeup & Busana Jaga Buku 2',
                    'Makeup & Busana Ibu 2',
                    'Busana Bapak 2',
                    'Adat Panggih Dobel',
                    'Ronce Melati Fresh'
                ],
                'color_gradient' => 'from-yellow-500 to-yellow-700',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Luxury',
                'category' => 'wedding',
                'price' => 'Rp 6.500.000',
                'description' => 'Paket wedding makeup luxury lengkap dengan busana 3x dan layanan keluarga',
                'features' => [
                    'Makeup Wedding (Free Retouch)',
                    'Busana 3x (Akad, Adat & Resepsi)',
                    'Hijab Modern / Solo / Sunda',
                    'Softlens Normal',
                    'Henna & Kuku Palsu',
                    'Free Adat Panggih',
                    'Makeup & Busana Jaga Buku 4',
                    'Makeup & Busana Ibu 2',
                    'Busana Bapak 2',
                    'Dobel Free Adat Panggih',
                    'Ronce Melati Fresh'
                ],
                'color_gradient' => 'from-purple-600 to-purple-800',
                'order' => 5,
                'is_active' => true
            ],
            // Wisuda Packages
            [
                'name' => 'Platinum',
                'category' => 'wisuda',
                'price' => 'Rp 350.000',
                'description' => 'Paket wisuda makeup dengan busana wanita',
                'features' => [
                    'Makeup Wisuda',
                    'Busana Wanita 1',
                    'Hijab Modern',
                    'Softlens Normal'
                ],
                'color_gradient' => 'from-blue-400 to-blue-600',
                'order' => 6,
                'is_active' => true
            ],
            [
                'name' => 'Titanium',
                'category' => 'wisuda',
                'price' => 'Rp 400.000',
                'description' => 'Paket wisuda makeup lengkap dengan busana sepasang',
                'features' => [
                    'Makeup Wisuda',
                    '1 Pasang Busana Wisuda',
                    'Hijab Modern',
                    'Softlens Normal',
                    'Kuku Palsu'
                ],
                'color_gradient' => 'from-blue-500 to-blue-700',
                'order' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Premium',
                'category' => 'wisuda',
                'price' => 'Rp 500.000',
                'description' => 'Paket wisuda makeup premium dengan busana 2x',
                'features' => [
                    'Makeup Wisuda',
                    'Busana 2x',
                    'Hijab Modern / Solo / Sunda',
                    'Softlens Normal',
                    'Henna & Kuku Palsu'
                ],
                'color_gradient' => 'from-indigo-500 to-indigo-700',
                'order' => 8,
                'is_active' => true
            ],
            [
                'name' => 'Gold',
                'category' => 'wisuda',
                'price' => 'Rp 650.000',
                'description' => 'Paket wisuda makeup gold lengkap dengan busana keluarga',
                'features' => [
                    'Makeup Wisuda',
                    'Busana 2x',
                    'Hijab Modern / Solo / Sunda',
                    'Softlens Normal',
                    'Henna & Kuku Palsu',
                    'Makeup & Busana Jaga Buku 2',
                    'Makeup & Busana Ibu 2',
                    'Busana Bapak 2'
                ],
                'color_gradient' => 'from-cyan-500 to-cyan-700',
                'order' => 9,
                'is_active' => true
            ],
            [
                'name' => 'Luxury',
                'category' => 'wisuda',
                'price' => 'Rp 800.000',
                'description' => 'Paket wisuda makeup luxury lengkap dengan busana 3x dan layanan keluarga',
                'features' => [
                    'Makeup Wisuda',
                    'Busana 3x',
                    'Hijab Modern / Solo / Sunda',
                    'Softlens Normal',
                    'Henna & Kuku Palsu',
                    'Makeup & Busana Jaga Buku 4',
                    'Makeup & Busana Ibu 2',
                    'Busana Bapak 2'
                ],
                'color_gradient' => 'from-teal-600 to-teal-800',
                'order' => 10,
                'is_active' => true
            ],
        ];

        foreach ($packages as $package) {
            Package::updateOrCreate(
                ['name' => $package['name'], 'category' => $package['category']],
                $package
            );
        }

        $this->command->info('Packages seeded successfully!');
    }
}
