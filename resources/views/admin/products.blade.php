<x-admin-layout>
    <x-slot name='title'>
        Dashboard
    </x-slot>

    <div>
        <div class="pull-left">
            <h3> Products</h3>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-warning btn-lg"><i class="fa fa-filter"></i> Filter</button>
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
            <button type="button" class="btn btn-info btn-lg"><i class="fa fa-upload"></i> Upload </button>
            <button type="button" class="btn btn-info btn-lg"><i class="fa fa-cart-plus"></i> Add product</button>
        </div>
    </div>
    </div>

</x-admin-layout>
