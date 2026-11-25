{{-- Single marquee card --}}
<div class="client-card">
    <div class="client-avatar" style="background: {{ $color }};">
        {{ $initial }}
    </div>
    <div class="client-info">
        <div class="client-name">{{ $name }}</div>
        <div class="client-stats">
            <span class="client-stat">
                <span class="client-stat-value">{{ $posts }}</span>
                <span class="client-stat-label">posts</span>
            </span>
            <span class="client-stat">
                <svg class="client-stat-icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                    <circle cx="12" cy="12" r="3"/>
                </svg>
                <span class="client-stat-value">{{ $views }}</span>
            </span>
        </div>
    </div>
</div>