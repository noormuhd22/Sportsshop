@extends('layout.theme')
@section("post")


<h3>{{ $customer->name }}</h3>
<h3>{{ $customer->phone }}</h3>
<h3>{{ $customer->email}}</h3>
<h3>{{ $customer->address}}</h3>


@endsection