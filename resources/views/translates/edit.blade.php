@extends('layouts.app')

@section('page-title', trans('texts.translations'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ trans('texts.translate') }}</h3>
                    </div>
                    <div class="panel-body">
                        <p><strong>{{ trans('texts.text-translate') }}</strong>: {{ $record->key }}</p>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
