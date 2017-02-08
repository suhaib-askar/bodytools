<?php

namespace App\Http\Controllers;

use App\BodyLogRecord;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BodyProgressController extends Controller
{

	public function show() {
		$logs = BodyLogRecord::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'asc')->get();

		$labels = $values = [];
		$labels['bodydensity'] = [];
		$values['bodydensity'] = [];

		$labels['bodyfat'] = [];
		$values['bodyfat'] = [];
		$labels['weight'] = [];
		$labels['bmr'] = [];
		foreach ( $logs as $log ) {
			$labels['weight'][] = $log->created_at->format('m/d/Y');
			$values['weight'][] = $log->weight();

			if ( ! is_null($log->bodyDensity()) ) {
				$labels['bodydensity'][] = $log->created_at->format('m/d/Y');
				$values['bodydensity'][] = $log->bodyDensity();
			}

			if ( ! is_null($log->bodyFat()) ) {
				$labels['bodyfat'][] = $log->created_at->format( 'm/d/Y' );
				$values['bodyfat'][] = $log->bodyFat();
			}

			$labels['bmr'][] = $log->created_at->format('m/d/Y');
			$values['bmr'][] = $log->basalMetabolicRate();
		}

		$weight_chart = Charts::multi('line', 'highcharts')
			->title('Weight')
			->labels($labels['weight'])
			->dataset('Weight', $values['weight'])
			->responsive(true);


		$bodyfat_chart = Charts::multi('line', 'highcharts')
		                      ->title('% Bodyfat')
		                      ->labels($labels['bodyfat'])
		                      ->dataset('% Body Fat', $values['bodyfat'])
		                      ->responsive(true);

		$bmr_chart = Charts::multi('line', 'highcharts')
		                      ->title('Basal Metabolic Rate (BMR)')
		                      ->labels($labels['bmr'])
		                      ->dataset('BMR', $values['bmr'])
		                      ->responsive(true);

		$bodydensity_chart = Charts::multi('line', 'highcharts')
		                      ->title('Body Density')
		                      ->labels($labels['bodydensity'])
		                      ->dataset('Body Density', $values['bodydensity'])
		                      ->responsive(true);

		return view('progress', compact('weight_chart', 'bodyfat_chart', 'bodydensity_chart', 'bmr_chart'));
    }
}
