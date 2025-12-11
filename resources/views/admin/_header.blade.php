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

                {{-- Jika button untuk modal --}}
                @if(!empty($action['modal']) && $action['modal'] === true)
                    <button
                        type="button"
                        class="btn btn-sm {{ $action['class'] ?? 'btn-outline-primary' }}"
                        data-bs-toggle="modal"
                        data-bs-target="{{ $action['url'] }}"
                    >
                        @if(!empty($action['icon']))
                            <i class="bi {{ $action['icon'] }} me-1"></i>
                        @endif
                        {{ $action['label'] }}
                    </button>

                {{-- Tombol link biasa --}}
                @else
                    <a href="{{ $action['url'] }}"
                       class="btn btn-sm btn-outline-primary {{ $action['class'] ?? '' }}">
                        @if(!empty($action['icon']))
                            <i class="bi {{ $action['icon'] }} me-1"></i>
                        @endif
                        {{ $action['label'] }}
                    </a>
                @endif

            @endforeach
        </div>
    @endif
</div>
