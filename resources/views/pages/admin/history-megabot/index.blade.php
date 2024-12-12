<x-admin-layout>
    <x-slot name="title">History Megabot</x-slot>

    @include('components.table-histroy-chat-admin', ['permohonan' => $permohonan])
</x-admin-layout>