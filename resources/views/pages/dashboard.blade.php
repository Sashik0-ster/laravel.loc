@extends('layout.index')

@section('content')

    <div class="mb-4">

    </div>

    <div class="period-grid text-center ">

        @foreach($incomes as $income)
            <x-card>
                <x-slot:header>
                    <h4 class="text-lg font-bold mb-2">{{ $income->title }}</h4>
                </x-slot:header>

                <x-slot:bodycard>
                    <div class="period-links flex justify-between">
                        <span class="period-link">
                            {{ $income->amount }} USD
                        </span>
                    </div>
                </x-slot:bodycard>

                <x-slot:metricbox>
                    @include('components.metric-box')
                </x-slot:metricbox>

            </x-card>
        @endforeach

    </div>

@endsection
