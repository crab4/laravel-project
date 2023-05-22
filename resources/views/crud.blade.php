@extends('layouts/mainLayout')
@section('crudList')
<div>
  <ul class="space-y-1 text-black-500 list-disc list-inside dark:text-gray-400 indent-2">
    @foreach ($post as $key => $value)
        <li> <span class="w-20 p-0.5 rounded-full text-white bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300" >{{$key}}:</span> {{$value}}</li>
      @endforeach
  </ul>
</div>
@endsection
