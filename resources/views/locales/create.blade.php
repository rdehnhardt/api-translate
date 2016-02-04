@extends('layouts.app')

@section('page-title', trans('texts.locales'))

@section('page-actions')
    <a href="{{ route('locales.index') }}" class="btn btn-sm btn-default">
        <i class="fa fa-arrow-left"></i> {{ trans('texts.back') }}
    </a>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('texts.locales') }}</div>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'post', 'route' => ['locales.store']]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    {!! Form::openGroup('label', trans('texts.label')) !!}
                                    {!! Form::text('label', null, ['placeholder' => 'Portuguese']) !!}
                                    {!! Form::closeGroup() !!}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    {!! Form::openGroup('name', trans('texts.name')) !!}
                                    {!! Form::text('name', null, ['placeholder' => 'pt-BR']) !!}
                                    {!! Form::closeGroup() !!}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    {!! Form::openGroup('flag', trans('texts.flag')) !!}
                                    {!! Form::text('flag', null, ['placeholder' => 'brazil']) !!}
                                    {!! Form::closeGroup() !!}
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    {!! Form::openFormActions() !!}
                                    {!! Form::button('<i class="fa fa-floppy-o"></i> ' . trans('texts.save'), ['class' => 'btn btn-sm btn-primary form-action', 'type' => 'submit']) !!}
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
