@extends('layout.index')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div class="d-flex gap-2 flex-wrap">
            <button type="button" class="btn btn-teal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Додати запис
            </button>
            <button type="button" class="btn btn-outline" id="deleteIncomes">Видалити запис</button>
        </div>
    </div>

    {{-- Modal Component --}}
    <x-modal id="staticBackdrop" title="Додати новий дохід" :action="route('incomes.create')">
        <x-slot:body>
            <div class="mb-3">
                <label class="form-label">Джерело доходу</label>
                <input type="text" name="title" class="form-control custom-input" placeholder="Наприклад: Продаж курсу">
                @error('title')
                <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Категорія</label>
                <select name="category" class="form-select custom-input">
                    <option value="Навчання">Навчання</option>
                    <option value="Консультації">Консультації</option>
                    <option value="Інше">Інше</option>
                </select>
            </div>

            <div class="row">
                <div class="col-8 mb-3">
                    <label class="form-label">Сума</label>
                    <input type="number" step="0.01" name="amount" class="form-control custom-input" placeholder="0.00">
                    @error('amount')
                    <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <div class="col-4 mb-3">
                    <label class="form-label">Валюта</label>
                    <select name="currency" class="form-select custom-input">
                        <option value="USD">USD</option>
                        <option value="PLN">PLN</option>
                        <option value="UAH">UAH</option>
                        <option value="EUR">EUR</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Дата отримання</label>
                <input type="date" name="entry_date" class="form-control custom-input" value="{{ date('Y-m-d') }}">
                @error('entry_date')
                <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Опис (необов'язково)</label>
                <textarea name="description" class="form-control custom-input" rows="2"></textarea>
            </div>
        </x-slot:body>

        <x-slot:footer>
            <button type="submit" class="btn btn-teal">Зберегти запис</button>
        </x-slot:footer>
    </x-modal>

    {{-- Cards Section --}}
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
                            <p class="period-link mb-0 text-truncate" title="{{ $income->description }}">
                                {{ $income->description }}
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

    {{-- Pagination for Cards --}}
    <div class="col-12 d-flex justify-content-center justify-content-md-start mb-4">
        {{ $incomes->appends(request()->all())->links('pagination::bootstrap-5') }}
    </div>

    {{-- Sorting (UX Only for now) --}}
    <div class="d-flex justify-content-between align-items-center mt-2 mb-4 flex-wrap gap-3">
        <div class="d-flex flex-wrap align-items-center gap-2">
            <span class="text-muted small fw-bold">Сортувати:</span>
            <select class="form-select form-select-sm" style="width: auto;">
                <option selected disabled>Дата</option>
                <option value="new">Спочатку нові</option>
                <option value="old">Спочатку старі</option>
            </select>
            <select class="form-select form-select-sm" style="width: auto;">
                <option selected disabled>Сума</option>
                <option value="desc">Найбільша</option>
                <option value="asc">Найменша</option>
            </select>
        </div>
    </div>

    {{-- Table + Analytics Section --}}
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
