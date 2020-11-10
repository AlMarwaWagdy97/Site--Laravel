@extends('layouts.index')

@section('title','Add Customer')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Add Customer :</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST" enctype="multipart/form-data">
                @include('internal.customers.form')
                <button type="submit" class="btn btn-primary"> Add Customer</button>
            </form>

        </div>
    </div>
    {{--------------------------------------------------------------------------------------------------}}

@endsection
