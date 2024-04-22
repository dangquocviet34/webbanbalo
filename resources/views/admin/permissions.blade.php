<x-admin-layout>
    <x-slot name='title'>
        Roles & Permissions
    </x-slot>

    <div>
        <div class="pull-left">
            <h3> Permission: </h3>
        </div>
        <div class="pull-right">

        </div>
    </div>
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
                    <th scope="row"><input class="form-check-input" type="checkbox" value="" id="{}">
                    </th>
                    <td>name</td>
                    <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>
                    <td><input class="form-check-input" type="checkbox" value="" id="{}"></td>

                </tr>
            @endforeach
    </table>

</x-admin-layout>
