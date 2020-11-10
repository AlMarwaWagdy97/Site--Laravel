@extends('layouts.index')

@section('title', 'Details for '.$customer ->name)

@section('content')
    <br>
        <h1>Details for {{$customer->name}}</h1><br>    <br>
    <div class="row">

        <div class="col-sm-2">
            <p style="background-color: cadetblue;width: 60px; height: 30px;padding: 7px"><a href="/customers/{{$customer->id}}/edit"><B style="color:white">Edit</B></a></p>
        </div>

        <div class="col-sm-2">
            <form action="/customers/{{$customer->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
        <br>
        <hr>

    </div>
{{-------------------------------------------------------------------------------------}}
    <div class="row">
        <div class="col-12">
            <p><strong>Name:</strong> {{$customer->name}}</p>
            <p><strong>Email:</strong> {{$customer->email}}</p>
            <p><strong>Company:</strong> {{$customer->company->name}}</p>
            {{-- @dump($customer->id) --}}
            {{-- @dump($customer->phone()->get()) --}}
            {{-- <p><strong>Phone:</strong> {{$customer->phone}}</p> --}}
        </div>
    </div>

    @if ($customer->image)
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('storage/'. $customer->image) }}" alt="" class="img-thumbnail">
            </div>
        </div>
    @endif
@endsection
