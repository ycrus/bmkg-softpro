<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="/layanan" class="text-gray-400 hover:text-green-600">Layanan</a>
            <i class="fa-solid fa-angle-right mx-2 text-sm"></i> <span>Sewa Alat</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2
                        class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Alat tersedia
                    </h2>
                    {{-- @dd($alat) --}}
                    @if ($alats->isEmpty())
                        <div class="flex flex-col items-center justify-center mx-auto h-[70vh]">
                            <img src="{{ asset('images/alat-tidak-tersedia.svg') }}" alt="" width="200">
                            <p>Tidak ada alat tersedia</p>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                        @foreach ($alats as $a)
                            <a href="{{ route('sewa-alat.create', $a->slug) }}"
                                class="rounded-md bg-white dark:bg-gray-700 overflow-hidden shadow-lg hover:shadow-green-500/20 hover:ring-2 ring-green-500 transition duration-200">
                                <img src="{{ asset('/images/layanan-sewa-alat.svg') }}" alt="" height="100">
                                <div class="text px-4 py-3">
                                    <h4 class="font-bold text-lg">
                                        {{ $a->nama }}
                                    </h4>
                                    <p class="text-lg text-green-500">
                                        <i class="fa-solid fa-tag"></i>
                                        {{ 'Rp' . number_format((float) $a->harga, 0, ',', '.') }}
                                    </p>
                                    <p class="text-lg opacity-50">{{ $a->deskripsi }}</p>
                                    <p class="text-lg opacity-50">Tersedia: {{ $a->unit }} unit</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
