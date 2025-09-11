@extends('templates.layout', ['html_tag_data' => [], 'title' => __('inventory::layout.products'), 'description' => '', 'menu' => 'inventory', 'submenu' => 'product'])

@section('titleSite', __('inventory::layout.products'))

@section('breadcrumbs')
    <li class="breadcrumb-item">@lang('inventory::layout.inventory')</li>
    <li class="breadcrumb-item"><a href="{{ route('inventory.products') }}">@lang('inventory::layout.products')</a></li>
@endsection

@section('css')
@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('hideModal', () => {
                $('#formModal').modal('hide');
            });
        });
    </script>
@endsection

@section('content')
    @livewire('inventory::product.product')
@endsection
