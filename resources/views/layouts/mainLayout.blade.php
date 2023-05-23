<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <wrapper class="flex flex-col">
        <nav class="bg-gray-200 border-gray-200 dark:bg-gray-900 ">

            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-medium flex p-4 md:p-0 mt-4 border border-gray-100  bg-gray-200 flex-row space-x-8 md:mt-0 border-0  md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('main.index') }}"
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                                aria-current="page">Main</a>
                        </li>
                        <li>
                            <a href="{{ route('about.index') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                        </li>
                        <li>
                            <a href="{{ route('pricing.index') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="flex ">
            <aside id="default-sidebar"
                class="z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-300 dark:bg-gray-800">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="{{ route('posts.index') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                </svg>
                                <span class="ml-3">Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="flex-1 ml-3 whitespace-nowrap">Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="flex-1 ml-3 whitespace-nowrap">Edit</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="flex-1 ml-3 whitespace-nowrap">Show</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
              @yield('content')
        </div>

    </wrapper>
</body>

</html>
