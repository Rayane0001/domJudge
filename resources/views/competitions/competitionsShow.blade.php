@extends('layout')

@section('title', 'Compétition : ' . $competition->name)

@section('content')
    <x-competition></x-competition>
@endsection
