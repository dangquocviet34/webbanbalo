<x-admin-layout>
    <x-slot name='title'>
        Roles & Permissions
    </x-slot>

    <div>
        <div class="pull-left">
            <h3> Roles & Permissions </h3>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-info btn-lg"><i class="fa fa-plus-square"></i> Add Role</button>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="col-md-2">#</th>
                <th class="col-md-7" scope="col">Role name</th>
                <th class="col-md-3" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="col-md-2">
                    </td>
                    <td class="col-md-7">
                        <strong>{{ $role->description }}</strong><br>
                        <i>{{ $role->count_role_id }} members</i>
                    </td>
                    <td class="col-md-3">
                        <button type="button" class="btn btn-primary"><i class="fa fa-key"></i></button>
                        <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <i> Showing 1 to {{ array_sum(array_column($roles, 'count_role_id')) }} of {{ array_sum(array_column($roles, 'count_role_id')) }} entries. </i>
                </td>
            </tr>
        </tfoot>
    </table>

</x-admin-layout>
