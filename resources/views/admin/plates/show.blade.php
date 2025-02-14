@extends('layouts.admin-layout.layout')
@section('title')
    @lang('global.show') @lang('cruds.service.service')
@endsection
@section('css')
<style>
</style>
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            @lang('cruds.service.services')
        @endslot
        @slot('title')
            @lang('global.show') @lang('cruds.service.service')
        @endslot
        @slot('route')
            {{ route('admin.services.index') }}
        @endslot
    @endcomponent
    <div class="row custome-template">
        <div class="col-12">
            <div class="row mb-3">
                <div class="col d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-info fw-bold waves-effect waves-light d-flex align-items-center" style="width:100px">
                        <i class="uil-arrow-left me-2" style="font-size:18px"></i> @lang('global.back')
                    </a>
                </div>
            </div>
                    <div class="table-responsive">
                        <table class="custome-table table table-striped table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('global.key')</th>
                                    <th scope="col">@lang('global.value')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-nowrap" scope="row">@lang('cruds.service.id')</th>
                                    <td>{{ $service->id }}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">@lang('cruds.service.title')</th>
                                    <td>{{ $service->title }}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap" scope="row">@lang('cruds.service.description')</th>
                                    <td>{!! $service->description !!}</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('global.image')</th>
                                    <td><img src="{{ $service?->image?->url }}" alt="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

@section('script')
@endsection
