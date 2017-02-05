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

        $.calculateBodyDensity = function(female, chest, abdominal, thigh, age) {

            var Y = parseFloat(chest) + parseFloat(abdominal) + parseFloat(thigh);
            return $.roundNumber( ((female)?1.0994921 - (0.0009929 * Y) + (0.0000023 * (Y * Y)) - (0.0001392 * parseInt(age)):1.10938 - (0.0008267 * Y) + (0.0000016 * (Y * Y)) - (0.0002574 * parseInt(age))), 2);
        };

        $.calculateBodyFat = function(female, abdominal, triceps, thigh, supraspinale, age) {
            var Y = parseFloat(abdominal) + parseFloat(triceps) + parseFloat(thigh) + parseFloat(supraspinale);
            return $.roundNumber(((female)?(0.41563 * Y) - (0.00112 * (Y * Y)) + (0.02963 * age) + 1.4072:(0.29288 * Y) - (0.0005 * (Y*Y)) + (0.15845 * age) - 5.76377), 2);
        };

        var chest = $('#chest'),
            abdominal = $('#abdominal'),
            thigh = $('#thigh'),
            tricep = $('#tricep'),
            subscapular = $('#subscapular'),
            supraspinale = $('#supraspinale'),
            forearm = $('#forearm'),
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
                bdOutput.html($.calculateBodyDensity(female.val(), chest.val(), abdominal.val(), thigh.val()));
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
