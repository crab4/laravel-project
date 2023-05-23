@extends('layouts.mainLayout')
@section('content')
    <form class=" flex flex-col w-96 m-auto mt-20 text-center border border-black border-solid rounded-md p-3"
        action="{{ route('post.store') }}" method="post">
        @csrf
        <div>
            <h2>Create new post</h2>
        </div>
        <!--title-->
        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                Title:
            </label>
            <input type="text" id="title" name="title"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <!--Content-->
        <div>
            <label for="content" 
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Conetnt</label>
            <!-- <input type="textarea" id="content"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-->
            <textarea name="content" class="h-48 resize-none block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"" name="content_name" id="content"></textarea>
        </div>
        <!--Description-->
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Description</label>
            <input type="text" id="description" name="description"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <!--image-->
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Image</label>
            <input type="text" id="image" name="image"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="flex justify-between">
          <button type="submit"
              class="w-2/5 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Create</button>
          <a href="{{route('posts.index')}}" class="w-2/5 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</a>
        </div>
    </form>
@endsection
