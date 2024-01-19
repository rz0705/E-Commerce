@extends('layout.app')
@section('content')
<div class="container mx-auto flex justify-between items-center h-16 px-4">
    <div class="hidden md:flex items-center space-x-4" id="navbar-solid-bg">
            <ul>
                <a href="{{ route('product.create') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline">Add Product</a>
            </ul>
    </div>
</div>
<body class="bg-gray-100 p-8">

    {{ $dataTable->table() }}
    {{-- <table class="min-w-full bg-white border border-gray-300 rounded">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Address</th>
                <th class="py-2 px-4 border-b">City</th>
                <th class="py-2 px-4 border-b">State</th>
                <th class="py-2 px-4 border-b">Zip Code</th>
                <th class="py-2 px-4 border-b">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th class="py-2 px-4 border-b">{{$user->name}}</th>
                <th class="py-2 px-4 border-b">{{$user->email}}</th>
                <th class="py-2 px-4 border-b">{{$user->address}}</th>
                <th class="py-2 px-4 border-b">{{$user->city}}</th>
                <th class="py-2 px-4 border-b">{{$user->state}}</th>
                <th class="py-2 px-4 border-b">{{$user->zip_code}}</th>
                <th class="py-2 px-4 border-b">{{$user->status}}</th>
            </tr>
            @endforeach
        </tbody>
    </table> --}}

    {{-- Jquery --}}
         
       

@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush