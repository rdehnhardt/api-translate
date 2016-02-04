@extends('layouts.app')

@section('page-title', trans('texts.locales'))

@section('page-actions')
    <a href="{{ route('locales.create') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i> {{ trans('texts.add') }}
    </a>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('texts.locales-list') }}</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ trans('texts.language') }}</th>
                                    <th>{{ trans('texts.locale') }}</th>
                                    <th>{{ trans('texts.flag') }}</th>
                                    <th width="1%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                    <tr>
                                        <td>{{ $record->label }}</td>
                                        <td>{{ $record->name }}</td>
                                        <td>
                                            <div class="flag flag-icon-background flag-icon-{{ $record->flag }}"></div>
                                        </td>
                                        <td nowrap="nowrap">
                                            <a href="{{ route('locales.edit', ['id' => $record->id]) }}" class="btn btn-xs btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="text-right">
                    @include('pagination', ['paginator' => $records])
                </div>
            </div>
        </div>
    </div>
@endsection
