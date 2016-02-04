@extends('layouts.app')

@section('page-title', trans('texts.locales'))

@section('page-actions')
    {!! Form::open(['method' => 'get', 'route' => 'locales.index']) !!}
    {!! Form::button('<i class="fa fa-arrow-left"></i> ' . trans('texts.back'), ['type' => 'submit', 'class' => 'btn btn-default btn-sm']) !!}
    {!! Form::close() !!}

    {!! Form::open(['method' => 'delete', 'data-confirm' => 'You will not be able to recover this record!', 'route' => ['locales.destroy', $record->id]]) !!}
    {!! Form::button('<i class="fa fa-trash"></i> ' . trans('texts.remove'), ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('texts.locales') }}</div>

                    <div class="panel-body">
                        {!! Form::model($record, ['route' => ['locales.update', $record->id], 'method' => 'put']) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    {!! Form::openGroup('label', 'Label') !!}
                                    {!! Form::text('label', null, ['placeholder' => 'Portuguese']) !!}
                                    {!! Form::closeGroup() !!}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    {!! Form::openGroup('name', 'Name') !!}
                                    {!! Form::text('name', null, ['placeholder' => 'pt-BR']) !!}
                                    {!! Form::closeGroup() !!}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    {!! Form::openGroup('flag', 'Flag') !!}
                                    {!! Form::text('flag', null, ['placeholder' => 'brazil']) !!}
                                    {!! Form::closeGroup() !!}
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    {!! Form::openFormActions() !!}
                                    {!! Form::button('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-sm btn-primary form-action', 'type' => 'submit']) !!}
                                    {!! Form::closeFormActions() !!}
                            	</div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
