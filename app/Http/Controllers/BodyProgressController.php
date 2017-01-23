<?php

namespace App\Http\Controllers;

use App\BodyLogRecord;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class BodyProgressController extends Controller
{

	public function show() {
		$logs = BodyLogRecord::all();

		$labels = $values = $weight_1 = $weight_2 = $weight_3 = $weight_4 = $weight_5 = [];
		foreach ( $logs as $log ) {
			$labels[] = $log->created_at->format('m/d/Y');
			$values[] = $log->weight();
			$weight_1[] = $log->weight_1;
			$weight_2[] = $log->weight_2;
			$weight_3[] = $log->weight_3;
			$weight_4[] = $log->weight_4;
			$weight_5[] = $log->weight_5;
		}

		$chart = Charts::multi('line', 'highcharts')
			->title('Your Weight')
			->labels($labels)
			->dataset('First Trial', $weight_1)
			->dataset('Second Trial', $weight_2)
			->dataset('Third Trial', $weight_3)
			->dataset('Fourth Trial', $weight_4)
			->dataset('Fifth Trial', $weight_5)
			->dataset('Average', $values)
			->dimensions(1000,500)
			->responsive(false);

		return view('progress', compact('chart'));
    }
}
