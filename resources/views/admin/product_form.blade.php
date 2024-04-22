<x-admin-layout>
    <x-slot name='title'>
        Product Create
    </x-slot>

    @if ($errors->any())
        <div style='color:red; margin:0 auto'>
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
    <div></div>
    <div class="pull-left">
        @if ($action == 'add')
            <h3>Add a new product</h3>
        @else
            <h3>Modify product information</h3>
        @endif
    </div>
    <div class="pull-right">
        <button type="button" class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> Save product</button>
        <button type="button" class="btn btn-danger btn-lg"><i class="fa fa-user-plus"></i> Cancel</button>
    </div>
    </div>

    <form action="{{ route('admin.product_save', ['action' => $action]) }}" method = 'post'>
        <div class="row">
            <div class="form-group mb-3 col-sm-12">
                <label>Name</label>
                <input type='text' class='form-control form-control-sm' name='tensp' placeholder="Product Name"
                    value="{{ $data->tensp ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group mb-3 col-sm-4">
                <label>Product Code</label>
                <input type='text' class='form-control form-control-sm' name='code_product'
                    placeholder="Product Code" value="{{ $data->code_product ?? '' }}">
            </div>
            <div class="form-group mb-3 col-sm-4">
                <label>Origin</label>
                <input type='text' class='form-control form-control-sm' name='origin'
                    placeholder="Origin"="{{ $data->xuatxu ?? '' }}">
            </div>
            <div class="form-group mb-3 col-sm-4">
                <label>Price</label>
                <input type='text' class='form-control form-control-sm' name='price'
                    placeholder="Price"="{{ $data->price ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group mb-3 col-sm-6">
                <label>Description</label>
                <textarea class='form-control form-control-sm' name='description' rows="3" value="{{ $data->description ?? '' }}"> </textarea>

            </div>
            <div class="form-group mb-3 col-sm-6">
                <label>Content</label>
                <textarea class='form-control form-control-sm' name='content' rows="3" value="{{ $data->content ?? '' }}"> </textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group mb-3 col-sm-4">
                <label>Size</label>
                <input type='text' class='form-control form-control-sm' name='sizess' placeholder="Size"
                    value="{{ $data->sizess ?? '' }}">
            </div>
            <div class="form-group mb-3 col-sm-4">
                <label>Color</label>
                <input type='text' class='form-control form-control-sm' name='color' placeholder="Color"
                    value="{{ $data->mausac ?? '' }}">
            </div>
            <div class="form-group mb-3 col-sm-4">
                <label>Status</label>
                <input type='text' class='form-control form-control-sm' name='view'
                    value="{{ $data->view ?? '' }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group mb-3 col-sm-6">

                <label>Menu</label>
                <select name="id_catalog" class="form-control form-control-sm">
                    @php
                        $selected = isset($product->id_catalog) ? $product->id_catalog : '';
                    @endphp
                    @foreach ($menu as $menu)
                        <option value="{{ $menu->id_catalog }}"
                            {{ $selected == $menu->id_catalog ? 'selected' : '' }}>
                            {{ $menu->name_menu }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3 col-sm-6">
                <label>Category</label>
                <select name="id_sub" class="form-control form-control-sm">
                    @php
                        $selected = isset($product->id_sub) ? $product->id_sub : '';
                    @endphp
                    @foreach ($sub_menu as $sub)
                        <option value="{{ $sub->id_sub }}" {{ $selected == $sub->id_sub ? 'selected' : '' }}>
                            {{ $sub->name_sub }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group mb-3 col-sm-12">
                <label>Ảnh sản phẩm</label><br>
                @if ($action == 'edit')
                    <input type="file" name="image_sp" id="image_sp" accept="image/*" class="form-control-file"
                        class='mb-3'>
                    <img src="{{ asset('/' . $data->image_sp) }}" width="100px" class='mb-3' /><br>
                @endif
                @if ($action == 'add')
                    <input type="file" name="image_sp" id="image_sp" accept="image/*" class="form-control-file"
                        class='mb-3'>
                @endif
            </div>
        </div>

        {{ csrf_field() }}

    </form>
</x-admin-layout>
