@extends('app')

@section('stylesheets')

@endsection

@section('scripts')
    <script src="{{ asset('js/bodytools.js') }}"></script>
    {!! Charts::assets() !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default col-md-10 col-md-offset-1">
                {!! $weight_chart->render() !!}
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default col-md-10 col-md-offset-1">
                {!! $bmr_chart->render() !!}
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default col-md-10 col-md-offset-1">
                {!! $bodyfat_chart->render() !!}
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default col-md-10 col-md-offset-1">
                {!! $bodydensity_chart->render() !!}
            </div>
        </div>
    </div>
@endsection

@section('blocking-scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
