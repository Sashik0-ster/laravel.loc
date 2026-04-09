@props([
    'id',
    'title',
    'action',
])

<form action="{{ $action }}" method="post">
    @csrf
    <div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content custom-modal">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $title }}</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ $body }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Скасувати</button>
                    {{ $footer ?? '' }}
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
        <script>
            window.addEventListener('load', function () {
                new bootstrap.Modal(document.getElementById('{{ $id }}')).show();
            });
        </script>
    @endif
</form>
