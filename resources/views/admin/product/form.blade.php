<x-admin-layout>
    <x-slot name='title'>
        Product Create
    </x-slot>

    <div class="container">
        @if ($action == 'add')
            <h1 class="font-weight-bold"> Add a new product </h1>
        @else
            <h1 class="font-weight-bold">Edit product: {{ $data->tensp }} </h1>
        @endif

        @if ($errors->any())
            <div class="alert alert-warning">
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
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.products') }}"><i class="fa fa-arrow-left"></i> Back </a>
            </li>
        </ul>

        <form action="{{ route('admin.product.save', ['action' => $action]) }}" method = 'post'
            enctype="multipart/form-data">
            <div class="row">
                <div class="form-group mb-3 col-sm-12">
                    <label>Name</label>
                    <input type='text' class='form-control form-control-lg' name='tensp' placeholder="Product Name"
                        value="{{ $data->tensp ?? '' }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-sm-4">
                    <label>Product Code</label>
                    <input type='text' class='form-control form-control-lg' name='code_product'
                        placeholder="Product Code" value="{{ $data->code_product ?? '' }}" >
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Origin</label>
                    <input type='text' class='form-control form-control-lg' name='xuatxu' placeholder="Origin"
                        value="{{ $data->xuatxu ?? '' }}">
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Price</label>
                    <input type='text' class='form-control form-control-lg' name='price' placeholder="Price"
                        value="{{ $data->price ?? '' }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-sm-6">
                    <label>Description</label>
                    <textarea class='form-control form-control-lg' name='description' rows="4">{{ $data->description ?? '' }}</textarea>

                </div>
                <div class="form-group mb-3 col-sm-6">
                    <label>Content</label>
                    <textarea class='form-control form-control-lg' name='content' rows="4">{{ $data->content ?? '' }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-sm-4">
                    <label>Size</label>
                    <input type='text' class='form-control form-control-lg' name='sizess' placeholder="Size"
                        value="{{ $data->sizess ?? '' }}">
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Color</label>
                    <input type='text' class='form-control form-control-lg' name='mausac' placeholder="Color"
                        value="{{ $data->mausac ?? '' }}">
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

                    <label>Menu</label>
                    <select name="id_catalog" class="form-control form-control-lg">
                        <option value=""disabled selected>---Select Menu---</option>
                        @php
                            $selected = isset($data->id_catalog) ? $data->id_catalog : '';
                        @endphp
                        @foreach ($menu as $menu)
                            <option value="{{ $menu->id_catalog }}"
                                {{ $selected == $menu->id_catalog ? 'selected' : '' }}>
                                {{ $menu->name_menu }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Category</label>
                    <select name="id_sub" class="form-control form-control-lg">
                        <option value=""disabled selected>---Select Category---</option>
                        @php
                            $selected = isset($data->id_sub) ? $data->id_sub : '';
                        @endphp
                        @foreach ($sub_menu as $sub)
                            <option value="{{ $sub->id_sub }}" {{ $selected == $sub->id_sub ? 'selected' : '' }}>
                                {{ $sub->name_sub }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 col-sm-4">
                    <label>Product Image</label><br>
                    @if ($action == 'edit')
                        <input type="file" name="image_sp" id="image_sp" accept="image/*" class="form-control-file"
                            class='mb-3'>
                        <img src="{{ asset('images/' . $data->image_sp) }}" width="100px" class='mb-3' /><br>
                    @endif
                    @if ($action == 'add')
                        <input type="file" name="image_sp" id="image_sp" accept="image/*" class="form-control-file"
                            class='mb-3'>
                    @endif
                </div>
            </div>
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary btn-lg btn-block"
                value="{{ $action == 'add' ? 'Save' : 'Update' }} this product"> </input>
        </form>
    </div>
</x-admin-layout>
