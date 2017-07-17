@forelse ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
        >
                <span aria-hidden="true">&times;</span>
        </button>

        <ul class="list-unstyled">
            <li>{{ $error }}</li>
        </ul>
    </div>
@empty
@endforelse

