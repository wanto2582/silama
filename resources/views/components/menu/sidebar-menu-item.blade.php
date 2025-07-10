<li {{$attributes}}>
    <a href="{{ $link }}" {{ $attributes->merge(['class' => 'dropdown-toggle']) }}>
        <span class="{{ $icon }}"></span>
        <span class="mtext">{{ $title }}</span>
    </a>
</li>
