@extends('layout.app')
@section('content')
    <div class="container mx-auto">
        <br>
        <a href="{{ route('category.create') }}"
            class="btn btn-primary block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline float-right">
            Add Category
        </a><br>
    </div>
    {{ $dataTable->table() }}
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
