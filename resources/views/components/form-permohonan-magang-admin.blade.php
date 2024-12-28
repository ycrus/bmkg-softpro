<div class="relative text-gray-900 bg-white shadow-sm dark:text-gray-100 dark:bg-gray-800 h-max lg:sticky lg:top-12">

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

    <form
        action="{{ $is_edit ? route('admin.permohonan-magang.update', ['permohonan_magang' => $permohonan]) : route('admin.pelayanan-jasa.store') }}"
        method="POST" class="grid max-w-md grid-cols-1 gap-3" enctype="multipart/form-data">
        @csrf
        @if ($is_edit)
        @method('put')
        @else
        @method('post')
        @endif

        <div class="flex flex-col gap-3">
            <div>
                <x-input-label for="universitas">Jenis Layanan</x-input-label>
                <!-- <x-text-input id="universitas" class="block w-full mt-1" type="text" name="universitas" :value="$is_edit ? old('universitas', $permohonan->universitas) : old('universitas')"
                    required /> -->
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
            <!-- <div>
                <x-input-label for="keterangan">Keterangan</x-input-label>
                <textarea id="keterangan"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    rows="3" name="keterangan" :value="old('keterangan')"></textarea>
                <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
            </div> -->

            <!-- <div>
                <x-input-label for="prodi">Keterangan</x-input-label>
                <textarea id="prodi"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    name="prodi" :value="$is_edit ? old('prodi', $permohonan->prodi) : old('prodi')"></textarea>
                <x-input-error :messages="$errors->get('prodi')" class="mt-2" />
            </div> -->

            <!-- <div class="flex gap-3">
                <div class="relative flex-1">
                    <x-input-label class="w-full" for="tanggal_mulai">Tanggal Mulai</x-input-label>
                    <x-text-input id="tanggal_mulai" class="block w-full mt-1" type="date" name="tanggal_mulai"
                        :value="$is_edit ? old('tanggal_mulai', $permohonan->tanggal_mulai) : old('tanggal_mulai')" placeholder="Dari tanggal" required />
                    <x-input-error :messages="$errors->get('tanggal_mulai')" class="mt-2" />
                </div>
    
                <div class="relative flex-1">
                    <x-input-label class="w-full" for="tanggal_selesai">Tanggal Selesai</x-input-label>
                    <x-text-input id="tanggal_selesai" class="block w-full mt-1" type="date" name="tanggal_selesai"
                        :value="$is_edit ? old('tanggal_selesai', $permohonan->tanggal_selesai) : old('tanggal_selesai')" placeholder="Hingga tanggal" required />
                    <x-input-error :messages="$errors->get('tanggal_selesai')" class="mt-2" />
                </div>
            </div> -->
            @if ($is_edit)
            <div>
                <x-input-label for="status">Status</x-input-label>
                <select name="status" id="status"
                    class="block w-full mt-1 truncate border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    @php
                    $status = ['Menunggu','Diterima', 'Ditolak', 'Dikirim', 'Selesai'];
                    @endphp
                    <option value="">Pilih status...</option>
                    @foreach ($status as $item)
                    <option value="{{ $item }}" @selected($is_edit ? old('status', $permohonan->status) == $item : old('status') == $item)>{{ $item }}
                    </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
            @endif

            <button type="submit"
                class="px-3 mt-5 mr-auto leading-10 text-white bg-green-600 rounded w-max hover:bg-green-500">
                {{ $is_edit ? 'Update' : 'Buat' }} Permohonan
            </button>
    </form>
</div>