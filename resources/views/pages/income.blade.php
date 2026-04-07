@extends('layout.index')

@section('content')

    <div class="d-flex justify-content-between ">
        <div class="d-flex flex-row mb-2 align-items-center">
            <label for="sort">Сортувати: </label>
            <div class="p-2">
                <select class="form-select form-select-sm" aria-label="Small select example">
                    <option selected>дата</option>
                    <option value="1">нові</option>
                    <option value="2">старі</option>
                    <option value="3">всі</option>
                </select>
            </div>
            <div class="p-2">
                <select class="form-select form-select-sm" aria-label="Small select example">
                    <option selected>сума</option>
                    <option value="1">най більша</option>
                    <option value="2">най меньша</option>
                    <option value="3">всі</option>
                </select>
            </div>
            <div class="p-2">
                <select class="form-select form-select-sm" aria-label="Small select example">
                    <option selected>сума</option>
                    <option value="1">най більша</option>
                    <option value="2">най меньша</option>
                    <option value="3">всі</option>
                </select>
            </div>
        </div>
        <div class="d-flex flex-row mb-3">
            <div class="p-2">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Додати запис
                </button>
                <!-- Modal -->
                <form action="{{route('incomes.create')}}" method="post">
                    @csrf
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content custom-modal">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Додати новий дохід</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">Джерело доходу</label>
                                        <input type="text" name="title" class="form-control custom-input"
                                               placeholder="Наприклад: Продаж курсу">
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
                                        <div class="col-md-8 mb-3">
                                            <label class="form-label">Сума</label>
                                            <input type="number" step="0.01" name="amount"
                                                   class="form-control custom-input" placeholder="0.00">
                                            @error('amount')
                                            <div class="text-danger small">{{ $message }}</div> @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Валюта</label>
                                            <select name="currency" class="form-select custom-input">
                                                <option value="USD">USD</option>
                                                <option value="USD">PLN</option>
                                                <option value="UAH">UAH</option>
                                                <option value="EUR">EUR</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Дата отримання</label>
                                        <input type="date" name="entry_date" class="form-control custom-input"
                                               value="{{ date('Y-m-d') }}">
                                        @error('entry_date')
                                        <div class="text-danger small">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Опис (необов'язково)</label>
                                        <textarea name="description" class="form-control custom-input"
                                                  rows="2"></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Скасувати
                                    </button>
                                    <button type="submit" class="btn btn-teal">Зберегти запис</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-2">
                <button type="button" class="btn btn-secondary btn-sm">Видалити запис</button>
            </div>
        </div>
    </div>


    <div>
        <div class="period-grid text-center ">
            @foreach($incomes as $income)
                <x-card>
                    <x-slot:header>
                        <h4 class="text-lg font-bold mb-2">{{ $income->title }}</h4>
                    </x-slot:header>

                    <x-slot:bodycard>
                        <div class="period-links flex justify-between">
                        <span class="period-link">
                            {{ $income->amount}}   {{$income->currency}}
                        </span>
                            <span class="period-link">
                            {{ $income->description}}
                        </span>
                        </div>
                    </x-slot:bodycard>
                    <x-slot:metricbox>
                        <x-metric-box
                            :label="$income->category"
                            :value="$income->entry_date"
                        />
                    </x-slot:metricbox>
                </x-card>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            {{ $incomes->links() }}
        </div>
    </div>

@endsection
