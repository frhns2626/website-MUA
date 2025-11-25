<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Prewedding',
                'platinum_price' => '450rb',
                'titanium_price' => '550rb',
                'premium_price' => '650rb',
                'gold_price' => '750rb',
                'luxury_price' => '900rb',
                'order' => 1,
                'is_active' => true
            ],
            [
                'name' => 'Engagement / Sangjit',
                'platinum_price' => '600rb',
                'titanium_price' => '700rb',
                'premium_price' => '800rb',
                'gold_price' => '900rb',
                'luxury_price' => '1jt',
                'order' => 2,
                'is_active' => true
            ],
            [
                'name' => 'Wedding',
                'platinum_price' => '1,2jt',
                'titanium_price' => '1,5jt',
                'premium_price' => '1,8jt',
                'gold_price' => '2jt',
                'luxury_price' => '2,5jt',
                'order' => 3,
                'is_active' => true
            ],
            [
                'name' => 'Mature (Mama) of Bride',
                'platinum_price' => '600rb',
                'titanium_price' => '700rb',
                'premium_price' => '850rb',
                'gold_price' => '1jt',
                'luxury_price' => '1,2jt',
                'order' => 4,
                'is_active' => true
            ],
            [
                'name' => 'Mature (Tante) of Bride',
                'platinum_price' => '500rb',
                'titanium_price' => '600rb',
                'premium_price' => '700rb',
                'gold_price' => '850rb',
                'luxury_price' => '1jt',
                'order' => 5,
                'is_active' => true
            ],
            [
                'name' => 'Sister of Bride',
                'platinum_price' => '500rb',
                'titanium_price' => '600rb',
                'premium_price' => '700rb',
                'gold_price' => '850rb',
                'luxury_price' => '1jt',
                'order' => 6,
                'is_active' => true
            ],
            [
                'name' => 'Bridesmaid of Bride',
                'platinum_price' => '400rb',
                'titanium_price' => '450rb',
                'premium_price' => '550rb',
                'gold_price' => '750rb',
                'luxury_price' => '900rb',
                'order' => 7,
                'is_active' => true
            ],
            [
                'name' => 'Angpao Girls of Bride',
                'platinum_price' => '400rb',
                'titanium_price' => '450rb',
                'premium_price' => '550rb',
                'gold_price' => '750rb',
                'luxury_price' => '900rb',
                'order' => 8,
                'is_active' => true
            ],
            [
                'name' => 'Photoshoot for Event',
                'platinum_price' => '350rb',
                'titanium_price' => '400rb',
                'premium_price' => '500rb',
                'gold_price' => '650rb',
                'luxury_price' => '800rb',
                'order' => 9,
                'is_active' => true
            ],
            [
                'name' => 'Graduation / Wisuda',
                'platinum_price' => '350rb',
                'titanium_price' => '400rb',
                'premium_price' => '500rb',
                'gold_price' => '650rb',
                'luxury_price' => '800rb',
                'order' => 10,
                'is_active' => true
            ],
            [
                'name' => 'Sweet Seventeen',
                'platinum_price' => '350rb',
                'titanium_price' => '400rb',
                'premium_price' => '500rb',
                'gold_price' => '650rb',
                'luxury_price' => '800rb',
                'order' => 11,
                'is_active' => true
            ],
            [
                'name' => 'Makeup Party',
                'platinum_price' => '350rb',
                'titanium_price' => '400rb',
                'premium_price' => '500rb',
                'gold_price' => '650rb',
                'luxury_price' => '800rb',
                'order' => 12,
                'is_active' => true
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service
            );
        }

        $this->command->info('Services seeded successfully!');
    }
}
