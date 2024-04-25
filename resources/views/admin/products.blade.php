<x-admin-layout>
    <x-slot name='title'>
        Products
    </x-slot>

    <h1 class="font-weight-bold"> Products </h1>
    <div class="container">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fa fa-filter"></i> Filter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-file-archive-o"></i> Export</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-upload"></i> Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.product.create') }} "><i class="fa fa-cart-plus"></i> Add product</a>
            </li>
        </ul>
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
                            <form method='post' action = "{{ route('admin.product.delete') }}"
                                onsubmit="return confirm('Do you really want to delete this product?');">
                                <a href="{{ route('admin.product.view', ['id' => $product->id_sanpham]) }}"
                                    type="button" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('admin.product.edit', ['id' => $product->id_sanpham]) }}"
                                    type="button" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
    </div>
</x-admin-layout>
