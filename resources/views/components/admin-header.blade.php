@props(['title' => '', 'subtitle' => null, 'actions' => []])

<div class="d-flex align-items-start justify-content-between mb-3 admin-header">
    <div>
        <h1 class="mb-0">{!! $title !!}</h1>
        @if($subtitle)
            <p class="mb-0 text-muted">{{ $subtitle }}</p>
        @endif
    </div>

    @if(!empty($actions) && is_array($actions))
        <div class="admin-actions">
            @foreach($actions as $action)
                @php
                    $url = $action['url'] ?? '#';
                    $label = $action['label'] ?? 'Action';
                    $class = $action['class'] ?? 'btn-outline-primary';
                    $icon = $action['icon'] ?? null;
                @endphp
                <a href="{{ $url }}" class="btn btn-sm {{ $class }} {{ $action['class'] ?? '' }}">
                    @if($icon) <i class="bi {{ $icon }} me-1"></i> @endif
                    {{ $label }}
                </a>
            @endforeach
        </div>
    @endif
</div>
