@extends('layouts.index')

@section('title', 'Edit details for ' . $customer->name)

@section('content')
    <br>
    <div class="row">
        <div class="col-12">
            <h1>Edit details for {{$customer->name}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers/{{$customer->id}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('internal.customers.form', compact($customer))
                <button type="submit" class="btn btn-primary"> Save Customer</button>
            </form>
        </div>
    </div>
    {{--------------------------------------------------------------------------------------------------}}

@endsection
