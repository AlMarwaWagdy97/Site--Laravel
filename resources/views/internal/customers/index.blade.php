@extends('layouts.index')

@section('title')
    Customers
@endsection

@section('content')

    <p><a href="/customers/create" style="float: right;"><B>Add New Customer</B></a></p>
<div class="row">
    <div class="col-sm-6">
        <h3>Active Customers :</h3>
        <ul>
            @foreach($activeCustomer as $activecustomer)
                <li><a href="/customers/{{$activecustomer->id}}">{{$activecustomer->name}}</a> <span class="text-muted">({{$activecustomer->email}}) [{{$activecustomer->company->name}}]</span></li>
            @endforeach
        </ul>
    </div>

    <div class="col-sm-6">
        <h3>Inactive Customers :</h3>
        <ul>
            @foreach($inactiveCustomer as $inactivecustomer)
                <li><a href="/customers/{{$inactivecustomer->id}}">{{$inactivecustomer->name}}</a> <span class="text-muted">({{$inactivecustomer->email}}) [{{$inactivecustomer->company->name}}]</span></li>
            @endforeach
        </ul>
    </div>
</div>

<hr>
{{--------------------------------------------------------------------------------------------------------}}
<div class="row">

    @foreach($companies as $company)
        <div class="col-sm-3">
            <h3> {{$company->name}}</h3>
            @foreach($company->customers as $customer)
                <li><a href="/customers/{{$customer->id}}">{{$customer->name}}</a></li>
            @endforeach
        </div>
    @endforeach

</div>
<hr>
<br>
{{-------------------------------------------------------------------------------------------------------}}
    <h3>Customers: </h3>
    @foreach($customers as $customer)
        <div class="row">
            <div class="col-sm-2"> {{$customer->id}} </div>
            <div class="col-sm-4"> <a href="customers/{{$customer->id}}">{{$customer->name}}</a> </div>
            <div class="col-sm-2"> {{$customer->company->name}} </div>
            <div class="col-sm-2"> {{$customer->active}} </div>
        </div>
    @endforeach
{{--------------------------------------------------------------------------------}}

    <hr>
    <br>
@endsection
