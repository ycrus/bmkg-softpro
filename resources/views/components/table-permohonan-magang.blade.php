<div class="col-span-2 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
    <div x-data="{
        showModalPermohonan: false,
        showModalBatalPermohonan: false,
        data: { universitas: null, fakultas: null, prodi: null, tanggal: null, status: null },
        batal: null,
        download: null,
    }" class="flex flex-col h-full p-6 text-gray-900 dark:text-gray-100">
        <h2 class="flex items-center mb-4 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            Permohonan Anda
        </h2>

        @if ($permohonan->isEmpty())
            <div class="grid flex-1 place-content-center">
                <img src="{{ asset('images/alat-tidak-tersedia.svg') }}" alt="" width="200">
                <p>Belum ada permohonan</p>
            </div>
        @else
            <div class="w-full -mr-6 overflow-x-auto">
                <table class="w-full overflow-hidden rounded table-auto text-slate-600 dark:text-slate-400">
                    <thead class="border-b bg-slate-100 dark:bg-slate-900 border-b-slate-300 dark:border-b-slate-500">
                        <tr>
                            <th class="p-3 text-left">Universitas</th>
                            <th class="p-3 text-left">Fakultas</th>
                            <th class="p-3 text-left">Prodi</th>
                            <th class="p-3 text-left">Tanggal</th>
                            <th class="p-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permohonan as $item)
                            <tr class="transition duration-200 border-b hover:cursor-pointer border-b-slate-300 dark:border-b-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700"
                                @click="
                                    showModalPermohonan = true;
                                    data.id = {{ $item->id }};
                                    data.universitas = `{{ $item->universitas }}`;
                                    data.fakultas = `{{ $item->fakultas }}`;
                                    data.prodi = `{{ $item->prodi }}`;
                                    data.tanggal =`{{ $item->tanggal_mulai }} s/d {{ $item->tanggal_selesai }}`;
                                    data.status = `{{ $item->status }}`;
                                    batal = `{{ route('permohonan-magang.destroy', ['permohonan_magang' => $item]) }}`;

                                    @if ($item->status !== 'Menunggu') download = `{{ route('permohonan-magang.download', ['permohonan_magang' => $item]) }}`; @endif
                                ">
                                <td class="p-3 align-top max-w-[200px]">
                                    {{ $item->universitas }}
                                </td>
                                <td class="p-3 align-top max-w-[200px]">
                                    {{ $item->fakultas }}
                                </td>
                                <td class="p-3 align-top max-w-[200px]">
                                    {{ $item->prodi }}
                                </td>
                                <td class="p-3 align-top">
                                    <span>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }}</span>
                                    -
                                    <span>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}</span>
                                </td>
                                <td>
                                    <span class="font-bold text-yellow-500">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Modal -->
        <div class="fixed inset-0 z-30 overflow-auto bg-black bg-opacity-50" x-show="showModalPermohonan"
            x-transition.opacity x-cloak>

            <!-- Modal inner -->
            <div class="w-full max-w-sm p-6 mx-auto mt-20 mb-10 text-left bg-white rounded-lg shadow-lg dark:bg-slate-800"
                @click.away="showModalPermohonan = false" x-transition>
                <!-- Title / Close-->
                <div class="flex items-center justify-between mb-5">
                    <h5 class="mr-3 font-bold max-w-none">Detail Permohonan</h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModalPermohonan = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <div class="modal-content">
                    <dl class="grid grid-cols-2 gap-y-3">
                        <dt class="text-sm text-slate-500">Universitas</dt>
                        <dd x-text="data.universitas"></dd>

                        <dt class="text-sm text-slate-500">Fakultas</dt>
                        <dd x-text="data.fakultas"></dd>

                        <dt class="text-sm text-slate-500">Program Studi</dt>
                        <dd x-text="data.prodi"></dd>

                        <dt class="text-sm text-slate-500">Tanggal</dt>
                        <dd x-text="data.tanggal"></dd>

                        <dt class="text-sm text-slate-500">Status</dt>
                        <dd x-text="data.status"></dd>

                        <dt x-show="data.status !== `Menunggu`" class="text-sm text-slate-500">Surat Ijin Magang</dt>
                        <dd x-show="data.status !== `Menunggu`">
                            <a :href="download" class="font-bold text-green-500 hover:text-green-700">
                                Download
                                <i class="fa-solid fa-file-arrow-down"></i>
                            </a>
                        </dd>
                    </dl>

                    <button type="button" @click="showModalPermohonan = false; showModalBatalPermohonan = true"
                        class="w-full p-3 mt-5 text-center text-white uppercase bg-red-400 rounded hover:bg-red-500 ms-auto">Batal
                        Permohonan</button>
                </div>
            </div>
        </div>
        <!-- /Modal -->

        <!-- Modal Confirm Delete -->
        <div class="fixed inset-0 z-30 overflow-auto bg-black bg-opacity-50" x-show="showModalBatalPermohonan"
            x-transition.opacity x-cloak>

            <!-- Modal inner -->
            <div class="w-full max-w-sm p-6 mx-auto mt-20 mb-10 text-left bg-white rounded-lg shadow-lg dark:bg-slate-800"
                @click.away="showModalBatalPermohonan = false" x-transition>
                <!-- Title / Close-->
                <div class="flex items-center justify-between mb-5">
                    <h5 class="mr-3 font-bold max-w-none">Batalkan Permohonan</h5>

                    <button type="button" class="z-50 cursor-pointer" @click="showModalBatalPermohonan = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- content -->
                <div class="modal-content">
                    <p>Anda yakin akan membatalkan permohonan?</p>

                    <form :action="batal" method="post" class="flex gap-3 w-full *:flex-1 mt-5">
                        @csrf @method('delete')

                        <button type="button" class="p-3 rouded"
                            @click="showModalBatalPermohonan = false">Tidak</button>
                        <button type="submit"
                            class="p-3 text-center text-white bg-red-400 rounded hover:bg-red-500">Ya,
                            Batalkan</butt>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Modal Confirm Delete -->
    </div>
</div>
