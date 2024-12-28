<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            <a href="/layanan"
                class="w-[40px] h-[40px] grid md:hidden place-content-center text-gray-400 hover:text-green-600 rounded border border-gray-400 dark:border-gray-600 mr-3">
                <i class="text-sm fas fa-angle-left"></i>
            </a>
            <span class="hidden md:inline">
                <a href="/layanan" class="text-gray-400 hover:text-green-600">Layanan</a>
                <i class="mx-2 text-sm fa-solid fa-angle-right"></i>
            </span>
            <span>Permohonan Kunjungan</span>
        </h2>
    </x-slot>

    <div class="py-3 lg:py-6">
        <div class="grid grid-cols-1 mx-auto gap-y-3 lg:gap-x-3 lg:grid-cols-3 max-w-7xl sm:px-6 lg:px-8">
            @include('components.form-klaim-asuransi')
            @include('components.table-klaim-asuransi', ['permohonan' => $permohonan])
        </div>
    </div>
</x-app-layout>
