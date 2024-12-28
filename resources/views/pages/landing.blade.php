@extends('layouts.main')

@php
$layanan = [
[
'images' => '/images/alat.png',
'nama' => 'Sewa Alat',
'url' => '/layanan/sewa-alat',
'deskripsi' => 'Sewa alat di Stasiun Geofisika Sleman memungkinkan pengguna atau pelanggan untuk
memanfaatkan berbagai peralatan canggih yang tersedia sesuai kebutuhan mereka. Proses peminjaman
alat dilakukan dengan mudah dan efisien, sesuai dengan tarif yang telah ditetapkan oleh pihak stasiun. ',
],
[
'images' => '/images/layanan.jpg',
'nama' => 'Pelayanan Jasa',
'url' => '/layanan/pelayanan-jasa',
'deskripsi' => 'Stasiun Geofisika juga menyediakan layanan informasi terkait gempa bumi, tsunami, dan listrik udara.
Informasi ini dapat dimanfaatkan untuk berbagai keperluan, termasuk klaim asuransi. Semua tarif layanan telah disesuaikan
dengan peraturan perundang-undangan yang berlaku, memastikan transparansi dan kepatuhan terhadap hukum.',
],
[
'images' => '/images/kunjungan.jpg',
'nama' => 'Permohonan Kunjungan',
'url' => '/layanan/permohonan-kunjungan',
'deskripsi' => 'Stasiun Geofisika Sleman menerima kunjungan edukatif dari berbagai tingkat pendidikan, mulai dari Taman Kanak-Kanak (TK) hingga perguruan tinggi.
Selain itu, Stasiun Geofisika Sleman juga menyediakan layanan BGTS (BMKG Goes to School). ',
],
];

$berita = [
[
'images' => '/images/jurnal.jpg',
'dateCreated' => '2024-12-05 22:08:48',
'title' => 'Jurnal Stasiun Geofisika Sleman',
'excerpt' => 'Jurnal Stasiun Geofisika Sleman adalah platform yang dirancang untuk mengembangkan kemampuan menulis seluruh pegawai, serta mahasiswa yang melakukan kerja praktik atau magang. ',
],
[
'images' => '/images/tabloid.png',
'dateCreated' => '2024-12-1 22:08:48',
'title' => 'Tabloid Bulanan Informasi geofisika',
'excerpt' => 'Informasi geofisika mencakup laporan kegiatan Stasiun Geofisika setiap bulannya. Laporan ini meliputi berbagai aktivitas, seperti pemantauan gempa bumi, listrik udara, serta berbagai kegiatan lain yang dilakukan dalam kurun waktu satu bulan.',
],
[
'images' => '/images/aktivitas.png',
'dateCreated' => '2024-12-20 22:08:48',
'title' => 'Aktivitas Gempa Bumi',
'excerpt' => 'Informasi aktivitas gempabumi dalam kurun waktu 1 minggu. Berisi jumlah kejadian gempa, peta seismisitas dan statistikanya. Informasi ini akan selalu di update di media sosial stasiun Geofisika Sleman.',
],
[
'images' => '/images/BGTS.jpeg',
'dateCreated' => '2024-12-8 22:08:48',
'title' => 'BMKG goes to School',
'excerpt' => 'Update kegiatan Tim Mitigasi, contoh berikut adalah kegiatan BGTS (BMKG goes to School). Kegiatan meliputi sosialisasi materi gempabumi tsunami, quiz dan simulasi evakuasi mandiri saat terjadi gempabumi di sekolah',
],
];
@endphp

@section('content')
<div class="landing-page dark:bg-gray-800 dark:text-white">
    <header
        class="h-[calc(70vh+200px)] lg:h-[calc(100vh+200px)] bg-[linear-gradient(rgba(0,0,0,0.4),rgba(10,30,0,0.6)),url('/public/images/slides/0.jpeg')] bg-cover bg-no-repeat bg-fixed bg-center">
        <div class="container grid h-full px-4 mx-auto text-center text-white lg:h-screen place-content-center">
            {{-- Eyebrow --}}
            <a href="https://apps.bmkg.go.id/" target="__blank"
                class="px-5 py-2 mx-auto text-sm transition duration-300 rounded-full bg-white/30 hover:bg-white hover:text-gray-700 hover:-translate-y-1 backdrop-blur max-w-max mb-7">
                <i class="mr-2 text-green-500 fa-solid fa-bullhorn"></i> Download aplikasi BMKG sekarang
                <i class="fa-solid fa-angle-right"></i>
            </a>

            {{-- Hero title --}}
            <h2 class="max-w-5xl text-3xl font-black md:text-6xl">Pelayanan informasi Geofisika secara luas,
                cepat, tepat, akurat dan mudah dipahami</h2>
        </div>
    </header>

    <section id="layanan" class="layanan -mt-[240px] pt-[100px]">
        <div class="container px-4 mx-auto">
            <h3 class="mb-3 text-3xl font-bold text-white">Layanan kami</h3>
            <div
                class="grid grid-cols-1 p-5 rounded-lg md:grid-cols-2 lg:grid-cols-3 gap-x-3 gap-y-5 bg-gray-100/50 dark:bg-gray-700/50 backdrop-blur-lg">
                {{-- @dd($layanan[0]['images']) --}}
                @foreach ($layanan as $item)
                <a href="{{ $item['url'] }}"
                    class="overflow-hidden transition duration-200 bg-white rounded-md shadow-lg dark:bg-gray-700 hover:-translate-y-2 hover:shadow-xl">
                    <img src="{{ asset($item['images']) }}" alt="{{ $item['nama'] }}" height="200">
                    <div class="px-4 py-3 text">
                        <h4 class="text-xl font-bold">
                            {{ $item['nama'] }}
                        </h4>
                        <p class="hidden md:inline-block dark:text-gray-400">{{ $item['deskripsi'] }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <section id="latestNews" class="mt-10 latest-news">
        <div class="container px-4 mx-auto">
            <h3 class="mb-3 text-3xl font-bold">Berita Terkini</h3>
            <div
                class="grid grid-cols-1 p-5 rounded-lg md:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-5 bg-gray-100/50 dark:bg-gray-700/50 backdrop-blur-lg">
                @foreach ($berita as $artikel)
                <div class="overflow-hidden bg-white rounded-md shadow-lg dark:bg-gray-700">
                    <a href="/berita/{{ Str::kebab($artikel['title']) }}"><img src="{{ asset($artikel['images']) }}"
                            class="w-full h-[200px] object-cover" alt="Title"></a>

                    <div class="px-4 py-3 text">
                        <h4 class="text-xl font-bold">
                            <a href="/berita/{{ Str::kebab($artikel['title']) }}"
                                class="overflow-hidden transition duration-200 hover:visited:text-green-700 dark:hover:visited:text-green-600">
                                {{ $artikel['title'] }}
                            </a>
                        </h4>
                        <small
                            class="text-gray-400 dark:text-gray-500">{{ \Carbon\Carbon::parse($artikel['dateCreated'])->isoFormat('dddd, DD MMMM YYYY') }}</small>
                        <p class="hidden md:inline-block dark:text-gray-400">{{ $artikel['excerpt'] }}</p>
                    </div>

                    {{-- @dd(date('Y-m-d H:i:s')) --}}
                </div>
                @endforeach
            </div>

            <a href="/berita"
                class="block px-10 py-3 mx-auto mt-5 text-green-700 transition duration-200 border border-green-700 rounded-full max-w-max hover:bg-green-700 hover:text-white">
                Berita lainnya
            </a>
        </div>
    </section>

    <div class="container mx-auto mt-10">
        <hr class="dark:border-white/20">
    </div>
</div>
@endsection