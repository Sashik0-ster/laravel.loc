<button class="sidebar-toggle d-md-none" id="sidebarToggle">
    <span></span><span></span><span></span>
</button>

<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <div class="logo-img">
            <div class="logo-hp">Sashik0<span>Product</span></div>
        </div>
        <div class="logo-tagline">Produce by Ukraine</div>
        <div class="sidebar-meta">
            {{ auth()->user()->name ?? 'Гість' }}<br>
        </div>
    </div>

    <nav class="sidebar-nav">
        @foreach($items as $item)
            <a href="{{ route($item->route) }}" style="text-decoration: none">
                <div class="nav-item {{ $item->active ? 'active' : '' }}">
                    {{ $item->label }}
                </div>
            </a>
        @endforeach
    </nav>

    <div class="sidebar-footer">
        <div class="plan-badge">
            <div>
                <div class="plan-label">Тариф: Безкоштовно</div>
                <div class="plan-sub">Ще 50 продажів</div>
            </div>
            <div class="plan-icon">⟵</div>
        </div>
    </div>
</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>
