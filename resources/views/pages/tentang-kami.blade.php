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
                <p class="mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde sapiente vel eveniet! Qui
                    similique
                    adipisci facere? Alias ut dignissimos cupiditate praesentium. Earum, temporibus. Tenetur iusto soluta
                    mollitia pariatur maiores! Temporibus quis, impedit non laudantium, minus voluptate provident doloremque
                    quibusdam maiores sequi quas tempore ducimus dignissimos quidem! Iste officiis consequatur quis aperiam
                    fuga quaerat sint, aliquam unde accusamus qui vel quidem ab accusantium dolore veritatis doloribus
                    exercitationem cum delectus ducimus voluptatum maiores voluptate quos. Id, eveniet obcaecati quidem
                    dolorem dolores quaerat. Facere illo eligendi fugit esse a maiores, at cum hic quae doloremque ad
                    accusamus accusantium consequuntur error ipsa molestias voluptates.</p>

                <h3 class="mt-10 mb-3 text-xl font-bold">Misi</h3>
                <p class="mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde sapiente vel eveniet! Qui
                    similique
                    adipisci facere? Alias ut dignissimos cupiditate praesentium. Earum, temporibus. Tenetur iusto soluta
                    mollitia pariatur maiores! Temporibus quis, impedit non laudantium, minus voluptate provident doloremque
                    quibusdam maiores sequi quas tempore ducimus dignissimos quidem! Iste officiis consequatur quis aperiam
                    fuga quaerat sint, aliquam unde accusamus qui vel quidem ab accusantium dolore veritatis doloribus
                    exercitationem cum delectus ducimus voluptatum maiores voluptate quos. Id, eveniet obcaecati quidem
                    dolorem dolores quaerat. Facere illo eligendi fugit esse a maiores, at cum hic quae doloremque ad
                    accusamus accusantium consequuntur error ipsa molestias voluptates.</p>
            </div>
        </div>
    </div>
@endsection
