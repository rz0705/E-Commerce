@extends('layout.app')

@section('content')
<div class="container mx-auto">
    <div class="flex items-center mb-4">
        @foreach ($categories as $category)
            <input class="category-checkbox" type="checkbox" data-category="{{ $category->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 pr-5">{{ $category->name }}</label>
        @endforeach
    </div>
    <a href="{{ route('product.create') }}" class="btn btn-primary block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline float-right">
        Add Product
    </a><br>
    <div id="productGrid">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
            @if ($products)
                @foreach ($products as $product)
                <div class="max-w-sm rounded overflow-hidden shadow-lg product-card" data-categories="{{ implode(',', $product->categories->pluck('id')->toArray()) }}">
                    <img class="w-full" src="{{ $product->image_path }}" alt="{{ $product->name }} Image">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                        <p class="text-gray-700 text-base">{{ $product->description }}</p>
                        <p class="text-gray-700 text-base">Slug: {{ $product->slug }}</p>
                        <p class="text-gray-700 text-base">Price: ${{ $product->price }}</p>
                        <p class="text-gray-700 text-base">Category: {{ $product->categories->pluck('name')->implode(', ') }}</p>
                        <a name="add-to-cart" id="add-to-cart" class="btn btn-primary justify-content-center align-items-center d-flex" href="#" role="button">Add To Cart</a>
                    </div>
                </div>
                @endforeach
            @else
                <p>No products available.</p>
            @endif
        </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.category-checkbox').on('change', function() {
                var categoryId = $(this).data('category');
                var checked = $(this).is(':checked');
                if (checked) {
                    $('.product-card[data-categories*="' + categoryId + '"]').show();
                } else {
                    $('.product-card[data-categories*="' + categoryId + '"]').hide();
                }
            });
        });
    </script>
@endpush
@endsection
