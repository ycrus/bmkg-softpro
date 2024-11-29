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
            'nama' => 'Permohonan Magang',
            'url' => '/layanan/permohonan-magang',
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

@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Layanan
        </h2>
    </x-slot>

    <div class="py-3 lg:py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="px-4 py-2 mb-4 text-green-900 bg-green-300 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="px-4 py-2 mb-4 text-red-900 bg-red-200 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-3 text-3xl font-bold">Layanan kami</h3>
                    <div
                        class="grid grid-cols-2 p-5 rounded-lg lg:grid-cols-3 gap-x-3 gap-y-5 bg-gray-100/50 dark:bg-gray-700/50 backdrop-blur-lg">
                        {{-- @dd($layanan[0]['images']) --}}
                        @foreach ($layanan as $item)
                            <a href="{{ $item['url'] }}"
                                class="overflow-hidden transition duration-200 bg-white rounded-md shadow-lg dark:bg-gray-700 hover:-translate-y-2 hover:shadow-xl hover:shadow-green-500/20 hover:ring-2 ring-green-500">
                                <img src="{{ asset($item['images']) }}" alt="{{ $item['nama'] }}" height="200">
                                <div class="px-4 py-3 text">
                                    <h4 class="text-xl font-bold">
                                        {{ $item['nama'] }}
                                    </h4>
                                    <p class="hidden md:inline-block dark:text-gray-400">
                                        {{ $item['deskripsi'] }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
