<div {{ $attributes->merge(['class' => 'period-card border rounded-lg p-4']) }}>

    @if(isset($header))
        {{ $header }}
    @endif


    @if(isset($bodycard))
        <div class="period-links flex justify-between ">
            {{$bodycard}}
        </div>
    @endif

    @if(isset($metricbox))
        {{$metricbox}}
    @endif

</div>
