<div
    class="relative p-6 overflow-hidden text-gray-900 bg-white shadow-sm dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg h-max lg:sticky lg:top-12">

    <h2 class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Klaim Asuransi
    </h2>

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

    @if ($errors->any())
        <div class="px-4 py-2 mb-4 text-red-900 bg-red-200 rounded shadow">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('klaim-asuransi.store') }}" method="POST" class="grid grid-cols-1 gap-3"
        enctype="multipart/form-data">
        @csrf @method('post')

        <div>
            <x-input-label for="perusahaan">Nama Instansi</x-input-label>
            <x-text-input id="perusahaan" class="block w-full mt-1" type="text" name="perusahaan" :value="old('perusahaan')"
                required />
            <x-input-error :messages="$errors->get('perusahaan')" class="mt-2" />
        </div>
        
        <div>
        <x-input-label class="w-full" for="longitude">Nama Lengkap</x-input-label>
                <x-text-input id="longitude" class="block w-full mt-1" type="text" name="longitude"
                    :value="old('longitude')" required />
                <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="lokasi">Nomor Whatsapp</x-input-label>
            <x-text-input id="lokasi" class="block w-full mt-1" type="text" name="lokasi" :value="old('lokasi')"
                required />
            <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
        </div>

        <div class="flex gap-3">
            <div class="relative flex-1">
                <x-input-label class="w-full" for="latitude">Jumlah Rombongan</x-input-label>
                <x-text-input id="latitude" class="block w-full mt-1" type="text" name="latitude"
                    :value="old('latitude')" required />
                <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
            </div>

            <div class="relative flex-1">
            <x-input-label class="w-full" for="tanggal">Rencana Tanggal Kunjungan</x-input-label>
            <x-text-input id="tanggal" class="block w-full mt-1" type="date" name="tanggal"
                :value="old('tanggal')" placeholder="Tanggal Kejadian" required />
            <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
               
            </div>
        </div>

        <button type="submit" class="px-3 leading-10 text-white bg-green-600 rounded hover:bg-green-500">Kirim</button>
    </form>
</div>
