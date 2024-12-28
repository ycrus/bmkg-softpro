@extends('layouts.main')

@section('content')
    <div class="container min-h-screen mx-auto pt-[100px] px-5 lg:px-0">
        <h1 class="mb-10 text-3xl font-bold">KUISIONER</h1>
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
        <form
        action="{{route('admin.permohonan-kunjungan.store') }}"
        method="POST" class="grid max-w-md grid-cols-1 gap-3" enctype="multipart/form-data">
        <div class="flex flex-col gap-3">
            <div>
                <x-input-label for="perusahaan">QUESTION 1</x-input-label>
                <x-text-input id="perusahaan" class="block w-full mt-1" type="text" name="perusahaan">
            </div>
            <div>
                <x-input-label for="perusahaan">QUESTION 2</x-input-label>
                <x-text-input id="perusahaan" class="block w-full mt-1" type="text" name="perusahaan">
            </div>
            <div>
                <x-input-label for="perusahaan">QUESTION 3</x-input-label>
                <x-text-input id="perusahaan" class="block w-full mt-1" type="text" name="perusahaan">
            </div>
            <div>
                <x-input-label for="perusahaan">QUESTION 4</x-input-label>
                <x-text-input id="perusahaan" class="block w-full mt-1" type="text" name="perusahaan">
            </div>
            <div>
                <x-input-label for="perusahaan">QUESTION 5/x-input-label>
                <x-text-input id="perusahaan" class="block w-full mt-1" type="text" name="perusahaan">
            </div>
            
        <button type="submit"
            class="px-3 mt-5 mr-auto leading-10 text-white bg-green-600 rounded w-max hover:bg-green-500">
            SUBMIT
        </button>
    </form>
        </div>
    </div>
@endsection
