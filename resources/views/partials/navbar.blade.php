<nav class="border-b-2 border-gray-100 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
    <div class="container mx-auto flex justify-between items-center h-16 px-4">
        <div class="hidden md:flex items-center space-x-4" id="navbar-solid-bg">
            <ul class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-6">
                <li>
                    <a href="{{ route('user.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline">Users</a>
                </li>
                {{-- <li>
                    <a href="{{ route('product.index') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline display:none">Products</a>
                </li> --}}
                <li>
                    <a href="{{ route('product.card') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline">Products</a>
                </li>
                <li>
                    <a href="{{ route('category.create') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline">Categories</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 dark:text-white dark:hover:text-blue-500 no-underline">Orders</a>
                </li>
            </ul>
        </div>
    </div>
</nav>