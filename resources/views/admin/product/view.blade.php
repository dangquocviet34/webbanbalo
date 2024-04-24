<x-admin-layout>
    <x-slot name='title'>
        Product View
    </x-slot>
    <style>
        .info {
            display: grid;
            grid-template-columns: repeat(2, 30% 70%);
        }
    </style>
    <div class="container">
        <h1>{{ $product->tensp }}</h1>
        <div class='info'>
            <div>
                <img src="{{ asset('images/' . $product->image_sp) }}" width="200px">
            </div>
            <div>
                <strong>Name: </strong> {{ $product->tensp }}</br>
                <strong>Category: </strong> {{ $category }}<br>
                <strong>Price: </strong>{{ number_format($product->price, 0, ',', '.') }} đ<br>
                <strong>Origin: </strong>{{ $product->xuatxu }}<br>
                <strong>Size: </strong>{{ $product->sizess }}<br>
                <strong>Color: </strong>{{ $product->mausac }}<br>
                <strong>Status: </strong>{{ $product->status }}<br>
                <strong>Mô tả: </strong><br>
                {{ $product->description }} <br>
            </div>
        </div>
    </div>
</x-admin-layout>
