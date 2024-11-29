<x-admin-layout>
    <x-slot name="title">Peta Sebaran</x-slot>
    <x-slot name="button">
        <a href="{{ route('admin.peta-sebaran.create') }}"
            class="col-start-2 px-3 py-2 mt-5 ml-auto leading-10 text-white bg-green-600 rounded w-max hover:bg-green-500">
            + Permohonan
        </a>
    </x-slot>

    @include('components.table-peta-sebaran-admin', ['permohonan' => $permohonan])
</x-admin-layout>
