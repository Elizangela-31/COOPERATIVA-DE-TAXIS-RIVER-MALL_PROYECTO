@if ($errors->any())
    <div class="alert alert-danger border-0 shadow-sm" role="alert">
        <div class="d-flex gap-3">
            <i class="bi bi-exclamation-octagon-fill fs-5"></i>
            <div>
                <strong>Revise la información ingresada</strong>
                <ul class="mb-0 mt-1 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
