<?php

namespace Database\Seeders;

use App\Models\RtlhContent;
use Illuminate\Database\Seeder;

class RtlhContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // 1. Pengertian RTLH
            [
                'section_key' => 'pengertian',
                'section_title' => 'Pengertian RTLH',
                'content_type' => 'text',
                'content' => '<p><strong>Rumah Tidak Layak Huni (RTLH)</strong> adalah rumah yang tidak memenuhi syarat kesehatan, keselamatan, dan kenyamanan sebagai tempat tinggal. RTLH umumnya memiliki kondisi fisik bangunan yang rusak atau tidak memadai.</p>
                <p>Berdasarkan Peraturan Menteri PUPR, kriteria RTLH meliputi kondisi atap, dinding, lantai, ventilasi, pencahayaan, serta ketersediaan air bersih dan sanitasi yang tidak memenuhi standar kelayakan.</p>',
                'order' => 1,
                'is_active' => true,
            ],

            // 2. Tujuan Program
            [
                'section_key' => 'tujuan',
                'section_title' => 'Tujuan Program',
                'content_type' => 'text',
                'content' => '<p>Program Perbaikan RTLH bertujuan untuk:</p>
                <ul>
                    <li>Meningkatkan kualitas hunian masyarakat berpenghasilan rendah</li>
                    <li>Mewujudkan rumah yang layak huni, sehat, aman, dan nyaman</li>
                    <li>Mengurangi angka kemiskinan melalui perbaikan kondisi perumahan</li>
                    <li>Meningkatkan derajat kesehatan masyarakat</li>
                    <li>Mewujudkan lingkungan permukiman yang tertata dan berkelanjutan</li>
                </ul>',
                'order' => 2,
                'is_active' => true,
            ],

            // 3. Dasar Hukum
            [
                'section_key' => 'dasar_hukum',
                'section_title' => 'Dasar Hukum',
                'content_type' => 'text',
                'content' => '<p>Program Perbaikan RTLH didasarkan pada:</p>
                <ol>
                    <li>Undang-Undang Nomor 1 Tahun 2011 tentang Perumahan dan Kawasan Permukiman</li>
                    <li>Peraturan Pemerintah Nomor 14 Tahun 2016 tentang Penyelenggaraan Perumahan dan Kawasan Permukiman</li>
                    <li>Peraturan Menteri PUPR tentang Bantuan Stimulan Perumahan Swadaya</li>
                    <li>Peraturan Daerah Kota Padang tentang Perumahan dan Permukiman</li>
                </ol>',
                'order' => 3,
                'is_active' => true,
            ],

            // 4. Kriteria RTLH
            [
                'section_key' => 'kriteria',
                'section_title' => 'Kriteria Rumah Tidak Layak Huni',
                'content_type' => 'text',
                'content' => '<p>Sebuah rumah dikategorikan sebagai RTLH jika memenuhi salah satu atau lebih kriteria berikut:</p>
                <ul>
                    <li><strong>Atap:</strong> Bocor, berlubang, atau terbuat dari bahan tidak layak</li>
                    <li><strong>Dinding:</strong> Retak, roboh sebagian, atau terbuat dari bahan tidak permanen</li>
                    <li><strong>Lantai:</strong> Masih tanah, rusak, atau tidak rata</li>
                    <li><strong>Ventilasi:</strong> Tidak memadai (kurang dari 10% luas lantai)</li>
                    <li><strong>Pencahayaan:</strong> Tidak cukup cahaya alami</li>
                    <li><strong>Sanitasi:</strong> Tidak memiliki MCK atau MCK tidak layak</li>
                    <li><strong>Air Bersih:</strong> Tidak memiliki akses air bersih</li>
                </ul>',
                'order' => 4,
                'is_active' => true,
            ],

            // 5. Persyaratan Penerima
            [
                'section_key' => 'persyaratan',
                'section_title' => 'Persyaratan Penerima Bantuan',
                'content_type' => 'text',
                'content' => '<p>Untuk dapat menerima bantuan perbaikan RTLH, pemohon harus memenuhi persyaratan sebagai berikut:</p>
                <ul>
                    <li>Warga Kota Padang yang berdomisili tetap (dibuktikan dengan KTP)</li>
                    <li>Memiliki rumah dengan kondisi tidak layak huni</li>
                    <li>Tergolong Masyarakat Berpenghasilan Rendah (MBR)</li>
                    <li>Memiliki Kartu Keluarga (KK) yang masih berlaku</li>
                    <li>Memiliki bukti kepemilikan tanah/rumah (sertifikat/girik/surat keterangan kepemilikan)</li>
                    <li>Bersedia menyediakan swadaya untuk mendukung perbaikan rumah</li>
                    <li>Belum pernah menerima bantuan serupa dari pemerintah</li>
                </ul>',
                'order' => 5,
                'is_active' => true,
            ],

            // 6. Dokumen yang Harus Disiapkan
            [
                'section_key' => 'dokumen',
                'section_title' => 'Dokumen yang Harus Disiapkan',
                'content_type' => 'text',
                'content' => '<p>Calon penerima bantuan harus menyiapkan dokumen berikut:</p>
                <ol>
                    <li>Fotocopy KTP pemohon yang masih berlaku</li>
                    <li>Fotocopy Kartu Keluarga (KK)</li>
                    <li>Fotocopy bukti kepemilikan tanah/rumah</li>
                    <li>Surat Keterangan Tidak Mampu (SKTM) dari Kelurahan</li>
                    <li>Surat pernyataan kesediaan swadaya bermaterai</li>
                    <li>Foto kondisi rumah (tampak depan, dalam, dan bagian yang rusak)</li>
                    <li>Formulir pengajuan yang telah diisi lengkap</li>
                </ol>
                <p class="text-danger"><em>*Semua dokumen harus asli dan fotocopy untuk keperluan verifikasi</em></p>',
                'order' => 6,
                'is_active' => true,
            ],

            // 7. Cara Pengajuan
            [
                'section_key' => 'cara_pengajuan',
                'section_title' => 'Alur Pengajuan Bantuan',
                'content_type' => 'text',
                'content' => '<p>Berikut adalah tahapan pengajuan bantuan perbaikan RTLH:</p>
                <ol>
                    <li><strong>Pendaftaran:</strong> Masyarakat mendaftar melalui RT/RW setempat atau langsung ke Kelurahan</li>
                    <li><strong>Verifikasi Data:</strong> Tim dari Kelurahan melakukan verifikasi dokumen dan kondisi rumah</li>
                    <li><strong>Survei Lapangan:</strong> Tim teknis dari Dinas Perkim melakukan survei dan penilaian kondisi rumah</li>
                    <li><strong>Penetapan Penerima:</strong> Hasil survei dibahas dalam musyawarah untuk penetapan penerima bantuan</li>
                    <li><strong>Pelaksanaan Perbaikan:</strong> Penerima bantuan melakukan perbaikan dengan pendampingan teknis</li>
                    <li><strong>Monitoring:</strong> Tim teknis melakukan monitoring pelaksanaan pekerjaan</li>
                    <li><strong>Serah Terima:</strong> Pekerjaan yang telah selesai dilakukan serah terima dan dokumentasi</li>
                </ol>',
                'order' => 7,
                'is_active' => true,
            ],

            // 8. Contact Person
            [
                'section_key' => 'contact_person',
                'section_title' => 'Contact Person & Tempat Pengajuan',
                'content_type' => 'text',
                'content' => '<div class="card border-primary">
                    <div class="card-body">
                        <h5>Dinas Perumahan, Kawasan Permukiman dan Pertanahan Kota Padang</h5>
                        <p><strong>Alamat:</strong><br>Jl. Bagindo Aziz Chan No. 1, Padang, Sumatera Barat</p>
                        <p><strong>Telepon:</strong> (0751) 123456</p>
                        <p><strong>Email:</strong> perkim@padang.go.id</p>
                        <p><strong>Jam Pelayanan:</strong><br>Senin - Jumat: 08.00 - 16.00 WIB</p>
                    </div>
                </div>
                <p class="mt-3"><em>Untuk informasi lebih lanjut, silakan hubungi contact person di atas atau datang langsung ke kantor Dinas Perkim Kota Padang.</em></p>',
                'order' => 8,
                'is_active' => true,
            ],

            // 9. Download Files
            [
                'section_key' => 'download',
                'section_title' => 'Download Dokumen',
                'content_type' => 'download',
                'data' => [
                    [
                        'title' => 'Formulir Pengajuan RTLH',
                        'file' => 'formulir_rtlh.pdf',
                        'size' => '250 KB',
                        'description' => 'Form pengajuan bantuan perbaikan RTLH'
                    ],
                    [
                        'title' => 'Panduan Teknis Perbaikan RTLH',
                        'file' => 'panduan_teknis_rtlh.pdf',
                        'size' => '1.5 MB',
                        'description' => 'Panduan lengkap pelaksanaan perbaikan RTLH'
                    ],
                    [
                        'title' => 'Surat Pernyataan Swadaya',
                        'file' => 'surat_pernyataan_swadaya.pdf',
                        'size' => '150 KB',
                        'description' => 'Template surat pernyataan kesediaan swadaya'
                    ],
                    [
                        'title' => 'Juknis Program RTLH 2024',
                        'file' => 'juknis_rtlh_2024.pdf',
                        'size' => '2.8 MB',
                        'description' => 'Petunjuk teknis program RTLH tahun 2024'
                    ]
                ],
                'order' => 9,
                'is_active' => true,
            ],

            // 10. Gallery
            [
                'section_key' => 'galeri',
                'section_title' => 'Galeri Dokumentasi',
                'content_type' => 'gallery',
                'data' => [
                    [
                        'nama' => 'Bapak Ahmad Yani',
                        'lokasi' => 'Kelurahan Air Tawar Barat, Kecamatan Padang Utara',
                        'tahun' => '2024',
                        'foto_sebelum' => 'galeri/before_1.jpg',
                        'foto_sesudah' => 'galeri/after_1.jpg',
                        'testimoni' => 'Alhamdulillah, rumah sekarang sudah layak dan aman untuk keluarga. Terima kasih Dinas Perkim Kota Padang.'
                    ],
                    [
                        'nama' => 'Ibu Siti Nurhaliza',
                        'lokasi' => 'Kelurahan Lubuk Buaya, Kecamatan Koto Tangah',
                        'tahun' => '2024',
                        'foto_sebelum' => 'galeri/before_2.jpg',
                        'foto_sesudah' => 'galeri/after_2.jpg',
                        'testimoni' => 'Sangat bersyukur mendapat bantuan ini. Sekarang anak-anak bisa tidur dengan nyaman dan aman.'
                    ],
                    [
                        'nama' => 'Bapak Rizki Pratama',
                        'lokasi' => 'Kelurahan Olo, Kecamatan Padang Barat',
                        'tahun' => '2023',
                        'foto_sebelum' => 'galeri/before_3.jpg',
                        'foto_sesudah' => 'galeri/after_3.jpg',
                        'testimoni' => 'Program yang sangat membantu masyarakat kurang mampu. Semoga terus berlanjut untuk membantu yang lain.'
                    ]
                ],
                'order' => 10,
                'is_active' => true,
            ],

            // 11. FAQ
            [
                'section_key' => 'faq',
                'section_title' => 'Pertanyaan yang Sering Diajukan (FAQ)',
                'content_type' => 'faq',
                'content' => '<div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Berapa nilai bantuan yang diberikan untuk perbaikan RTLH?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Nilai bantuan disesuaikan dengan tingkat kerusakan rumah, mulai dari Rp 15 juta hingga Rp 25 juta per unit rumah. Bantuan diberikan dalam bentuk material bangunan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Apakah harus ada swadaya dari penerima bantuan?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, penerima bantuan diharapkan menyediakan swadaya berupa tenaga kerja dan sebagian material pendukung untuk memaksimalkan hasil perbaikan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Berapa lama proses pengajuan hingga pencairan bantuan?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Proses dari pengajuan hingga penetapan penerima memakan waktu sekitar 2-3 bulan, tergantung kelengkapan dokumen dan hasil verifikasi lapangan.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Apakah penyewa rumah bisa mengajukan bantuan RTLH?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tidak, bantuan RTLH hanya diberikan kepada pemilik rumah yang memiliki bukti kepemilikan yang sah.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                Apakah ada kuota penerima bantuan setiap tahunnya?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, kuota penerima bantuan disesuaikan dengan anggaran yang tersedia setiap tahun anggaran. Oleh karena itu, pendaftaran dilakukan secara bertahap dan selektif.
                            </div>
                        </div>
                    </div>
                </div>',
                'order' => 11,
                'is_active' => true,
            ],
        ];

        foreach ($contents as $content) {
            RtlhContent::create($content);
        }
    }
}