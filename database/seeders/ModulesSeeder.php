<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Module;

class ModulesSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            [
                'order' => 1,
                'title' => 'Modul 01 Pengenalan Esai',
                'slug' => 'modul-01',
                'link' => 'https://drive.google.com/file/d/1aIepXuyxLFhTC4SOF3H3tm2iQOEjbWjv/view?usp=sharing',
                'video_url' => 'https://www.youtube.com/embed/hmS_BIsQtPg',
                'description' => 'Esai ilmiah menggabungkan opini dominan dan fakta pendukung. Berbeda dari laporan penelitian, esai bertujuan mengajak pembaca menerima gagasan penulis dengan bahasa yang luwes dan komunikatif.',
            ],
            [
                'order' => 2,
                'title' => 'Modul 02 Teknik Penggalian Ide',
                'slug' => 'modul-02',
                'link' => 'https://drive.google.com/file/d/1Kn8WEDCNksOZ9oNUWqsxBZ-gkbkaa77b/view?usp=sharing',
                'video_url' => 'https://www.youtube.com/embed/jv5pRKHlbOA?si=Gre7YXVF8yoCed4I',
                'description' => 'Teknik menggali ide: brainstorming, mind mapping, observasi, studi literatur, dan perumusan problem statement yang jelas agar arah tulisan fokus dan sistematis (5W+1H).',
            ],
            [
                'order' => 3,
                'title' => 'Modul 03 Struktur Esai Ilmiah',
                'slug' => 'modul-03',
                'link' => 'https://drive.google.com/file/d/1yFxehYsJLSZ26uNJfKU18aUweXou1M7c/view?usp=drive_link',
                'video_url' => 'https://www.youtube.com/embed/6-HCjJMYz2M',
                'description' => 'Mengusung ide inovatif dan relevan dengan argumen terstruktur. Tekankan perspektif baru, penyajian unik, dan penggunaan bukti yang kuat untuk membedakan karya.',
            ],
            [
                'order' => 4,
                'title' => 'Modul 04 Teknik Pembuatan Judul Esai',
                'slug' => 'modul-04',
                'link' => 'https://drive.google.com/file/d/16n8Ttk1i42L7zgHUmNpd3Jc-ooqSKm0J/view?usp=drive_link',
                'video_url' => 'https://www.youtube.com/embed/HlwlHfmFc0s',
                'description' => 'Pahami struktur pendahuluan–isi–penutup. Pendahuluan yang menarik, isi yang jelas dan meyakinkan, serta penutup yang ringkas dan inspiratif.',
            ],
            [
                'order' => 5,
                'title' => 'Modul 05 Cara Mencari dan Menilai Kredibilitas Sumber Referensi Ilmiah',
                'slug' => 'modul-05',
                'link' => 'https://drive.google.com/file/d/1pkr_2l1yaZylid4depXcD3XsqE-x5j3x/view?usp=drive_link',
                'video_url' => 'https://www.youtube.com/embed/YBCrL_dnTdY',
                'description' => 'Gunakan literatur primer sebagai rujukan utama dan nilai kredibilitas referensi (indeks kuartil Q1–Q4 atau SINTA). Akses via Google Scholar, MDPI, Sciencedirect, dll.',
            ],
            [
                'order' => 6,
                'title' => 'Modul 06 Kode Etik Ilmiah dan Teknik Sitasi',
                'slug' => 'modul-06',
                'link' => 'https://drive.google.com/file/d/1YMbu-b2VST8ccgTk0RXgUfFSNyCqMJwL/view?usp=drive_link',
                'video_url' => 'https://www.youtube.com/embed/ptcacSRHDL8',
                'description' => 'Hindari fabrikasi, plagiarisme, dan falsifikasi. Terapkan parafrase dan gaya sitasi (APA/IEEE/Harvard) untuk menjaga integritas akademik.',
            ],
            [
                'order' => 7,
                'title' => 'Modul 07 07_Teknik Penulisan Pendahuluan Esai',
                'slug' => 'modul-07',
                'link' => 'https://drive.google.com/file/d/1orP0whksjZjCJ83JKCoTOwapvXxgSuCi/view?usp=drive_link',
                'video_url' => 'https://www.youtube.com/embed/lZUIuA9xaMA',
                'description' => 'Pendahuluan berisi latar belakang, tujuan, dan dasar teori dengan pola segitiga terbalik; dapat diperkuat kutipan/data/visual agar menarik.',
            ],
            [
                'order' => 8,
                'title' => 'Modul 08 Teknik Penulisan Bagian Isi',
                'slug' => 'modul-08',
                'link' => 'https://drive.google.com/file/d/1NMT7YR_RVIHLtpwvjYQuhW07EsnFY9kz/view?usp=drive_link',
                'video_url' => 'https://www.youtube.com/embed/taVkOajq-Bs',
                'description' => 'Isi menyajikan tinjauan, metode, dan pembahasan secara meyakinkan; tambahkan visualisasi (sketsa/diagram) agar konkret dan mudah dipahami.',
            ],
            [
                'order' => 9,
                'title' => 'Modul 09 Teknik Penulisan Bagian Penutup Esai',
                'slug' => 'modul-09',
                'link' => 'https://drive.google.com/file/d/1dLwiTgievK_kNSXuV7qHaZjCQur6Mliu/view?usp=drive_link',
                'video_url' => 'https://www.youtube.com/embed/7nZW3_POjLg',
                'description' => 'Penutup merangkum inti, memberi rekomendasi/ajakan, dan menyampaikan harapan; dapat diperkaya kutipan inspiratif yang relevan.',
            ],
        ];

        foreach ($modules as $m) {
            Module::updateOrCreate(
                ['slug' => $m['slug']],
                [
                    'title' => $m['title'],
                    'description' => $m['description'],
                    'link' => $m['link'],
                    'order' => $m['order'],
                    'video_url' => $m['video_url'] ?? null,
                    'is_active' => true,
                ]
            );
        }
    }
}
