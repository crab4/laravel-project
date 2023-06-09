@extends('layouts.mainLayout')
@section('content')
    <form class=" flex flex-col w-96 m-auto mt-20 text-center border border-black border-solid rounded-md p-3"
        action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <div>
            <h2>Update post</h2>
        </div>
        <!--title-->
        <div>
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">
                Title:
            </label>
            <input type="text" id="title" name="title" value="{{ $post->title }}"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <!--Content-->
        <div>
            <label for="content"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Conetnt</label>
            <!-- <input type="textarea" id="content"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-->
            <textarea name="content"
                class="h-48 resize-none block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
                name="content_name" id="content">{{ $post->content }}</textarea>
        </div>
        <!--Description-->
        <div>
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Description</label>
            <input type="text" id="description" name="description" value={{ $post->description }}
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <!--image-->
        <div class="mb-5">
            <label for="image"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Image</label>
            <input type="text" id="image" name="image" value={{ $post->image }}
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div >
            <label for="category"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Category</label>
            <select id="category" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($categories as $category)
                    <option {{ $post->category_id === $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <label for="tags"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Tags</label>
        <select multiple id="tags" name="tags[]"
            class="mb-2 bg-gray-50 border h-20 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($tags as $tag)
            <option @foreach ($postTags as $postTag)
              @if ($postTag->id === $tag->id)
                  selected
              @endif
            @endforeach value="{{$tag->id}}">{{$tag->title}} </option>    
            @endforeach
            
        </select>


        <div class="flex justify-between	">
            <div class="flex">
                <div>
                    <SPan class="font-medium text-sm">Published: </SPan>
                </div>
                <input type="checkbox" name="is_published" value="no" style="visibility: hidden" checked>
                <input type="checkbox" name="is_published" value="on" @if ($post->is_published) checked @endif>
            </div>
            <div>
                Likes: <input type="text" name="likes" id="likes" value="{{ $post->likes }}" class="w-11">
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
            <button type="submit"
                class="w-2/5 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Update</button>
            <a href="{{ route('posts.index') }}"
                class="w-2/5 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Back</a>
        </div>
    </form>
@endsection
