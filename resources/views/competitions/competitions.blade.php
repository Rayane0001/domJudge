@extends('layouts.master')

@section('title', 'Contacts')

@section('content')
    @foreach($competitions as $competition)
        <x-competition :competition="$competition"></x-competition>
    @endforeach
@endsection
