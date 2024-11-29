@extends('layouts.main')

@php
    $layanan = [
        [
            'images' => '/images/layanan-sewa-alat.svg',
            'nama' => 'Sewa Alat',
            'url' => '/layanan/sewa-alat',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/layanan-konsultasi.svg',
            'nama' => 'Konsultasi',
            'url' => '/layanan/konsultasi',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/layanan-klaim-asuransi.svg',
            'nama' => 'Klaim Asuransi',
            'url' => '/layanan/klaim-asuransi',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        // [
        //     'images' => '/images/layanan-peta-sebaran.svg',
        //     'nama' => 'Peta Sebaran',
        //     'url' => '/layanan/peta-sebaran',
        //     'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        // ],
    ];

    $berita = [
        [
            'images' => '/images/slides/1.jpg',
            'dateCreated' => '2023-12-08 22:08:48',
            'title' => 'Lorem ipsum dolor sit, amet consectetur adipisicing.',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/slides/2.jpg',
            'dateCreated' => '2023-12-08 22:08:48',
            'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/slides/3.jpg',
            'dateCreated' => '2023-12-08 22:08:48',
            'title' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
        ],
        [
            'images' => '/images/slides/4.jpg',
            'dateCreated' => '2023-12-08 22:08:48',
            'title' => 'Lorem ipsum, dolor sit amet consectetur adipisicing.',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sapiente recusandae mollitia omnis alias possimus officia.',
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
                                    class="text-gray-400 dark:text-gray-500">{{ \Carbon\Carbon::parse($artikel['dateCreated'])->isoFormat('dddd, d MMMM Y') }}</small>
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
