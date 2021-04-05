@extends('layouts.front')
@section('content')


@if(!empty($joblocation[0]))
//display contacts

@else
You dont have contacts
@endif
@endsection