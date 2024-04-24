<x-admin-layout>
    <x-slot name='title'>
        Roles & Permissions
    </x-slot>

    <div class="container">
        <h1 class="font-weight-bold"> Roles </h1>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa fa-user-plus"></i> Add Role</a>
            </li>
        </ul>
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
                            <form method='post' action = "{{ route('admin.role.delete') }}"
                                onsubmit="return confirm('Do you really want to delete this role?');">
                                <a href="{{ route('admin.permissions', ['id' => $role->role_id]) }} "
                                    class="btn btn-primary"><i class="fa fa-key"></i></a>
                                <a href="{{ route('admin.role.edit', $role->role_id) }}" class="btn btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <input type='hidden' value='{{ $role->role_id }}' name='id'>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <i> Showing 1 to {{ array_sum(array_column($roles, 'count_role_id')) }} of
                            {{ array_sum(array_column($roles, 'count_role_id')) }} entries. </i>
                    </td>
                </tr>
            </tfoot>
        </table>

</x-admin-layout>
