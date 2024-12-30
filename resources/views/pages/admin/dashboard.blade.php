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
            <h3 class="text-xl font-bold dark:text-gray-400">Pelayanan Jasa</h3>
            <span>
                <span class="text-3xl font-bold">{{ $magang->count() }}</span> permohonan
            </span>
        </div>
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Permohonan Kunjungan</h3>
            <span>
                <span class="text-3xl font-bold">{{ $asuransi->count() }}</span> permohonan
            </span>
        </div>
        <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Rating Megabot</h3>
            @csrf
            @foreach ($rating as $star)
            @if($star->value == 5)
            <div class="rating">
                <span>{{ $star->total }}</span>
                <span data-value="5" class="star">&#9733;</span>
                <span data-value="4" class="star">&#9733;</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 4)
            <div class="rating">
                <span>{{ $star->total }}</span>
                <span data-value="4" class="star">&#9733;</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 3)
            <div class="rating">
                <span>{{ $star->total }}</span>
                <span data-value="3" class="star">&#9733;</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 2)
            <div class="rating">
                <span>{{ $star->total }}</span>
                <span data-value="2" class="star">&#9733;</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @elseif($star->value == 1)
            <div class="rating">
                <span>{{ $star->total }}</span>
                <span data-value="1" class="star">&#9733;</span>
            </div>
            @endif


            @endforeach

            <span><span class="text-3xl font-bold">
                    @foreach ($bintang as $student)
                    {{ $student->percentage }}
                </span>/5 from {{ $student->user }} reviewer
                @endforeach
            </span>
        </div>
        {{-- <div class="p-5 bg-white rounded-md shadow dark:bg-gray-700 dark:text-white">
            <h3 class="text-xl font-bold dark:text-gray-400">Peta Sebaran</h3>
            <span>
                <span class="text-3xl font-bold">0</span> permohonan
            </span>
        </div> --}}
    </div>

    <!-- <h3 class="text-xl font-bold dark:text-white">Permohonan Terbaru</h3> -->
</x-admin-layout>