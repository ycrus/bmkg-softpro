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
        action="{{ $is_edit ? route('admin.klaim-asuransi.update', ['klaim_asuransi' => $permohonan]) : route('admin.klaim-asuransi.store') }}"
        method="POST" class="grid max-w-md grid-cols-1 gap-3" enctype="multipart/form-data">
        @csrf
        @if ($is_edit)
            @method('put')
        @else
            @method('post')
        @endif

        <div class="flex flex-col gap-3">
            <div>
                <x-input-label for="perusahaan">Nama Perusahaan</x-input-label>
                <x-text-input id="perusahaan" class="block w-full mt-1" type="text" name="perusahaan" :value="$is_edit ? old('perusahaan', $permohonan->perusahaan) : old('perusahaan')"
                    required />
                <x-input-error :messages="$errors->get('perusahaan')" class="mt-2" />
            </div>
    
            <div >
                <x-input-label class="w-full" for="tanggal">Tanggal Kejadian</x-input-label>
                <x-text-input id="tanggal" class="block w-full mt-1" type="date" name="tanggal"
                    :value="$is_edit ? old('tanggal', $permohonan->tanggal) : old('tanggal')" placeholder="Dari tanggal" required />
                <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
            </div>
    
            <div>
                <x-input-label for="lokasi">Lokasi Kejadian</x-input-label>
                <x-text-input id="lokasi" class="block w-full mt-1" type="text" name="lokasi" :value="$is_edit ? old('lokasi', $permohonan->lokasi) : old('lokasi')"
                    required />
                <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
            </div>
            <div class="flex gap-3">
                <div class="relative flex-1">
                    <x-input-label for="latitude">Latitude</x-input-label>
                    <x-text-input id="latitude" class="block w-full mt-1" type="text" name="latitude" :value="$is_edit ? old('latitude', $permohonan->latitude) : old('latitude')"
                        required />
                        <x-input-error :messages="$errors->get('latitude')" class="mt-2" />
                </div>
                <div class="relative flex-1">
                    <x-input-label for="longitude">Longitude</x-input-label>
                    <x-text-input id="longitude" class="block w-full mt-1" type="text" name="longitude" :value="$is_edit ? old('longitude', $permohonan->longitude) : old('longitude')"
                        required />
                        <x-input-error :messages="$errors->get('longitude')" class="mt-2" />
                </div>
            </div>
            <div>
                <x-input-label for="kejadian">Jenis Data</x-input-label>
                <select name="kejadian" id="kejadian"
                    class="block w-full mt-1 truncate border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    @php
                        $kejadian = ['Petir','Gempa Bumi'];
                    @endphp
                    <option value="">Pilih jenis data...</option>
                    @foreach ($kejadian as $item)
                        <option value="{{ $item }}" @selected($is_edit ? old('kejadian', $permohonan->kejadian) == $item : old('kejadian') == $item)>{{ $item }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kejadian')" class="mt-2" />
            </div>
    
            @if ($is_edit)
                <div>
                    <x-input-label for="status">Status</x-input-label>
                    <select name="status" id="status"
                        class="block w-full mt-1 truncate border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        @php
                            $status = ['Menunggu','Diproses', 'Selesai'];
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
