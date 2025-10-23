<?php

namespace Database\Seeders;

use App\Models\PsuContent;
use Illuminate\Database\Seeder;

class PsuContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // 1. Pengertian PSU
            [
                'section_key' => 'pengertian',
                'section_title' => 'Pengertian Prasarana, Sarana, dan Utilitas Umum (PSU)',
                'content_type' => 'info',
                'content' => '<p><strong>Prasarana, Sarana, dan Utilitas Umum (PSU)</strong> adalah kelengkapan dasar fisik lingkungan hunian yang memenuhi standar tertentu untuk kebutuhan bertempat tinggal yang layak, sehat, aman, dan nyaman.</p>
                <p>PSU mencakup:</p>
                <ul>
                    <li><strong>Prasarana:</strong> Jalan lingkungan, drainase, dan jaringan air limbah</li>
                    <li><strong>Sarana:</strong> RTH (Ruang Terbuka Hijau), tempat bermain anak, dan sarana olahraga</li>
                    <li><strong>Utilitas Umum:</strong> Jaringan air bersih, listrik, telepon, dan gas</li>
                </ul>
                <p>Berdasarkan Peraturan Menteri PUPR, PSU adalah kelengkapan dasar yang wajib disediakan dalam setiap pembangunan kawasan perumahan dan permukiman.</p>',
                'order' => 1,
                'is_active' => true,
                'is_published' => true,
            ],

            // 2. Tujuan Program
            [
                'section_key' => 'tujuan',
                'section_title' => 'Tujuan Program PSU',
                'content_type' => 'info',
                'content' => '<p>Program Peningkatan PSU bertujuan untuk:</p>
                <ul>
                    <li>Meningkatkan kualitas infrastruktur dasar di kawasan perumahan dan permukiman</li>
                    <li>Mewujudkan lingkungan hunian yang layak, sehat, aman, dan nyaman</li>
                    <li>Mengurangi dampak banjir dan genangan air melalui sistem drainase yang baik</li>
                    <li>Meningkatkan aksesibilitas melalui pembangunan jalan lingkungan yang memadai</li>
                    <li>Menyediakan ruang terbuka hijau untuk kesehatan dan rekreasi masyarakat</li>
                    <li>Meningkatkan nilai properti dan kualitas hidup masyarakat</li>
                </ul>',
                'order' => 2,
                'is_active' => true,
                'is_published' => true,
            ],

            // 3. Dasar Hukum
            [
                'section_key' => 'dasar_hukum',
                'section_title' => 'Dasar Hukum Program PSU',
                'content_type' => 'info',
                'content' => '<p>Program Peningkatan PSU didasarkan pada:</p>
                <ol>
                    <li>Undang-Undang Nomor 1 Tahun 2011 tentang Perumahan dan Kawasan Permukiman</li>
                    <li>Peraturan Pemerintah Nomor 12 Tahun 2021 tentang Perubahan atas PP Nomor 14 Tahun 2016 tentang Penyelenggaraan Perumahan dan Kawasan Permukiman</li>
                    <li>Peraturan Menteri PUPR Nomor 14 Tahun 2017 tentang Prasarana, Sarana, dan Utilitas Gedung dan Lingkungan</li>
                    <li>Peraturan Daerah Kota Padang tentang Perumahan dan Permukiman</li>
                    <li>RPJMD Kota Padang tentang Pembangunan Infrastruktur Permukiman</li>
                </ol>',
                'order' => 3,
                'is_active' => true,
                'is_published' => true,
            ],

            // 4. Jenis-jenis PSU
            [
                'section_key' => 'jenis_psu',
                'section_title' => 'Jenis-Jenis PSU yang Dibangun',
                'content_type' => 'info',
                'content' => '<h5>1. Jalan Lingkungan</h5>
                <p>Pembangunan dan perbaikan jalan di kawasan perumahan untuk meningkatkan aksesibilitas dan mobilitas warga.</p>

                <h5>2. Sistem Drainase</h5>
                <p>Pembangunan saluran drainase untuk mencegah genangan air dan banjir di kawasan permukiman.</p>

                <h5>3. Jaringan Air Bersih</h5>
                <p>Penyediaan akses air bersih yang layak dan aman untuk kebutuhan sehari-hari masyarakat.</p>

                <h5>4. Jaringan Listrik</h5>
                <p>Peningkatan infrastruktur kelistrikan termasuk penerangan jalan umum (PJU) di kawasan perumahan.</p>

                <h5>5. Ruang Terbuka Hijau (RTH)</h5>
                <p>Pembangunan taman, area hijau, dan tempat rekreasi untuk meningkatkan kualitas lingkungan dan kesehatan masyarakat.</p>

                <h5>6. Tempat Pengelolaan Sampah (TPS)</h5>
                <p>Penyediaan fasilitas pengelolaan sampah yang memadai untuk menjaga kebersihan lingkungan.</p>',
                'order' => 4,
                'is_active' => true,
                'is_published' => true,
            ],

            // 5. Statistik Dashboard
            [
                'section_key' => 'statistik_2025',
                'section_title' => 'Statistik Program PSU Tahun 2025',
                'content_type' => 'statistic',
                'data' => [
                    'total_programs' => 24,
                    'ongoing_programs' => 12,
                    'completed_programs' => 8,
                    'total_locations' => 11,
                    'total_budget' => 25000000000,
                    'year' => 2025
                ],
                'order' => 5,
                'is_active' => true,
                'is_published' => true,
            ],

            // 6. Program Jalan Lingkungan
            [
                'section_key' => 'program-jalan-lingkungan-padang-utara',
                'section_title' => 'Pembangunan Jalan Lingkungan Padang Utara',
                'content_type' => 'program',
                'content' => 'Program pembangunan dan peningkatan kualitas jalan lingkungan di kawasan Kecamatan Padang Utara dan Koto Tangah untuk meningkatkan aksesibilitas dan mobilitas warga. Program ini mencakup perbaikan jalan rusak, pembangunan jalan baru, dan peningkatan kualitas perkerasan jalan.',
                'data' => [
                    'category' => 'Jalan Lingkungan',
                    'location' => 'Kec. Padang Utara, Kec. Koto Tangah',
                    'budget' => 2500000000,
                    'progress' => 75,
                    'status' => 'ongoing',
                    'start_date' => '2025-01-15',
                    'target_date' => '2025-12-31',
                    'contractor' => 'PT. Pembangunan Infrastruktur Padang',
                    'images' => []
                ],
                'order' => 6,
                'is_active' => true,
                'is_published' => true,
            ],

            // 7. Program Drainase
            [
                'section_key' => 'program-drainase-lubuk-begalung',
                'section_title' => 'Sistem Drainase Lingkungan Lubuk Begalung',
                'content_type' => 'program',
                'content' => 'Pembangunan dan perbaikan sistem drainase untuk mencegah genangan air dan banjir di kawasan Lubuk Begalung dan Kuranji. Program ini meliputi normalisasi saluran, pembangunan gorong-gorong, dan pembuatan sumur resapan.',
                'data' => [
                    'category' => 'Drainase',
                    'location' => 'Kec. Lubuk Begalung, Kec. Kuranji',
                    'budget' => 1800000000,
                    'progress' => 60,
                    'status' => 'ongoing',
                    'start_date' => '2025-02-01',
                    'target_date' => '2025-11-30',
                    'contractor' => 'PT. Sarana Teknik Infrastruktur',
                    'images' => []
                ],
                'order' => 7,
                'is_active' => true,
                'is_published' => true,
            ],

            // 8. Program Jaringan Listrik
            [
                'section_key' => 'program-listrik-nanggalo-pauh',
                'section_title' => 'Jaringan Listrik dan PJU Nanggalo-Pauh',
                'content_type' => 'program',
                'content' => 'Peningkatan infrastruktur kelistrikan dan penerangan jalan umum (PJU) di kawasan perumahan Kecamatan Nanggalo dan Pauh. Mencakup instalasi PJU LED hemat energi dan peningkatan kapasitas jaringan listrik.',
                'data' => [
                    'category' => 'Jaringan Listrik',
                    'location' => 'Kec. Nanggalo, Kec. Pauh',
                    'budget' => 1200000000,
                    'progress' => 90,
                    'status' => 'final_stage',
                    'start_date' => '2024-10-01',
                    'target_date' => '2025-10-31',
                    'contractor' => 'PT. Cahaya Terang Elektrindo',
                    'images' => []
                ],
                'order' => 8,
                'is_active' => true,
                'is_published' => true,
            ],

            // 9. Program RTH
            [
                'section_key' => 'program-rth-padang-selatan',
                'section_title' => 'Ruang Terbuka Hijau Padang Selatan',
                'content_type' => 'program',
                'content' => 'Pembangunan taman dan ruang terbuka hijau untuk utilitas umum di kawasan Padang Selatan dan Padang Barat. Program ini bertujuan meningkatkan kualitas udara, menyediakan area rekreasi, dan menciptakan lingkungan yang lebih asri.',
                'data' => [
                    'category' => 'Ruang Terbuka Hijau',
                    'location' => 'Kec. Padang Selatan, Kec. Padang Barat',
                    'budget' => 950000000,
                    'progress' => 45,
                    'status' => 'ongoing',
                    'start_date' => '2025-03-01',
                    'target_date' => '2026-01-31',
                    'contractor' => 'PT. Hijau Lestari Nusantara',
                    'images' => []
                ],
                'order' => 9,
                'is_active' => true,
                'is_published' => true,
            ],

            // 10. Laporan-laporan
            [
                'section_key' => 'laporan-dokumen',
                'section_title' => 'Laporan dan Dokumentasi Program PSU',
                'content_type' => 'report',
                'data' => [
                    [
                        'title' => 'Laporan Progress Triwulan III 2025',
                        'description' => 'Laporan kemajuan pelaksanaan program PSU periode Juli-September 2025',
                        'report_date' => '2025-10-10',
                        'file_type' => 'pdf',
                        'file' => ''
                    ],
                    [
                        'title' => 'Dokumentasi Pembangunan Infrastruktur Q2 2025',
                        'description' => 'Dokumentasi foto dan video pelaksanaan pembangunan infrastruktur PSU',
                        'report_date' => '2025-08-20',
                        'file_type' => 'pdf',
                        'file' => ''
                    ],
                    [
                        'title' => 'RAB Program PSU 2025',
                        'description' => 'Rencana Anggaran Biaya program peningkatan PSU tahun anggaran 2025',
                        'report_date' => '2025-01-05',
                        'file_type' => 'xlsx',
                        'file' => ''
                    ]
                ],
                'order' => 10,
                'is_active' => true,
                'is_published' => true,
            ],

            // 11. Galeri Dokumentasi
            [
                'section_key' => 'galeri-dokumentasi',
                'section_title' => 'Galeri Dokumentasi Program PSU',
                'content_type' => 'gallery',
                'data' => [
                    [
                        'title' => 'Pembangunan Jalan Lingkungan Air Tawar',
                        'description' => 'Proyek pembangunan jalan lingkungan dengan lebar 4 meter dan panjang 500 meter',
                        'location' => 'Kelurahan Air Tawar Barat, Kec. Padang Utara',
                        'date' => '2025-08-15',
                        'image' => ''
                    ],
                    [
                        'title' => 'Normalisasi Drainase Lubuk Begalung',
                        'description' => 'Perbaikan saluran drainase untuk mengatasi genangan air saat musim hujan',
                        'location' => 'Kelurahan Lubuk Begalung, Kec. Lubuk Begalung',
                        'date' => '2025-07-20',
                        'image' => ''
                    ],
                    [
                        'title' => 'Pemasangan PJU LED Hemat Energi',
                        'description' => 'Instalasi penerangan jalan umum menggunakan lampu LED untuk efisiensi energi',
                        'location' => 'Kelurahan Nanggalo, Kec. Nanggalo',
                        'date' => '2025-09-10',
                        'image' => ''
                    ],
                    [
                        'title' => 'Taman Kota Padang Selatan',
                        'description' => 'Pembangunan taman kota dengan area bermain anak dan jogging track',
                        'location' => 'Kelurahan Ranah Parak Rumbio, Kec. Padang Selatan',
                        'date' => '2025-06-25',
                        'image' => ''
                    ]
                ],
                'order' => 11,
                'is_active' => true,
                'is_published' => true,
            ],

            // 12. Mekanisme Pengajuan Usulan
            [
                'section_key' => 'mekanisme_pengajuan',
                'section_title' => 'Mekanisme Pengajuan Usulan Program PSU',
                'content_type' => 'info',
                'content' => '<p>Masyarakat dapat mengajukan usulan program peningkatan PSU di wilayah mereka melalui mekanisme berikut:</p>
                <ol>
                    <li><strong>Musyawarah RT/RW:</strong> Usulan dibahas dalam musyawarah tingkat RT/RW untuk mendapatkan kesepakatan warga</li>
                    <li><strong>Pengajuan ke Kelurahan:</strong> Usulan yang telah disepakati diajukan ke Kelurahan dengan melampirkan:
                        <ul>
                            <li>Surat pengantar RT/RW</li>
                            <li>Berita acara musyawarah warga</li>
                            <li>Foto kondisi eksisting</li>
                            <li>Sketsa lokasi</li>
                        </ul>
                    </li>
                    <li><strong>Verifikasi Kecamatan:</strong> Kecamatan melakukan verifikasi dan kompilasi usulan dari seluruh kelurahan</li>
                    <li><strong>Penilaian Dinas DISPORA:</strong> Tim teknis Dinas DISPORA melakukan survei dan penilaian kelayakan</li>
                    <li><strong>Penetapan Program:</strong> Usulan yang lolos seleksi ditetapkan dalam program tahun berikutnya</li>
                </ol>
                <p><strong>Kriteria Penilaian Usulan:</strong></p>
                <ul>
                    <li>Tingkat kebutuhan dan urgensi</li>
                    <li>Jumlah penduduk yang terlayani</li>
                    <li>Kondisi eksisting infrastruktur</li>
                    <li>Kesiapan lahan dan legalitas</li>
                    <li>Partisipasi masyarakat</li>
                    <li>Ketersediaan anggaran</li>
                </ul>',
                'order' => 12,
                'is_active' => true,
                'is_published' => true,
            ],

            // 13. Standar Teknis PSU
            [
                'section_key' => 'standar_teknis',
                'section_title' => 'Standar Teknis Pembangunan PSU',
                'content_type' => 'info',
                'content' => '<h5>A. Jalan Lingkungan</h5>
                <ul>
                    <li>Lebar minimal: 3,5 meter untuk jalan satu arah, 6 meter untuk dua arah</li>
                    <li>Struktur perkerasan sesuai kondisi tanah dan beban lalu lintas</li>
                    <li>Dilengkapi dengan saluran drainase di kedua sisi jalan</li>
                </ul>

                <h5>B. Drainase</h5>
                <ul>
                    <li>Dimensi saluran disesuaikan dengan analisis debit air hujan</li>
                    <li>Kemiringan minimal 0,5% untuk aliran gravitasi</li>
                    <li>Dilengkapi dengan penutup/grill untuk keamanan</li>
                </ul>

                <h5>C. Penerangan Jalan Umum</h5>
                <ul>
                    <li>Jarak antar tiang: 25-30 meter</li>
                    <li>Tinggi tiang: 6-8 meter</li>
                    <li>Menggunakan lampu LED untuk efisiensi energi</li>
                    <li>Tingkat pencahayaan minimal: 5-10 lux</li>
                </ul>

                <h5>D. Ruang Terbuka Hijau</h5>
                <ul>
                    <li>Minimal 30% dari luas kawasan permukiman</li>
                    <li>Dilengkapi dengan jalur pedestrian dan area duduk</li>
                    <li>Penanaman pohon peneduh dengan jarak tanam teratur</li>
                    <li>Tersedia fasilitas tempat sampah dan penerangan</li>
                </ul>',
                'order' => 13,
                'is_active' => true,
                'is_published' => true,
            ],

            // 14. Hak dan Kewajiban Masyarakat
            [
                'section_key' => 'hak_kewajiban',
                'section_title' => 'Hak dan Kewajiban Masyarakat',
                'content_type' => 'info',
                'content' => '<h5>Hak Masyarakat:</h5>
                <ul>
                    <li>Mendapatkan informasi tentang rencana pembangunan PSU di wilayahnya</li>
                    <li>Mengajukan usulan program peningkatan PSU</li>
                    <li>Menikmati fasilitas PSU yang telah dibangun</li>
                    <li>Memberikan masukan dan pengawasan terhadap pelaksanaan program</li>
                    <li>Mendapatkan penjelasan teknis terkait program yang dilaksanakan</li>
                </ul>

                <h5>Kewajiban Masyarakat:</h5>
                <ul>
                    <li>Menjaga dan merawat fasilitas PSU yang telah dibangun</li>
                    <li>Tidak merusak atau mengalihfungsikan fasilitas PSU</li>
                    <li>Berpartisipasi aktif dalam musyawarah perencanaan program</li>
                    <li>Memberikan akses dan izin untuk pembangunan PSU</li>
                    <li>Melaporkan kerusakan fasilitas PSU kepada pihak berwenang</li>
                    <li>Mematuhi aturan penggunaan fasilitas PSU</li>
                </ul>',
                'order' => 14,
                'is_active' => true,
                'is_published' => true,
            ],

            // 15. FAQ
            [
                'section_key' => 'faq',
                'section_title' => 'Pertanyaan yang Sering Diajukan (FAQ)',
                'content_type' => 'info',
                'content' => '<div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Apa yang dimaksud dengan PSU?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                PSU adalah Prasarana, Sarana, dan Utilitas Umum yang merupakan kelengkapan dasar fisik lingkungan hunian seperti jalan, drainase, air bersih, listrik, dan ruang terbuka hijau.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Bagaimana cara mengajukan usulan program PSU?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Usulan diajukan melalui RT/RW, kemudian ke Kelurahan dengan melampirkan berita acara musyawarah, foto kondisi, dan sketsa lokasi. Tim teknis akan melakukan survei dan penilaian kelayakan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Apakah ada biaya yang harus dibayar masyarakat?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Program PSU dibiayai oleh APBD. Namun, masyarakat dapat berpartisipasi dengan menyediakan swadaya berupa material atau tenaga untuk mempercepat dan memperluas cakupan program.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Berapa lama waktu pelaksanaan program PSU?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Waktu pelaksanaan bervariasi tergantung jenis dan volume pekerjaan, umumnya 3-6 bulan untuk satu paket pekerjaan. Program direncanakan dan dilaksanakan sesuai tahun anggaran berjalan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                Kemana harus melapor jika ada kerusakan fasilitas PSU?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kerusakan dapat dilaporkan ke RT/RW, Kelurahan, atau langsung ke Dinas DISPORA melalui telepon, email, atau datang langsung ke kantor. Pelaporan juga bisa melalui aplikasi pengaduan online jika tersedia.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                Apakah program PSU hanya untuk kawasan perumahan baru?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tidak. Program PSU juga ditujukan untuk peningkatan dan rehabilitasi infrastruktur di kawasan permukiman eksisting yang membutuhkan perbaikan atau penambahan fasilitas.
                            </div>
                        </div>
                    </div>
                </div>',
                'order' => 15,
                'is_active' => true,
                'is_published' => true,
            ],

            // 16. Contact Information
            [
                'section_key' => 'contact_info',
                'section_title' => 'Informasi Kontak',
                'content_type' => 'info',
                'content' => '<div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-building me-2"></i>Dinas Perumahan, Kawasan Permukiman dan Pertanahan Kota Padang</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong><i class="fas fa-map-marker-alt me-2 text-danger"></i>Alamat:</strong><br>
                                Jl. Bagindo Aziz Chan No. 1<br>
                                Padang, Sumatera Barat 25000</p>

                                <p><strong><i class="fas fa-phone me-2 text-success"></i>Telepon:</strong><br>
                                (0751) 123456 / 789012</p>

                                <p><strong><i class="fas fa-fax me-2"></i>Fax:</strong><br>
                                (0751) 345678</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong><i class="fas fa-envelope me-2 text-primary"></i>Email:</strong><br>
                                DISPORA@padang.go.id<br>
                                psu@padang.go.id</p>

                                <p><strong><i class="fas fa-clock me-2 text-warning"></i>Jam Pelayanan:</strong><br>
                                Senin - Kamis: 08.00 - 16.00 WIB<br>
                                Jumat: 08.00 - 16.30 WIB</p>

                                <p><strong><i class="fas fa-globe me-2 text-info"></i>Website:</strong><br>
                                <a href="https://DISPORA.padang.go.id" target="_blank">DISPORA.padang.go.id</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Catatan:</strong> Untuk informasi lebih lanjut mengenai program PSU atau konsultasi teknis,
                    silakan hubungi contact person di atas atau kunjungi langsung kantor kami pada jam kerja.
                </div>',
                'order' => 16,
                'is_active' => true,
                'is_published' => true,
            ],
        ];

        foreach ($contents as $content) {
            PsuContent::create($content);
        }
    }
}
