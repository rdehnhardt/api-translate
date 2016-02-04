@extends('layouts.app')

@section('page-title', trans('texts.translations'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ trans('texts.translations-list') }}</h3>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ request('q') }}" name="q" placeholder="{{ trans('texts.search') }}" />
                            </div>
                        </form>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('texts.text') }}</th>
                                <th width="1%">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($records as $record)
                                <tr>
                                    <td>{{ $record->key }}</td>
                                    <td nowrap="nowrap">
                                        <a href="{{ route('translates.edit', ['id' => $record->id]) }}" class="btn btn-xs btn-primary">
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
