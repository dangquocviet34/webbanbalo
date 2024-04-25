<x-admin-layout>
    <x-slot name='title'>
        Account Create
    </x-slot>

    <div class="container">
        @if ($action == 'add')
            <h1 class="font-weight-bold">Add a new account </h1>
        @else
            <h1 class="font-weight-bold">Modify account: {{ $data->fullname }}</h1>
        @endif

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.accounts') }}"><i class="fa fa-arrow-left"></i> Back </a>
            </li>
        </ul>

        <form action="{{ route('admin.account.save', ['action' => $action]) }}" method="post"
            enctype="multipart/form-data">
            <div class="row">
                <div class="form-group mb-3 col-sm-4">
                    <label>Name</label>
                    <input type='text' class='form-control form-control-lg' name='fullname' placeholder="Name"
                        value="{{ $data->fullname ?? '' }}">
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>User Name</label>
                    <input type='text' class='form-control form-control-lg' name='username' placeholder="User Name"
                        value="{{ $data->name ?? '' }}">
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Address</label>
                    <input type='text' class='form-control form-control-lg' name='address' placeholder="Address"
                        value="{{ $data->address ?? '' }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-sm-4">
                    <label>Email</label>
                    <input type='text' class='form-control form-control-lg' name='email' placeholder="Email"
                        value="{{ $data->email ?? '' }}">
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Number Phone</label>
                    <input type='text' class='form-control form-control-lg' name='phone' placeholder="Number Phone"
                        value="{{ $data->phone ?? '' }}">
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Status</label>
                    <select name="status" class="form-control form-control-lg">
                        <option value=""disabled>---Select Status---</option>
                        @php
                            $selected = isset($data->status) ? $data->status : '';
                        @endphp
                        <option value="0" {{ $selected == '0' ? 'selected' : '' }}>
                            Inactive
                        </option>
                        <option value="1" {{ $selected == '1' ? 'selected' : '' }}>
                            Active
                        </option>
                    </select>
                </div>
            </div>
            <div class="row">

                <div class="form-group mb-3 col-sm-4">
                    <label>Password</label>
                    <input type='text' class='form-control form-control-lg' name='password'
                        placeholder="Enter Password" value="{{ $data->password ?? '' }}">
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Role</label>
                    <select name="role_id" class="form-control form-control-lg">
                        <option value=""disabled selected>---Select Role---</option>
                        @php
                            $selected = isset($data->role_id) ? $data->role_id : '';
                        @endphp
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $selected == $role->id ? 'selected' : '' }}>
                                {{ $role->description }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Profile Image</label><br>
                    @if ($action == 'edit')
                        <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file"
                            class='mb-3'>
                        <img src="{{ asset('images/' . $data->photo) }}" width="100px" class='mb-3' /><br>
                    @endif
                    @if ($action == 'add')
                        <input type="file" name="photo" id="photo" accept="image/*" class="form-control-file"
                            class='mb-3'>
                    @endif
                </div>
            </div>

            {{ csrf_field() }}
            <div class="row">
                <div class="form-group mb-3 col-sm-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block"
                        value="{{ $action == 'add' ? 'Save' : 'Update' }} this account"></input>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div>
                    {{ __('Whoops! Something went wrong.') }}
                </div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

</x-admin-layout>
