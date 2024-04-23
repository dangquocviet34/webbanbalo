<x-admin-layout>
    <x-slot name='title'>
        Roles & Permissions
    </x-slot>

    <div class="container">
        <h1 class="font-weight-bold"> Permissions </h1>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa fa-user-plus"></i> Add Permission</a>
            </li>
        </ul>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Page</th>
                    <th scope="col">Create</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    <th scope="col">View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <th scope="row"><input class="form-check-input" type="checkbox" value=""
                                id="{}">
                        </th>
                        <td>name</td>
                        <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>
                        <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>
                        <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>
                        <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>

                    </tr>
                @endforeach
        </table>
    </div>
</x-admin-layout>
