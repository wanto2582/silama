@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-danger']) }}>
        @foreach ((array) $messages as $message)
            <li><small>{{ $message }}</small></li>
        @endforeach
    </ul>
@endif
