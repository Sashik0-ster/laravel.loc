@extends('layout.index')

@section('content')

    <div class="mb-4">

    </div>

    <div class="container-fluid text-center m-1">
        <div class="row align-items-stretch m-3"> {{-- Використовуйте stretch для однакової висоти --}}
            @foreach($incomes as $income)
                <div class="col-12 col-md-6 col-xl-3 mb-3">
                    <x-card class="h-100">
                        <x-slot:close>
                            <div class="d-flex justify-content-end">
                                <button class="metric-value ms-auto d-none" data-close data-id="{{ $income->id }}">✕
                                </button>
                            </div>
                        </x-slot:close>

                        <x-slot:header>
                            <h4 class="text-lg font-bold mb-2 text-truncate">{{ $income->title }}</h4>
                        </x-slot:header>

                        <x-slot:bodycard>
                            <p class="period-link mb-1">
                                <strong>{{ number_format($income->amount, 2) }}</strong> {{ $income->currency }}
                            </p>
                        </x-slot:bodycard>

                        <x-slot:metricbox>
                            <x-metric-box :label="$income->category" :value="$income->entry_date"/>
                        </x-slot:metricbox>
                    </x-card>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid g-3">
        <div class="row align-items-start">
            {{-- Main Table --}}
            <div class="col-12 col-md-8">
                <div class="table-responsive card p-3 shadow-sm">
                    <table class="table table-hover">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Назва</th>
                            <th>Сума</th>
                            <th>Категорія</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allIncomes as $allIncome)
                            <tr>
                                <th>{{ ($allIncomes->currentPage() - 1) * $allIncomes->perPage() + $loop->iteration }}</th>
                                <td>{{ $allIncome->title }}</td>
                                <td>
                                    <strong>{{ number_format($allIncome->amount, 2, '.', ' ') }}</strong> {{ $allIncome->currency }}
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $allIncome->category }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-3 d-flex justify-content-center">
                        {{ $allIncomes->appends(request()->all())->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card p-3 shadow-sm border-0">
                    <h5 class="mb-3 fw-bold">Прогрес за категоріями</h5>

                    <div class="progress my-3" style="height: 12px;">
                        <div class="progress-bar bg-teal" style="width: 25%"></div>
                    </div>
                    <div class="progress my-3" style="height: 12px;">
                        <div class="progress-bar bg-info" style="width: 50%"></div>
                    </div>

                    <ul class="list-group list-group-flush mt-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Основний дохід
                            <span class="badge bg-primary rounded-pill">12</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
