/**
 * Created by Clif.Molina on 1/23/2017.
 */
/*jslint browser: true*/
/*global $, jQuery, console*/

(function ($, root, undefined) {
    'use strict';
    $(function () {


        $.roundNumber = function(num, scale) {
            var number = Math.round(num * Math.pow(10, scale)) / Math.pow(10, scale);
            if(num - number > 0) {
                return (number + Math.floor(2 * Math.round((num - number) * Math.pow(10, (scale + 1))) / 10) / Math.pow(10, scale));
            } else {
                return number;
            }
        };

        $.calculateBMR = function(female, weight, height, age) {
            return (female)?(4.35 * weight) + (4.7 * height) - (4.68 * age) - 655:(6.25 * weight) + (12.7 * height) - (6.76 * age) - 66;
        };

        $.isPositiveFloat = function(string) {
            return /^\+?[0-9]*\.?[0-9]+$/.test(string);
        };

        $.calculateBodyDensity = function(female, chest, abdominal, thigh, age, supraspinale, glutealCircumference, axilla, waist) {

            var Y = 0;

            if ( $.isPositiveFloat(chest) && $.isPositiveFloat(abdominal) && $.isPositiveFloat(thigh) )
            {

                // do 7-point if all data available
                if ( $.isPositiveFloat(axilla) && $.isPositiveFloat(tricep) && $.isPositiveFloat(supraspinale) && $.isPositiveFloat(subscapular) )
                {
                    Y = parseFloat(axilla) + parseFloat(chest) + parseFloat(tricep) + parseFloat(subscapular) + parseFloat(abdominal) + parseFloat(supraspinale) + parseFloat(thigh);
                    if ( female ) {
                        return $.roundNumber( 1.097 - (0.00046971  * Y) + (0.00000056 * (Y * Y)) - (0.00012828  * parseInt(age)), 2 );
                    }

                    return $.roundNumber( 1.112 - (0.00043499 * Y) + (0.00000055 * (Y*Y)) - (0.00028826 * parseInt(age)), 2 );
                }

                // do 3-point with girth if provided
                if ( $.isPositiveFloat(glutealCircumference) )
                {
                    // Girth version

                    if ( female ) {
                        // female 3-point w/ girth requires tricep, thigh, suprailiac, age and gluteal circumference
                        Y = parseFloat(tricep) + parseFloat(supraspinale) + parseFloat(thigh);
                        return $.roundNumber(1.1470292 - (0.0009376 * Y) + (0.0000030 * (Y * Y)) - (0.0001156 * parseInt(age) - (0.0005839 * glutealCircumference) ), 2)
                    }

                    // male 3-point w/ girth requires chest, abdomen, thigh, age, waist circumference, and forearm circumference
                    Y = parseFloat(chest) + parseFloat(abdominal) + parseFloat(thigh);
                    return $.roundNumber(1.0990750 - (0.0008209 * Y) + (0.0000026 * (Y * Y)) -  (0.0002017 * parseInt(age)) - (0.005675 * waist) + (0.018586 * forearm), 2 );
                }

                // Standard 3-point
                Y = parseFloat(chest) + parseFloat(abdominal) + parseFloat(thigh);
                return $.roundNumber( (female)?1.0994921 - (0.0009929 * Y) + (0.0000023 * (Y * Y)) - (0.0001392 * parseInt(age)):1.10938 - (0.0008267 * Y) + (0.0000016 * (Y * Y)) - (0.0002574 * parseInt(age)), 2);

            }
        };

        $.calculateBodyFat = function(female, abdominal, triceps, thigh, supraspinale, age) {
            var Y = parseFloat(abdominal) + parseFloat(triceps) + parseFloat(thigh) + parseFloat(supraspinale);
            return $.roundNumber(((female)?(0.41563 * Y) - (0.00112 * (Y * Y)) + (0.02963 * age) + 1.4072:(0.29288 * Y) - (0.0005 * (Y*Y)) + (0.15845 * age) - 5.76377), 2);
        };

        var chest = $('#chest'),
            abdominal = $('#abdominal'),
            glutealCircumference = $('#glutealCircumference'),
            thigh = $('#thigh'),
            tricep = $('#tricep'),
            subscapular = $('#subscapular'),
            supraspinale = $('#supraspinale'),
            forearm = $('#forearm'),
            axilla = $('#axilla'),
            waist = $('#waist'),
            age = $('#age'),
            calculateButton = $('button#calculate'),
            bdOutput = $('#body-density-value'),
            bfOutput = $('#body-fat-value'),
            female = $('#female'),
            Y,
            bodyDensity = 0,
            bodyFat = 0;


        calculateButton.on('click', function(e)  {
            e.stopPropagation();
            e.preventDefault();

            //Body Density
            if ( forearm.val().length && waist.val().length ) {
                // 3-site including Girth
                bdOutput.html($.calculateBodyDensity(female.val(), chest.val(), abdominal.val(), thigh.val(), glutealCircumference.val(), axilla.val(), waist.val()));
            } else {
                // 3-site
                Y = parseFloat(chest.val()) + parseFloat(abdominal.val()) + parseFloat(thigh.val());
                bdOutput.html(1.10938 - (0.0008267 * Y) + (0.0000016 * (Y * Y)) - (0.0002574 * parseInt(age.val())));
            }

            bdOutput.html(
                $.calculateBodyDensity(
                    female.val(),
                    chest.val(),
                    abdominal.val(),
                    thigh.val(),
                    age.val()
                )
            );


            //Body fat
            bfOutput.html(
                $.calculateBodyFat(
                    female.val(),
                    abdominal.val(),
                    tricep.val(),
                    thigh.val(),
                    supraspinale.val(),
                    age.val()
                )
            );
        });

    });
}(jQuery, this));
