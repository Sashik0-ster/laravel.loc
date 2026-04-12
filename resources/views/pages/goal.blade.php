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

        <div id="carouselExampleIndicators" class="carousel carousel-dark slide ">

            <div class="carousel-indicators">
                @foreach($goals as $goal)
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
                @foreach($goals as $goal)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} ">
                        <x-goals-card :goal="$goal" class="justify-content-center">

                            <x-slot:img>
                                <img src="https://picsum.photos/200/200" class="rounded mx-auto d-block"
                                     alt="Goal {{ $loop->iteration }}">
                            </x-slot:img>

                            <x-slot:footer>
                                Дедлайн: {{ $goal->deadline->format('d.m.Y') }} •
                                Статус: {{ $goal->status }}
                            </x-slot:footer>

                            <p>{{ $goal->description }}</p>

                            <div class="progress mb-2">
                                <div class="progress-bar" style="width: {{ $goal->progressPercent() }}%">
                                    {{ $goal->progressPercent() }}%
                                </div>
                            </div>

                            <small>
                                Зібрано: {{ $goal->collected_amount }} грн
                                з {{ $goal->target_amount }} грн
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

    <x-modal id="staticBackdrop" title="Додати ціль" action="{{ route('goals.create') }}">

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

            <div class="mb-3">
                <label for="target_amount" class="form-label">Потрібна сума (грн)</label>
                <input type="number" class="form-control @error('target_amount') is-invalid @enderror"
                       id="target_amount" name="target_amount" value="{{ old('target_amount') }}"
                       placeholder="0.00" step="0.01" min="0">
                @error('target_amount')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="collected_amount" class="form-label">Вже зібрано (грн)</label>
                <input type="number" class="form-control @error('collected_amount') is-invalid @enderror"
                       id="collected_amount" name="collected_amount" value="{{ old('collected_amount', 0) }}"
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
