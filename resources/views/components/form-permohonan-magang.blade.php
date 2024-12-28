<div
    class="relative p-6 overflow-hidden text-gray-900 bg-white shadow-sm dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg h-max lg:sticky lg:top-12">

    <h2 class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        Pelayanan Jasa
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

    <form action="{{ route('permohonan-magang.store') }}" method="POST" class="grid grid-cols-1 gap-3"
        enctype="multipart/form-data">
        @csrf @method('post')

        <div>
            <x-input-label for="universitas">Jenis Layanan</x-input-label>
                <select name="universitas" id="universitas"
                    class="block w-full mt-1 truncate border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    <option value="">Pilih layanan...</option>
                    <option value="Layanan Klaim Asuransi">Layanan Klaim Asuransi</option>
                    <option value="Layanan Data">Layanan Data</option>
                    <option value="Layanan Pemetaan">Layanan Pemetaan</option>
                    <option value="Layanan Survey">Layanan Survey</option>
                </select>
            <x-input-error :messages="$errors->get('universitas')" class="mt-2" />
            </div>

        <div>
            <x-input-label for="fakultas">Fakultas</x-input-label>
            <x-text-input id="fakultas" class="block w-full mt-1" type="text" name="fakultas" :value="old('fakultas')"
                required />
            <x-input-error :messages="$errors->get('fakultas')" class="mt-2" />
        </div>

        <div>
                <x-input-label for="fakultas">No Whatsapp</x-input-label>
                <x-text-input id="fakultas" class="block w-full mt-1" type="text" name="fakultas" :value="$is_edit ? old('fakultas', $permohonan->fakultas) : old('fakultas')"
                    required />
                <x-input-error :messages="$errors->get('fakultas')" class="mt-2" />
        </div>

        <div>
                <x-input-label for="prodi">Full Name</x-input-label>
                <x-text-input id="prodi" class="block w-full mt-1" type="text" name="prodi" :value="$is_edit ? old('prodi', $permohonan->prodi) : old('prodi')"
                    required />
                <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
            </div>

        <!-- <label for="syarat" class="mt-5 mb-3">
            <input type="checkbox" name="syarat" id="syarat" class="rounded" required>
            Saya menyetujui <a href="" class="underline hover:text-green-500">syarat dan
                ketentuan</a> yang berlaku
        </label> -->

        <button type="submit" class="px-3 leading-10 text-white bg-green-600 rounded hover:bg-green-500">Kirim</button>
    </form>
</div>
