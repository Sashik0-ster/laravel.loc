<div {{ $attributes->merge(['class' => 'card mb-3 border-1 shadow-sm']) }}>
    <div class="row g-0">

        @isset($img)
            <div class="col-md-3">
                {{ $img }}
            </div>
        @endisset

        <div class="{{ isset($img) ? 'col-md-7' : 'col-12' }}">
            <div class="card-body">

                <h5 class="card-title fw-bold">{{ $goal->title }}</h5>

                <p class="card-text text-secondary">
                    {{ $slot }}
                </p>

                @isset($footer)
                    <p class="card-text">
                        <small class="text-body-secondary">
                            {{ $footer }}
                        </small>
                    </p>
                @endisset

            </div>
        </div>

    </div>
</div>
