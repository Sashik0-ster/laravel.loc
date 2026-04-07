{{--
<div class="metric-box">
    <div class="metric-label">Прибуток</div>
    <div class="metric-value">0</div>
    <div class="metric-currency">USD</div>
</div>
--}}
<div class="period-metrics">
    <div class="metric-box">
        <div class="metric-label">{{ $label ?? 'Показник' }}</div>
        <div class="metric-value">{{ $value ?? 0 }}</div>
        <div class="metric-currency">{{ $currency ?? '' }}</div>
    </div>
</div>
