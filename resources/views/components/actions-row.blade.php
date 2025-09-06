<div class="dropdown dropstart">
    <button class="btn btn-outline btn-outline-primary pe-2 ps-3"
            type="button"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
        @lang('layout.actions')
        <i class="bi bi-chevron-down"></i>
    </button>
    <div class="dropdown-menu">
        {{ $slot }}
    </div>
</div>
