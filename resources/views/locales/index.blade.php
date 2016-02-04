@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
        	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="pull-left">Locales</h1>

                <a href="{{ route('locales.create') }}" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i>
                    Add
                </a>
        	</div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Locales</div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Language</th>
                                    <th>Locale</th>
                                    <th>Flag</th>
                                    <th width="1%">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                    <tr>
                                        <td>{{ $record->label }}</td>
                                        <td>{{ $record->name }}</td>
                                        <td>{{ $record->flag }}</td>
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

                        <div class="">
                            {{ $records->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
