<x-admin-layout>
    <x-slot name='title'>
        User Accounts
    </x-slot>

    <div>
        <div class="pull-left">
            <h3> Accounts </h3>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-info btn-lg"><i class="fa fa-user-plus"></i> Add Account</button>
        </div>
    </div>
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
                        <i>{{ $user->username }}</i>
                    <td class="col-md-2">
                        <i>{{ $user->email }}</i>
                    </td>
                    <td class="col-md-2">
                        <i>{{ $user->phone }}</i>
                    </td>
                    <td class="col-md-1">
                        @if ($user->status)
                            <span class="badge rounded-pill bg-light text-dark">Active</span>
                        @else
                            <span class="badge rounded-pill bg-warning text-dark">Inactive</span>
                        @endif
                    </td>
                    <td class="col-md-2">
                        <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6      ">
                    <i> Showing 1 to {{ count($users) }} of {{ count($users) }} entries. </i>
                </td>
            </tr>
        </tfoot>
    </table>

</x-admin-layout>
