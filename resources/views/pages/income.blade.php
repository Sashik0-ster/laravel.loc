@extends('layout.index')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div class="d-flex gap-2 flex-wrap">
            <button type="button" class="btn btn-teal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Додати запис
            </button>
            <button type="button" class="btn btn-outline">Видалити запис</button>
        </div>
    </div>

    <x-modal id="staticBackdrop" title="Додати новий дохід" :action="route('incomes.create')">
        <x-slot:body>
            <div class="mb-3">
                <label class="form-label">Джерело доходу</label>
                <input type="text" name="title" class="form-control custom-input" placeholder="Наприклад: Продаж курсу">
                @error('title')
                <div class="text-danger small">{{ $message }}</div>
                @enderror
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
                    <div class="text-danger small">{{ $message }}</div>
                    @enderror
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
                <div class="text-danger small">{{ $message }}</div>
                @enderror
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

    {{-- CARDS --}}
    <div class="period-grid text-center mb-4">
        @foreach($incomes as $income)
            <x-card>
                <x-slot:header>
                    <h4 class="text-lg font-bold mb-2">{{ $income->title }}</h4>
                </x-slot:header>
                <x-slot:bodycard>
                    <span class="period-link">{{ $income->amount }} {{ $income->currency }}</span>
                    <span class="period-link">{{ $income->description }}</span>
                </x-slot:bodycard>
                <x-slot:metricbox>
                    <x-metric-box :label="$income->category" :value="$income->entry_date"/>
                </x-slot:metricbox>
            </x-card>
        @endforeach
    </div>

    {{-- SORT + PAGINATION --}}
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
            <select class="form-select form-select-sm" style="width: auto;">
                <option selected disabled>Категорія</option>
                <option value="all">Всі</option>
            </select>
        </div>
        <div>{{ $incomes->links() }}</div>
    </div>

    {{-- TABLE --}}
    <div class="row align-items-start g-3">
        <div class="col-12 col-md-8">
            <div class="table-responsive">
                <table class="table table-hover border border-info-subtle">
                    <thead>
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
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $allIncome->title }}</td>
                            <td>{{ $allIncome->amount }} {{ $allIncome->currency }}</td>
                            <td>{{ $allIncome->category }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="progress my-3" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar text-bg-success" style="width: 25%">25%</div>
            </div>
            <div class="progress my-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar text-bg-info" style="width: 50%">50%</div>
            </div>
            <div class="progress my-3" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar text-bg-danger" style="width: 70%">70%</div>
            </div>
            <ul class="list-group mt-3">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
        </div>
    </div>

@endsection
