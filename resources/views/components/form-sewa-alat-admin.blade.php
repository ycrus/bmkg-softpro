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
        action="{{ $is_edit ? route('admin.sewa-alat.update', ['sewa_alat' => $permohonan]) : route('admin.sewa-alat.store') }}"
        method="POST" class="grid max-w-md grid-cols-1 gap-3" enctype="multipart/form-data">
        @csrf
        @if ($is_edit)
            @method('put')
        @else
            @method('post')
        @endif

        <div class="flex flex-col gap-3">
            <div class="flex gap-3 *:flex-1">
                <div>
                    <x-input-label for="alat_id">Alat</x-input-label>
                    <select name="alat_id" id="alat_id"
                        class="block w-full mt-1 truncate border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        <option value="">Pilih alat...</option>
                        @foreach ($alats as $alat)
                            <option value="{{ $alat->id }}" @selected($is_edit ? old('alat_id', $permohonan->alat->id) == $alat->id : old('alat_id') == $alat->id)>
                                {{ $alat->nama }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('alat_id')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="banyak_unit">Banyak unit</x-input-label>
                    <x-text-input id="banyak_unit" class="block w-full mt-1" type="number" name="banyak_unit"
                        :value="$is_edit ? old('banyak_unit', $permohonan->banyak_unit) : old('banyak_unit')" required />
                    <x-input-error :messages="$errors->get('banyak_unit')" class="mt-2" />
                </div>
            </div>

            @if ($is_edit)
                <div>
                    <x-input-label for="status">Status</x-input-label>
                    <select name="status" id="status"
                        class="block w-full mt-1 truncate border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        @php
                            $status = ['Belum Lunas', 'Alat Siap Diambil', 'Alat Dibawa', 'Alat Sudah Dikembalikan'];
                        @endphp
                        <option value="">Pilih alat...</option>
                        @foreach ($status as $item)
                            <option value="{{ $item }}" @selected($is_edit ? old('status', $permohonan->status) == $item : old('status') == $item)>{{ $item }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
            @endif

            <div class="flex gap-3">
                <div class="relative flex-1">
                    <x-input-label class="w-full" for="sewa_mulai">Dari tanggal</x-input-label>
                    <x-text-input id="sewa_mulai" class="block w-full mt-1" type="date" name="sewa_mulai"
                        :value="$is_edit ? old('sewa_mulai', $permohonan->sewa_mulai) : old('sewa_mulai')" placeholder="Dari tanggal" required />
                    <x-input-error :messages="$errors->get('sewa_mulai')" class="mt-2" />
                </div>
                <div class="relative flex-1">
                    <x-input-label class="w-full" for="sewa_berakhir">Hingga tanggal</x-input-label>
                    <x-text-input id="sewa_berakhir" class="block w-full mt-1" type="date" name="sewa_berakhir"
                        :value="$is_edit ? old('sewa_berakhir', $permohonan->sewa_berakhir) : old('sewa_berakhir')" placeholder="Hingga tanggal" required />
                    <x-input-error :messages="$errors->get('sewa_berakhir')" class="mt-2" />
                </div>
            </div>
            <div>
                <x-input-label for="surat_permohonan">{{ $is_edit ? 'Update' : '' }} Surat Permohonan</x-input-label>
                <div class="flex items-stretch w-full gap-3 mt-1">
                    @if ($is_edit && $permohonan->surat_permohonan)
                        <a class="flex items-center px-3 border border-gray-300 rounded"
                            href="{{ route('sewa-alat.download-permohonan', ['sewa_alat' => $permohonan]) }}">
                            <i class="fa-solid fa-file-arrow-down"></i> &nbsp; Download
                        </a>
                    @endif
                    <div
                        class="flex-1 block border border-gray-300 rounded-md dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">

                        <input type="file" accept=".png,.jpg,.jpeg,.pdf" name="surat_permohonan"
                            id="surat_permohonan"
                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-s-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 hover:file:cursor-pointer" />
                    </div>
                </div>
                <x-input-error :messages="$errors->get('surat_permohonan')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-col flex-1 gap-3">
            <div class="flex flex-col flex-1">
                <x-input-label for="keterangan">Keterangan</x-input-label>
                <textarea id="keterangan"
                    class="flex-1 block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    rows="3" name="keterangan" :value="old('keterangan')">{{ $is_edit ? $permohonan->keterangan : '' }}</textarea>
                <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
            </div>
        </div>

        <button type="submit"
            class="px-3 mt-5 mr-auto leading-10 text-white bg-green-600 rounded w-max hover:bg-green-500">
            {{ $is_edit ? 'Update' : 'Buat' }} Permohonan
        </button>
    </form>
</div>
