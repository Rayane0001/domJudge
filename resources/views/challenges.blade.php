@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Challenges</h1>
        <ul>
            @foreach ($challenges as $challenge)
                <li>
                    <a href="{{ asset($challenge->pdf_path) }}" target="_blank">
                        Challenge {{ $challenge->letter }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
