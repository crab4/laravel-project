@extends('layouts.mainLayout')
@section('content')
<div class="flex flex-col h-full w-96 mx-auto mt-20 text-center border border-black border-solid rounded-md p-3 justify-items-end	">
  @foreach ($posts as $post)
    <div><a href="{{route('posts.show',$post->id)}}" class="resize-none break-words mx-auto w-3/4 block mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{$post->id}}.{{$post->title}}</a> </div>
  @endforeach
  <a href="{{route('posts.create')}}" class="w-3/4 mx-auto text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"">Create</a>
</div>
@endsection
