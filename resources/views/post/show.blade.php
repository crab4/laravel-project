@extends('layouts.mainLayout')
@section('content')
    <div class=" flex flex-col w-96 m-auto mt-20 text-center border border-black border-solid rounded-md p-3">
        @csrf
        <div>
            <h2>Information about post #{{ $post->id }}</h2>
        </div>
        <!--title-->
        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                Title:
            </label>
            <input type="text" id="title" name="title" readonly
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $post->title }}">
        </div>
        <!--Content-->
        <div>
            <label for="content"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Conetnt</label>
            <!-- <input type="textarea" id="content"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-->
            <textarea name="content" readonly
                class="h-48 resize-none block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
                name="content_name" id="content">{{ $post->content }}
            </textarea>
        </div>
        <!--Description-->
        <div>
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Description</label>
            <input type="text" id="description" name="description" readonly
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $post->description }}">
        </div>
        <!--image-->
        <div class="mb-5">
            <label for="image"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Image</label>
            <input type="text" id="image" name="image" readonly
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $post->image }}">
        </div>

        <div class="mb-5">
            <label for="Category"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Category</label>
            <input type="text" name="category" readonly
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $categories->find($post->category_id)->title }}">
        </div>

        <div class="mb-5">
          <label for="Tags"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Tags</label>
          <input type="text" name="Tags" readonly
              class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              value="| @foreach ($postTags as $tag){{$tag->title}} | @endforeach">
      </div>

        <div class="flex justify-between	">
            <div class="flex">
                <div><SPan class="font-medium text-sm">Published: </SPan></div>
                <input type="checkbox" name="is_published" value="no" style="visibility: hidden" checked>
                <input type="checkbox" name="is_published" id="is_published" onclick="return false;"
                    @if ($post->is_published) checked @endif>
            </div>
            <div>
                Likes: {{ $post->likes }}
            </div>
        </div>

        <div class="mb-2">
            <label for="created_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Create
                date</label>
            <input type="datetime" name=created_at" id="created_at" readonly value="{{ $post->created_at }}"
                class="text-left block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"">
        </div>

        <div class="flex justify-between">

            <a href="{{ route('posts.edit', $post->id) }}"
                class="w-2/5 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                class="w-2/5 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full h-full">Delete</button>
            </form>

            <a href="{{ route('posts.index') }}"
                class="w-2/5 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</a>
        </div>
    </div>
@endsection
