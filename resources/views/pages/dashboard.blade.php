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
                    <div class="d-flex gap-3 justify-content-between">
                        <div class="flex-fill">
                            <x-metric-box
                                label="Дохід З ЗП"
                                :value="$income->amount"
                                currency="USD"
                            />
                        </div>
                        <div class="flex-fill">
                            <x-metric-box
                                label="Прибуток"
                                :value="$income->amount" {{-- Тут зазвичай інша змінна --}}
                                currency="USD"
                            />
                        </div>
                    </div>
                </x-slot:metricbox>

            </x-card>
        @endforeach

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
                            {{ date('d-m-Y')}} USD
                        </span>
                    </div>
                </x-slot:bodycard>

                <x-slot:metricbox>
                    <x-metric-box
                        :label="$income->title"
                        :value="$income->amount"
                        currency="USD"
                    />
                    <x-metric-box
                        :label="$income->title"
                        :value="$income->amount"
                        currency="USD"
                    />
                </x-slot:metricbox>

            </x-card>
        @endforeach

    </div>

@endsection
