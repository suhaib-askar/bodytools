@extends('app')

@section('stylesheets')

@endsection

@section('scripts')
    <script src="{{ asset('js/bodytools.js') }}"></script>
@endsection

@section('content')
<div class="container">
    @if ( isset($log) )
        {!! Form::open(['route' => 'authenticated::log.update', 'method' => 'put', 'class' => 'form form-horizontal', 'files' => true]) !!}
        {!! Form::hidden('log_id', $log->id) !!}
    @else
        {!! Form::open(['route' => 'authenticated::log.store', 'method' => 'post', 'class' => 'form form-horizontal', 'files' => true]) !!}
    @endif
    {!! Form::hidden('female', Auth::user()->female, ['id' => 'female'] ) !!}

    <div class="columns">
        <div class="column">
            <div class="panel">
                <div class="panel-heading">Weight</div>
                <div class="panel-block">
                        {!! Form::label('weight_1', 'Weight Trial #1', ['class' => 'label', 'style' => 'text-align: right']) !!}
                        {!! Form::number('weight_1', isset($log)?$log->weight_1:null, ['class' => 'input']) !!}

                        {!! Form::label('weight_2', 'Weight Trial #2', ['class' => 'label', 'style' => 'text-align: right']) !!}
                        {!! Form::number('weight_2', isset($log)?$log->weight_2:null, ['class' => 'input']) !!}

                        {!! Form::label('weight_3', 'Weight Trial #3', ['class' => 'label', 'style' => 'text-align: right']) !!}
                        {!! Form::number('weight_3', isset($log)?$log->weight_3:null, ['class' => 'input']) !!}

                        {!! Form::label('weight_4', 'Weight Trial #4', ['class' => 'label', 'style' => 'text-align: right']) !!}
                        {!! Form::number('weight_4', isset($log)?$log->weight_4:null, ['class' => 'input']) !!}

                        {!! Form::label('weight_5', 'Weight Trial #5', ['class' => 'label', 'style' => 'text-align: right']) !!}
                        {!! Form::number('weight_5', isset($log)?$log->weight_5:null, ['class' => 'input']) !!}
                <div class="panel-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">Photos</div>
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('photo_front', 'Photo Front', ['class' => 'label', 'style' => 'text-align: right']) !!}
                        {!! Form::file('photo_front', null, ['class' => 'input']) !!}
                        @if ( isset($log) && strlen($log->photo_front) )
                            <img src="{!! $log->photo_front !!}" />
                        @endif
                    </div>

                    <div class="row form-group">
                        {!! Form::label('photo_side', 'Photo Side', ['class' => 'label', 'style' => 'text-align: right']) !!}
                        {!! Form::file('photo_side', null, ['class' => 'input']) !!}
                        @if ( isset($log) && strlen($log->photo_side) )
                            <img src="{!! $log->photo_side !!}" />
                        @endif
                    </div>
                </div>
                <div class="panel-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">Results</div>
                <div class="form-group">

                </div>
                <div class="row">
                    <p id="body-density">
                        <strong>Body Density: </strong>
                        <span class="col" id="body-density-value">

                    </span>
                    </p>
                    <p id="body-fat">
                        <strong>Body Fat: </strong>
                        <span class="col" id="body-fat-value">

                    </span>
                    </p>
                </div>
                <div class="panel-footer">
                    <button id="calculate" class="btn btn-primary pull-right">Calculate</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="panel">
                <div class="panel-heading">Composition</div>
                <div class="panel-block">
                    <div class="body-composition-container">
                <div class="form-group">
                    {!! Form::label('chest', 'Chest Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('chest', isset($log)?$log->chest:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('tricep', 'Tricep Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('tricep', isset($log)?$log->tricep:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('abdominal', 'Abdominal Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('abdominal', isset($log)?$log->abdominal:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('thigh', 'Thigh Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('thigh', isset($log)?$log->thigh:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('supraspinale', 'Supraspinale Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('supraspinale', isset($log)?$log->supraspinale:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('subscapular', 'Subscapular Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('subscapular', isset($log)?$log->subscapular:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('axilla', 'Axilla Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('axilla', isset($log)?$log->axilla:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('waist', 'Waist Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('waist', isset($log)?$log->waist:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('forearm', 'Forearm Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('forearm', isset($log)?$log->forearm:null, ['class' => 'input']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('age', 'Age Skinfold (mm)', ['class' => 'label', 'style' => 'text-align: right']) !!}
                    <div class="col-md-6">
                        {!! Form::number('age', isset($log)?$log->age:Auth::user()->age, ['class' => 'input']) !!}
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
        {!! Form::close() !!}
</div>
@endsection

@section('blocking-scripts')
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
@endsection