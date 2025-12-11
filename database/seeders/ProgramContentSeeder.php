<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramContent;

class ProgramContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'key' => 'visi_misi',
                'title' => 'Visi & Misi',
                'content' => '<h2 class="text-center">Visi</h2>
                <p class="text-center mb-4">
                    Program studi yang unggul dalam bidang rekayasa perangkat lunak, berorientasi global, 
                    menjunjung tinggi nilai-nilai integritas dan bersemangat kebhinekaan.
                </p>

                <h2 class="text-center mt-4">Misi</h2>
                <ul>
                    <li>Menyelenggarakan program studi Rekayasa Perangkat Lunak secara efektif dan efisien untuk mendukung terlaksananya Tri Dharma perguruan tinggi.</li>
                    <li>Menghasilkan sarjana di bidang rekayasa perangkat lunak yang kompeten, solutif, berpola pikir logis dan sistematis, memiliki kedalaman spiritual, menjunjung kemanusiaan, rendah hati, berintegritas dan profesional.</li>
                    <li>Menghasilkan penelitian yang unggul, solutif, inovatif dan transformatif bagi masyarakat di bidang rekayasa perangkat lunak.</li>
                    <li>Memanfaatkan ilmu rekayasa perangkat lunak yang berdaya guna dan berhasil guna bagi masyarakat.</li>
                    <li>Membangun kerja sama dan mengelola jejaring berkelanjutan dengan dunia pendidikan, masyarakat, pemerintah dan industri untuk mewujudkan keunggulan transformatif.</li>
                </ul>'
            ],
            [
                'key' => 'tujuan',
                'title' => 'Tujuan Program Studi',
                'content' => '<h3 class="fw-bold text-primary">Tujuan Prodi</h3>
                <ul>
                    <li>Berkontribusi dalam memperluas akses pendidikan tinggi yang berkualitas dan terjangkau bagi masyarakat di bidang rekayasa perangkat lunak.</li>
                    <li>Menghasilkan sarjana bidang Rekayasa Perangkat Lunak yang bermoral, berintegritas, profesional, bertanggung jawab, dan mampu berkarya dengan keahliannya di bidang rekayasa perangkat lunak.</li>
                    <li>Berkontribusi dalam pengembangan dan penelitian perangkat lunak yang unggul, solutif, inovatif dan transformatif bagi masyarakat dan kehidupan.</li>
                    <li>Menerapkan ilmu rekayasa perangkat lunak yang berdaya guna dan berhasil guna bagi masyarakat.</li>
                    <li>Menjalin kerja sama dengan dunia pendidikan, masyarakat, pemerintah dan industri yang berkelanjutan, beretika, dan bermanfaat di bidang rekayasa perangkat lunak.</li>
                </ul>'
            ],
            [
                'key' => 'akreditasi',
                'title' => 'Akreditasi',
                'content' => '<p>Konten akreditasi program studi akan ditampilkan di sini. Silakan edit konten ini dari panel admin.</p>'
            ]
        ];

        foreach ($contents as $content) {
            ProgramContent::firstOrCreate(
                ['key' => $content['key']],
                $content
            );
        }
    }
}
