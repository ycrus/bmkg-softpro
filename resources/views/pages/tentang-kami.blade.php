@extends('layouts.main')

@section('content')
    <div class="container min-h-screen mx-auto mt-[200px]">
        <h1 class="mb-4 text-3xl font-bold">Stasiun Geofisika Yogyakarta</h1>
        <p class="text-5xl italic text-gray-400 font-['Antic_Didone'] mb-10">Pelayanan informasi Geofisika secara luas,
            cepat,
            tepat, akurat dan mudah
            dipahami</p>

        <div class="flex flex-col gap-5 lg:gap-10 lg:flex-row">
            <img src="{{ asset('/images/slides/0.jpeg') }}" alt="Stasiun Geofisika Yogyakarta"
                class="object-cover max-w-lg rounded-lg aspect-square">

            <div>
                <h3 class="mb-3 text-xl font-bold">Visi</h3>
                <p class="mb-5">Mewujudkan BMKG yang handal, tanggap dan mampu dalam rangka mendukung keselamatan masyarakat serta keberhasilan pembangunan nasional dan berperan aktif di tingkat internasional.</p>

                <h3 class="mt-10 mb-3 text-xl font-bold">Misi</h3>
                <p class="mb-5">1. Mengamati dan memahami fenomena meteorologi, klimatologi, kualitas udara, dan geofisika.</p>
                <p class="mb-5">2. Menyediakan data, informasi, dan jasa meteorologi, klimatologi, kualitas udara dan geofisika yang handal dan terpercaya.</p>
                <p class="mb-5">3. Mengkoordinasikan dan memfasilitasi kegiatan di bidang meteorologi, klimatologi, kualitas udara dan geofisika.</p>

            </div>
        </div>
    </div>
@endsection
