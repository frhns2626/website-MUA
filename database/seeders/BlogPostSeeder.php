<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => '7 Tips Mudah Menghemat Biaya Pernikahan',
                'slug' => '7-tips-mudah-menghemat-biaya-pernikahan',
                'excerpt' => 'Bagi pasangan yang berencana mengadakan acara pernikahan, pasti perlu mempersiapkan banyak hal termasuk budget. Berikut 7 tips mudah untuk menghemat biaya pernikahan tanpa mengurangi kualitas acara.',
                'content' => '<p>Bagi pasangan yang berencana mengadakan acara pernikahan, pasti perlu mempersiapkan banyak hal termasuk budget. Berikut 7 tips mudah untuk menghemat biaya pernikahan tanpa mengurangi kualitas acara:</p><ol><li>Pilih venue yang sesuai budget</li><li>Gunakan dekorasi yang efisien</li><li>Pilih menu yang sesuai</li><li>Negosiasi dengan vendor</li><li>Gunakan teknologi untuk undangan</li><li>Pilih hari kerja untuk diskon</li><li>Prioritaskan yang penting</li></ol>',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Berbagai Cara Memakai Eyeshadow Untuk Pemula',
                'slug' => 'berbagai-cara-memakai-eyeshadow-untuk-pemula',
                'excerpt' => 'Riasan mata termasuk hal yang paling penting untuk membuat tampilan lebih menarik. Berikut berbagai cara memakai eyeshadow untuk pemula yang mudah dipraktikkan.',
                'content' => '<p>Riasan mata termasuk hal yang paling penting untuk membuat tampilan lebih menarik. Berikut berbagai cara memakai eyeshadow untuk pemula yang mudah dipraktikkan.</p><p>Mulai dengan warna netral, gunakan brush yang tepat, dan aplikasikan dengan teknik yang benar untuk hasil yang maksimal.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Sejarah Perusahaan Wardah Kosmetik Dan Perkembangannya',
                'slug' => 'sejarah-perusahaan-wardah-kosmetik-dan-perkembangannya',
                'excerpt' => 'Kosmetik Wardah merupakan salah satu brand yang popular dan favorit di Indonesia. Mari kita kenal lebih dalam tentang sejarah dan perkembangan perusahaan Wardah.',
                'content' => '<p>Kosmetik Wardah merupakan salah satu brand yang popular dan favorit di Indonesia. Mari kita kenal lebih dalam tentang sejarah dan perkembangan perusahaan Wardah.</p><p>Wardah didirikan dengan visi untuk menyediakan produk kosmetik halal berkualitas tinggi untuk wanita Indonesia.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Mengenal Intimate Wedding Konsep Pernikahan Hemat',
                'slug' => 'mengenal-intimate-wedding-konsep-pernikahan-hemat',
                'excerpt' => 'Rencana pernikahan bisa berbeda-beda antar pasangan, salah satu tren wedding yang sedang populer adalah intimate wedding. Konsep pernikahan hemat namun tetap elegan dan bermakna.',
                'content' => '<p>Rencana pernikahan bisa berbeda-beda antar pasangan, salah satu tren wedding yang sedang populer adalah intimate wedding. Konsep pernikahan hemat namun tetap elegan dan bermakna.</p><p>Intimate wedding biasanya dihadiri oleh keluarga dan teman dekat saja, sehingga lebih fokus pada momen yang berarti.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Cara Make Up Untuk Kulit Kering Agar Tahan Lama',
                'slug' => 'cara-make-up-untuk-kulit-kering-agar-tahan-lama',
                'excerpt' => 'Berikut pembahasan dari Firliamakeup mengenai cara make up untuk kulit kering agar tahan lama. Tips dan trik untuk membuat makeup tetap flawless sepanjang hari.',
                'content' => '<p>Berikut pembahasan dari Firliamakeup mengenai cara make up untuk kulit kering agar tahan lama. Tips dan trik untuk membuat makeup tetap flawless sepanjang hari.</p><p>Penting untuk melakukan skincare sebelum makeup, menggunakan primer yang tepat, dan memilih foundation yang sesuai dengan jenis kulit kering.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Jenis Make Up Look Yang Sedang Populer',
                'slug' => 'jenis-make-up-look-yang-sedang-populer',
                'excerpt' => 'Berikut pembahasan jenis Make Up Look yang sedang populer saat ini. Dari natural look hingga glamour look, pilih yang sesuai dengan kepribadian Anda.',
                'content' => '<p>Berikut pembahasan jenis Make Up Look yang sedang populer saat ini. Dari natural look hingga glamour look, pilih yang sesuai dengan kepribadian Anda.</p><p>Beberapa look yang sedang trending antara lain: natural dewy look, soft glam, bold lip look, dan no-makeup makeup look.</p>',
                'is_published' => true,
                'published_at' => now(),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }

        $this->command->info('Blog posts seeded successfully!');
    }
}
