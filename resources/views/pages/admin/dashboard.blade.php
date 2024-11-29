<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="grid grid-cols-2 gap-3 mb-4 lg:grid-cols-3">
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Sewa Alat</h3>
            <span>
                <span class="text-3xl font-bold">{{ $sewa_alat->count() }}</span> permohonan
            </span>
        </div>
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Magang</h3>
            <span>
                <span class="text-3xl font-bold">{{ $magang->count() }}</span> permohonan
            </span>
        </div>
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Asuransi</h3>
            <span>
                <span class="text-3xl font-bold">{{ $asuransi->count() }}</span> permohonan
            </span>
        </div>
        {{-- <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Peta Sebaran</h3>
            <span>
                <span class="text-3xl font-bold">0</span> permohonan
            </span>
        </div> --}}
    </div>

    <h3 class="text-xl font-bold dark:text-white">Permohonan Terbaru</h3>
    @include('components.table-dashboard-admin', ['permohonan' => $permohonan])
</x-admin-layout>
