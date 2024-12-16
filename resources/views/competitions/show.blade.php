<h1>{{ $competition->name }}</h1>
<p>{{ $competition->description }}</p>

<h2>Challenges</h2>
<ul>
    @foreach ($competition->challenges as $challenge)
        <li>
            <a href="{{ route('competitions.challenges.show', [$competition->id, $challenge->id]) }}">{{ $challenge->name }}</a>
        </li>
    @endforeach
</ul>
