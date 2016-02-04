@extends('layouts.app')

@section('page-title', trans('texts.translations'))

@section('page-actions')
    <a href="{{ route('translates.index') }}" class="btn btn-sm btn-default">
        <i class="fa fa-arrow-left"></i> {{ trans('texts.back') }}
    </a>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form action="/translates/{{ $record->id }}" method="post">
                    {{ csrf_field() }}

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('texts.translate') }}</h3>
                        </div>
                        <div class="panel-body">
                            <p><strong>{{ trans('texts.text-translate') }}</strong>: {{ $record->key }}</p>

                            <hr />
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ $locale->label }} ({{ $locale->name }})</label>
                                    <textarea class="form-control" name="messages[{{ $locale->id }}]">{{ $locale->message($record) }}</textarea>
                                </div>
                            @endforeach

                            <button class="btn btn-sm btn-primary">
                                <i class="fa fa-floppy-o"></i> {{ trans('texts.save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
