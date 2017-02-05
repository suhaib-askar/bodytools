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

        <div class="column is-two-thirds">
            <div class="panel">
                <div class="panel-heading">Weight</div>
                <div class="panel-block">
                    <div class="columns is-mobile">
                        <div class="column is-full">
                            <label class="label">Trial #1</label>
                            <p class="control">
                                {!! Form::number('weight_1', isset($log)?$log->weight_1:null, ['class' => 'input', 'step' => '0.1']) !!}
                            </p>
                            <label class="label">Trial #2</label>
                            <p class="control">
                                {!! Form::number('weight_2', isset($log)?$log->weight_2:null, ['class' => 'input', 'step' => '0.1']) !!}
                            </p>
                            <label class="label">Trial #3</label>
                            <p class="control">
                                {!! Form::number('weight_3', isset($log)?$log->weight_3:null, ['class' => 'input', 'step' => '0.1']) !!}
                            </p>
                        </div>
                            <div class="column is-full">


                            <label class="label">Trial #4</label>
                            <p class="control">
                                {!! Form::number('weight_4', isset($log)?$log->weight_4:null, ['class' => 'input', 'step' => '0.1']) !!}
                            </p>
                            <label class="label">Trial #5</label>
                            <p class="control">
                                {!! Form::number('weight_5', isset($log)?$log->weight_5:null, ['class' => 'input', 'step' => '0.1']) !!}
                            </p>
                            <label class="label">&nbsp;</label>
                            {!! Form::submit('Save', ['class' => 'button is-primary is-outlined is-fullwidth']) !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="column">
            <div class="panel">
                <div class="panel-heading">Photos</div>
                <div class="panel-block">
                    <div class="columns">
                        <div class="column">
                            <label class="label">Front</label>
                            <p class="control">
                                {!! Form::file('photo_front', null, ['class' => 'input']) !!}
                            </p>
                            @if ( isset($log) && strlen($log->photo_front) )
                                <img src="{!! $log->photo_front !!}" />
                            @endif
                            <hr />
                            <label class="label">Side</label>
                            <p class="control">
                                {!! Form::file('photo_side', null, ['class' => 'input']) !!}
                            </p>

                            @if ( isset($log) && strlen($log->photo_side) )
                                <img src="{!! $log->photo_side !!}" />
                            @endif

                            {!! Form::submit('Save', ['class' => 'button is-primary is-outlined is-fullwidth']) !!}
                        </div>
                        <div class="column">


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        <div class="columns">
            <div class="column">
                <div class="panel">
                    <div class="panel-heading">Results</div>
                    <div class="panel-block">
                        <div class="columns is-mobile">
                            <div class="column is-full">
                                <label class="label">Body Density: </label>
                                <p id="body-density" class="control">
                                    <span class="col" id="body-density-value"></span>
                                </p>
                            </div>
                            <div class="column is-full">
                                <label class="label">Body Fat: </label>
                                <p id="body-fat" class="control">
                                    <span class="col" id="body-fat-value"></span>
                                </p>
                            </div>
                            <div class="column is-full">
                                <button id="calculate" class="button is-primary is-outlined is-fullwidth">Calculate</button>
                            </div>
                        </div>





                    </div>
                </div>
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
                                {!! Form::label('age', 'Age', ['class' => 'label', 'style' => 'text-align: right']) !!}
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