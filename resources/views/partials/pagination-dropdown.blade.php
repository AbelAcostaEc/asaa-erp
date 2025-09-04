<div class="d-inline-block">
    <!-- Length Start -->
    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#dataServer" data-childSelector="span">
        <button class="btn p-0 shadow-sm" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
            <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Item Count">
                {{ $limit }} Items
            </span>
        </button>
        <div class="dropdown-menu shadow-sm dropdown-menu-end">
            <button class="dropdown-item @if ($limit == 10) active @endif" wire:click="pagination(10)">10 Items</button>
            <button class="dropdown-item @if ($limit == 25) active @endif" wire:click="pagination(25)">25 Items</button>
            <button class="dropdown-item @if ($limit == 50) active @endif" wire:click="pagination(50)">50 Items</button>
        </div>
    </div>
    <!-- Length End -->
</div>
