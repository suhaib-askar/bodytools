@extends('app')

@section('stylesheets')

@endsection

@section('scripts')
@endsection

@section('content')
    <div class="container">

        <div class="columns">
            <div class="column">
                <div class="panel">
                    <div class="panel-heading">Exercise</div>
                    <div class="panel-block">
                        <div class="columns">
                            <div class="column">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Cardio</th>
                                        <th>Major Muscle Group</th>
                                        <th>Five-reptition Maximum</th>
                                    </tr>
                                    </thead>

                                <tbody>
                                    @foreach ( $exercises as $exercise )
                                        <tr>
                                            <td>{{ $exercise->name }}</td>
                                            <td>{{ $exercise->code }}</td>
                                            <td>{{ $exercise->type }}</td>
                                            <td>{{ $exercise->cardio }}</td>
                                            <td>{{ $exercise->major_muscle_group }}</td>
                                            <td>{{ $exercise->five_repetition_max }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
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