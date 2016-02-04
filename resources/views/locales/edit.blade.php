@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Locales</div>

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
                                    {!! Form::button('<i class="fa fa-floppy-o"></i> Save', ['class' => 'btn btn-primary form-action', 'type' => 'submit']) !!}
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
