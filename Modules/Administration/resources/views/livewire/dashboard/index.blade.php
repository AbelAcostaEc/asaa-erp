@extends('templates.layout', ['html_tag_data' => [], 'title' => __('administration::layout.dashboard'), 'description' => '', 'menu' => 'dashboard', 'submenus' => 'dashboard'])

@section('breadcrumbs')
    <li class="breadcrumb-item">@lang('administration::layout.dashboard')</li>
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
    @livewire('administration::dashboard.dashboard')
@endsection
