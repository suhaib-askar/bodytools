@extends('app')

@section('stylesheets')

@endsection

@section('scripts')
@endsection

@section('content')
    <div class="container">
        @if ( isset($exercise) )
            {{ Form::open(['route' => 'authenticated::exercise::update', 'method' => 'put', 'class' => 'form form-horizontal', 'files' => true]) }}
            {{ Form::hidden('exercise_id', $exercise->id) }}
        @else
            {{ Form::open(['route' => 'authenticated::exercise::store', 'method' => 'post', 'class' => 'form form-horizontal', 'files' => true]) }}
        @endif
        

        <div class="columns">
            <div class="column">
                <div class="panel">
                    <div class="panel-heading">Exercise</div>
                    <div class="panel-block">
                        <div class="columns">
                            <div class="column">
                                {{ Form::label('name', 'Name', ['class' => 'label']) }}
                                {{ Form::text('name', isset($exercise)?$exercise->name:'', ['class' => 'input', 'id' => 'name']) }}

                                {{ Form::label('code', 'Code', ['class' => 'label']) }}
                                {{ Form::text('code', isset($exercise)?$exercise->code:'', ['class' => 'input', 'id' => 'name']) }}

                                {{ Form::label('type', 'Type', ['class' => 'label']) }}
                                {{ Form::text('type', isset($exercise)?$exercise->type:'', ['class' => 'input', 'id' => 'name']) }}

                                {{ Form::label('cardio', 'Cardio', ['class' => 'label']) }}
                                {{ Form::text('cardio', isset($exercise)?$exercise->cardio:'', ['class' => 'input', 'id' => 'name']) }}

                                {{ Form::label('major_muscle_group', 'Major Muscle Group', ['class' => 'label']) }}
                                {{ Form::text('major_muscle_group', isset($exercise)?$exercise->major_muscle_group:'', ['class' => 'input', 'id' => 'name']) }}

                                {{ Form::label('five_reptition_max', 'Five Repetition Maximum', ['class' => 'label']) }}
                                {{ Form::text('five_reptition_max', isset($exercise)?$exercise->five_reptition_max:'', ['class' => 'input', 'id' => 'name']) }}



                                {{ Form::submit('Save', ['class' => 'button is-primary is-outlined is-fullwidth']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{ Form::close() }}
    </div>
@endsection

@section('blocking-scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection