@extends('app')

@section('header')
    <h1>JACKSON-POLLOCK FORMULAE</h1>
    <h2>3-SITE SKINFOLD BODY DENSITY FORMULA</h2>
@endsection

@section('content')

    <div class="row">
        <h3>Men</h3>
        <div class="col">
            <label for="chest">Chest Skinfold (mm)</label>
            <input id="chest" name="chest" type="number" />
        </div>
        <div class="col">
            <label for="abdominal">Abdominal Skinfold (mm)</label>
            <input id="abdominal" name="abdominal" type="number" />
        </div>
        <div class="col">
            <label for="thigh">Thigh Skinfold (mm)</label>
            <input id="thigh" name="thigh" type="number" />
        </div>
        <div class="col">
            <label for="supraspinale">SupraSpinale (mm)</label>
            <input id="supraspinale" name="supraspinale" type="number" />
        </div>
        <div class="col">
            <label for="age">Age (years)</label>
            <input id="age" name="age" type="number" />
        </div>
        <div class="col">
            <button id="calculate">Calculate</button>
        </div>
    </div>
    <div class="row">
        <p>
            <strong>Body Density: </strong>
            <span class="col" id="bodyDensity">

            </span>
        </p>
        <p>
            <strong>Basal Metabolic Rate: </strong>
            <span class="col" id="basalMetabolcRate">

            </span>
        </p>
    </div>
@endsection

@section('blocking-scripts')

    <script type="text/javascript">
        $(document).ready(function() {
            var chest = $('#chest'),
                abdominal = $('#abdominal'),
                thigh = $('#thigh'),
                calculateButton = $('button#calculate'),
                age = $('#age'),
                bdOutput = $('#bodyDensity'),
                bmrOutput = $('#basalMetabolcRate'),
                Y,
                bodyDensity = 0;



            calculateButton.on('click', function(e)  {
                e.stopPropagation();
                e.preventDefault();



                Y = parseFloat(chest.val()) + parseFloat(abdominal.val()) + parseFloat(thigh.val());

                bodyDensity = 1.10938 - (0.0008267 * Y) + (0.0000016 * (Y * Y)) - (0.0002574 * parseInt(age.val()));

                bdOutput.html(bodyDensity);
            })

        });
    </script>
@endsection