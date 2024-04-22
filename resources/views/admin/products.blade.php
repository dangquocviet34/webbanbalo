<x-admin-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>

    <div>
        <div class="pull-left">
            <h3> Products</h3>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-info btn-lg"><i class="fa fa-filter"></i> Filter</button>
            <li class="btn btn-success btn-lg header-account dropdown default-dropdown" style="text-align: left">
                <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                    <div class="header-btns-icon">
                        <i class="fa fa-file-archive-o"></i> Export
                    </div>
                </div>
                <ul class="custom-menu">
                    <li><a href="#"><i class="fa fa-print"></i> Print tables</a></li>
                    <li><a href="#"><i class="fa fa-file-excel-o"></i> Export to XLSX</a>
                    </li>
                </ul>
            </li>
            <button type="button" class="btn btn-warning btn-lg"><i class="fa fa-upload"></i> Upload </button>
            <a href="{{ route('admin.product_create')}}" type="button" class="btn btn-primary btn-lg"><i class="fa fa-cart-plus"></i> Add product</a>
        </div>
    </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="col-md-1" scope="col">#</th>
                <th class="col-md-3" scope="col">Name</th>
                <th class="col-md-1" scope="col">Category</th>
                <th class="col-md-1" scope="col">Price</th>
                <th class="col-md-1" scope="col">Status</th>
                <th class="col-md-2" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="col-md-1"></td>

                    <td class="col-md-3">
                        <b>{{ $product->tensp }}</b><br>
                    </td>
                    <td class="col-md-1">
                        {{ $product->category }}
                    </td>
                    <td class="col-md-1">
                        <i>{{ number_format($product->price, 0, ',', '.') }} đ</i>
                    <td class="col-md-1">
                        @if ($product->status)
                            <span class="label label-success badge-pill">Active</span>
                        @else
                            <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="col-md-2">
                        <form method='post' action = "{{ route('admin.product_delete') }}"
                            onsubmit="return confirm('Do you really want to delete this product?');">
                            <a href="{{ route('admin.product_view', ['id' => $product->id_sanpham]) }}" type="button"
                                class="btn btn-info"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.product_edit', ['id' => $product->id_sanpham]) }}" type="button"
                                class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <input type='hidden' value='{{ $product->id_sanpham }}' name='id'>
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
                    <i> Showing 1 to {{ count($products) }} of {{ count($products) }} entries. </i>
                </td>
            </tr>
        </tfoot>
    </table>
</x-admin-layout>
