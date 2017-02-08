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
                    <div class="panel-heading">Your Progress Logs</div>
                    <div class="panel-block">
                        <table class="table is-striped">
                            <thead>
                                <tr>
                                    <th>Weight</th>
                                    <th>BMR</th>
                                    <th>Recorded</th>
                                    <th style="text-align: center;">&mdash;</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $logs as $key => $log )
                                <tr>
                                    <td>{!! $log->weight() !!}</td>
                                    <td>{!! $log->basalMetabolicRate() !!}</td>
                                    <td>{!! $log->created_at !!}</td>
                                    <td style="text-align: center;">
                                        <a class="button is-warning is-outlined" href="/log/{!! $log->id !!}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button class="button is-danger is-outlined" href="#">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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