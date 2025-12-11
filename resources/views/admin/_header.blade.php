<div class="d-flex align-items-start justify-content-between mb-3 admin-header">
    <div>
        <h1 class="mb-0">{!! $title ?? '' !!}</h1>
        @if(!empty($subtitle))
            <p class="mb-0 text-muted">{{ $subtitle }}</p>
        @endif
    </div>

    @if(!empty($actions) && is_array($actions))
        <div class="admin-actions">
            @foreach($actions as $action)
                {{-- $action = ['url'=>..., 'label'=>..., 'class'=>..., 'icon'=>...] --}}
                <a href="{{ $action['url'] ?? '#' }}" class="btn btn-sm btn-outline-primary {{ $action['class'] ?? '' }}">
                    @if(!empty($action['icon'])) <i class="bi {{ $action['icon'] }} me-1"></i> @endif
                    {{ $action['label'] ?? 'Action' }}
                </a>
            @endforeach
        </div>
    @endif
</div>
