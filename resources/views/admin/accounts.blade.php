<x-admin-layout>
    <x-slot name='title'>
        User Accounts
    </x-slot>

    <h1 class="font-weight-bold"> Accounts </h1>
    <div class="container">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.account.create') }}"><i class="fa fa-user-plus"></i> Add
                    Account</a>
            </li>
        </ul>

        <table class="table">
            <thead>
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-2" scope="col">Name</th>
                    <th class="col-md-1" scope="col">Username</th>
                    <th class="col-md-2" scope="col">Email</th>
                    <th class="col-md-2" scope="col">Phone</th>
                    <th class="col-md-1" scope="col">Status</th>
                    <th class="col-md-2" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="col-md-1">
                            <b>{{ $user->description }}</b><br>
                        </td>
                        <td class="col-md-2">
                            <strong>{{ $user->fullname }}</strong>
                        </td>
                        <td class="col-md-1">
                            <i>{{ $user->name }}</i>
                        <td class="col-md-2">
                            <i>{{ $user->email }}</i>
                        </td>
                        <td class="col-md-2">
                            <i>{{ $user->phone }}</i>
                        </td>
                        <td class="col-md-1">
                            @if ($user->status)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td class="col-md-2">
                            <form method='post' action = "{{ route('admin.account.delete') }}"
                                onsubmit="return confirm('Do you really want to delete this account?');">
                                <a href="{{ route('admin.account.profile', ['id' => $user->id]) }}" class="btn btn-primary"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.account.edit', ['id' => $user->id]) }}" class="btn btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <input type='hidden' value='{{ $user->id }}' name='id'>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <i> Showing 1 to {{ count($users) }} of {{ count($users) }} entries. </i>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</x-admin-layout>
