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
            <div class="col-md-8 col-md-offset-2">
                {!! $chart->render() !!}
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
