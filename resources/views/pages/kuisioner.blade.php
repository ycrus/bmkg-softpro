@extends('layouts.main')

@section('content')
    <div class="container min-h-screen mx-auto pt-[100px] px-5 lg:px-0">
        <h1 class="mb-10 text-3xl font-bold">Hubungi Kami</h1>
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
            <div class="flex map">
                <iframe class="flex-1" title="BMKG Geofisika Sleman"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15811.000139468904!2d110.2945792!3d-7.8162625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af830003ce1ab%3A0xc798f492aac6a387!2sStasiun%20Geofisika%20Yogyakarta!5e0!3m2!1sen!2sid!4v1705299927452!5m2!1sen!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="flex flex-col gap-10">
                <div>
                    <h4 class="mb-2 text-xl font-bold">Alamat</h4>
                    <div class="flex flex-col gap-5">
                        <p class="text-gray-400">
                            Stasiun Geofisika Sleman <br>
                            Jl. Wates KM 7 Jitengan, Balecatur, Gamping Sleman 55294</p>

                        <p class="text-gray-400">
                            (0274) 6498383 <br>
                            089612643203 <br>
                            stageof.yogya@bmkg.go.id</p>
                    </div>
                </div>

                <!-- <div>
                    <h4 class="mb-2 text-xl font-bold">Konsultasi (WA)</h4>
                    <img src="{{ asset('/images/wa-link.png') }}" alt="WA Barcode"
                        class="w-full max-w-[300px] aspect-square">
                </div> -->
            </div>
        </div>
    </div>
@endsection
