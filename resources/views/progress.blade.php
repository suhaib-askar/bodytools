@extends('app')

@section('stylesheets')

@endsection

@section('scripts')
    {!! Charts::assets() !!}
@endsection

@section('content')
    <div id="root" class="container">
        <h1 style="font-size: 2em; padding: 1em 0;">Progress Charts</h1>
        <tabs>
            <tab name="Weight" :selected="true">
                {!! $weight_chart->render() !!}
            </tab>
            <tab name="BMR">
                {!! $bmr_chart->render() !!}
            </tab>
            <tab name="Fat">
                {!! $bodyfat_chart->render() !!}
            </tab>
            <tab name="Density">
                {!! $bodydensity_chart->render() !!}
            </tab>
        </tabs>
    </div>
@endsection

@section('blocking-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            Highcharts.setOptions({
                global: {
                    useUTC: false
                },
                lang: {
                    decimalPoint: '.',
                    thousandsSep: ','
                }
            });
        });
    </script>
    <script src="{{ asset('js/myvues.js') }}"></script>
@endsection
