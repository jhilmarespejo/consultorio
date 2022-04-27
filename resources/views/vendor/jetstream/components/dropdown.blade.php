@props(['id'])

<li class="nav-item dropdown">
    <a id="{{ $id }}" {!! $attributes->merge(['class' => 'nav-link']) !!} role="button" data-bs-toggle="dropdown" aria-expanded="true">
        {{ $trigger }}
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="{{ $id }}">
        {{ $content }}

    </div>
</li>