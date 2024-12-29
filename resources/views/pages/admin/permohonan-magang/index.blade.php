<x-admin-layout>
    <x-slot name="title">Permohonan Magang</x-slot>
    <x-slot name="button">
        <a href="{{ route('admin.pelayanan-jasa.create') }}"
            class="col-start-2 px-3 py-2 mt-5 ml-auto leading-10 text-white bg-green-600 rounded w-max hover:bg-green-500">
            + Permohonan
        </a>
    </x-slot>

    @include('components.table-permohonan-magang-admin', ['permohonan' => $permohonan])
</x-admin-layout>