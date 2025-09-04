@extends('templates.layout', ['html_tag_data' => [], 'title' => 'Tipo de Deuda', 'description' => '', 'menu' => 'administration', 'submenu' => 'debt_type'])

@section('breadcrumbs')
    <li class="breadcrumb-item">@lang('inventory::layout.inventory')</li>
    <li class="breadcrumb-item"><a href="{{ route('inventory.categories') }}">@lang('inventory::layout.categories')</a></li>
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
    @livewire('inventory::category.category')
@endsection
