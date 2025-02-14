{{-- resources/views/components/admin-page.blade.php --}}
@extends('layouts.admin-layout.layout')
@section('title')
    @lang($action).@lang('cruds.'.$model.'.'.$model)
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            @lang('cruds.'.$model.'.'.$model.'s')
        @endslot
        @slot('title')
            @lang('cruds.'.$model.'.'.$model)
        @endslot
        @slot('model')
            {{ $model }}
        @endslot
    @endcomponent

    <div class="row custome-template">
        <div class="col-12">
            {{ $slot }} {{-- This allows you to insert additional content --}}
        </div>
    </div>
@endsection
