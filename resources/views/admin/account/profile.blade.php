<x-admin-layout>
    <x-slot name='title'>
        Account Profile
    </x-slot>

    <h1 class="font-weight-bold">Profile {{ $data->fullname }}</h1>
    <div class="container">
        <h2>Role: {{ $role }}</h2>
        <div>
            <img src="{{ asset('storage/images/' . $data->photo) }}" width="200px" height="300px">
        </div>
    </div>

</x-admin-layout>
