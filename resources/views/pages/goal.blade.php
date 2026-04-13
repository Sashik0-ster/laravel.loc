@extends('layout.index')

@section('content')

    <div class="d-ms-block ms-auto">

        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div class="d-flex gap-2 flex-wrap">
                <button type="button" class="btn btn-teal" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Додати ціль
                </button>
                <button type="button" class="btn btn-outline" id="deleteButton">Редагувати цілі</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-6  ">
                <h5>Цілі</h5>
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide flex justify-content-center">

                    <div class="carousel-indicators">
                        @foreach($goalsActive as $goalActive)
                            <button type="button"
                                    data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"
                                    {{ $loop->first ? 'aria-current=true' : '' }}
                                    aria-label="Slide {{ $loop->iteration }}">
                            </button>
                        @endforeach
                    </div>

                    <div class="carousel-inner">
                        @foreach($goalsActive as $goalActive)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} ">
                                <x-goals-card :goal="$goalActive">

                                    <x-slot:img>
                                        <img src="https://picsum.photos/200/200?random=2"
                                             class="rounded mx-auto d-block"
                                             alt="Goal {{ $loop->iteration }}">
                                    </x-slot:img>

                                    <x-slot:footer>
                                        Дедлайн: <b
                                            class="text-danger"> {{ $goalActive->deadline->format('d.m.Y') }}</b> •
                                        Статус: <b class="text-success">  {{ $goalActive->status }}</b>
                                    </x-slot:footer>

                                    <p class="card-text"
                                       style="height: 4.5em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        {{ $goalActive->description }}
                                    </p>

                                    <div class="progress mb-3">
                                        <div class="progress-bar" style="width: {{ $goalActive->progressPercent() }}%">
                                            {{ $goalActive->progressPercent() }}%
                                        </div>
                                    </div>

                                    <small class="btn-teal rounded-1 p-1 text-black">
                                        <i> Зібрано: {{ $goalActive->collected_amount }} {{ $goalActive->currency }}</i>
                                        <i> з {{ $goalActive->target_amount }} {{ $goalActive->currency }}</i>
                                    </small>

                                </x-goals-card>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
            <div class="col-12 col-xl-6  ">
                <h5>Виконані цілі</h5>
                <div id="completedGoalsCarousel" class="carousel carousel-dark slide flex justify-content-center">

                    <div class="carousel-indicators">
                        @foreach($goalsCompleted as $goalCompleted)
                            <button type="button"
                                    data-bs-target="completedGoalsCarousel"
                                    data-bs-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->first ? 'active' : '' }}"
                                    {{ $loop->first ? 'aria-current=true' : '' }}
                                    aria-label="Slide {{ $loop->iteration }}">
                            </button>
                        @endforeach
                    </div>

                    <div class="carousel-inner">
                        @foreach($goalsCompleted as $goalCompleted)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }} ">
                                <x-goals-card :goal="$goalCompleted">

                                    <x-slot:img>
                                        <img src="https://picsum.photos/200/200?random=1"
                                             class="rounded mx-auto d-block"
                                             alt="Goal {{ $loop->iteration }}">
                                    </x-slot:img>

                                    <x-slot:footer>
                                        Статус: <b class="text-info">{{ $goalCompleted->status }}</b>
                                    </x-slot:footer>

                                    <p class="card-text"
                                       style="height: 4.5em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                        {{ $goalCompleted->description }}
                                    </p>

                                    <div class="progress mb-3">
                                        <div class="progress-bar"
                                             style="width: {{ $goalCompleted->progressPercent() }}%">
                                            {{ $goalCompleted->progressPercent() }}%
                                        </div>
                                    </div>

                                    <small class="btn-teal rounded-1 p-1 text-black">
                                        <i>
                                            Зібрано: {{ $goalCompleted->collected_amount }} {{ $goalCompleted->currency }}</i>
                                        <i> з {{ $goalCompleted->target_amount }} {{ $goalCompleted->currency }}</i>
                                    </small>

                                </x-goals-card>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#completedGoalsCarousel"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#completedGoalsCarousel"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </div>

    </div>

    <x-modal id="staticBackdrop" title="Додати ціль" action="{{ route('goals.store') }}">

        <x-slot:body>

            <div class="mb-3">
                <label for="title" class="form-label">Назва цілі</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="title" name="title" value="{{ old('title') }}"
                       placeholder="Наприклад: Новий ноутбук">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Опис</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="description" name="description" rows="3"
                          placeholder="Короткий опис цілі">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-8 mb-3">
                    <label class="form-label" for="target_amount">Потрібна сума</label>
                    <input type="number" class="form-control @error('target_amount') is-invalid @enderror"
                           id="target_amount" name="target_amount" value="{{ old('target_amount') }}"
                           placeholder="0.00" step="0.01" min="0">
                    @error('target_amount')
                    <div class="invalid-feedback">{{ $message }}</div>
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
                <label for="collected_amount" class="form-label">Вже зібрано</label>
                <input type="number" class="form-control @error('collected_amount') is-invalid @enderror"
                       id="collected_amount" name="collected_amount" value="{{ old('collected_amount') }}"
                       placeholder="0.00" step="0.01" min="0">
                @error('collected_amount')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Дедлайн</label>
                <input type="date" class="form-control @error('deadline') is-invalid @enderror"
                       id="deadline" name="deadline" value="{{ old('deadline') }}">
                @error('deadline')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


        </x-slot:body>

        <x-slot:footer>
            <button type="submit" class="btn btn-teal">Зберегти</button>
        </x-slot:footer>

    </x-modal>

@endsection
