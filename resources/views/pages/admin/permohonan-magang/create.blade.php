<x-admin-layout>
    @isset($title)
    <x-slot name="title">{{ $title }}</x-slot>
    @endisset
    <x-slot name="button">
        <a href="{{ route('admin.pelayanan-jasa.index') }}"
            class="col-start-2 px-3 py-2 mt-5 ml-auto leading-10 text-white bg-red-600 rounded w-max hover:bg-red-500">
            Kembali
        </a>
    </x-slot>

    @include('components.form-permohonan-magang-admin', ['is_edit' => false])
</x-admin-layout>