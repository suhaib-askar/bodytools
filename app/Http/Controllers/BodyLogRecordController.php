<?php

namespace App\Http\Controllers;

use App\BodyLogRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BodyLogRecordController extends Controller
{

	public function __construct() {

	}

	public function create() {

		return view('body_log_record', compact('age'));
    }

	public function update(Request $request) {

		$this->validate($request, [
			'log_id' => 'required|numeric',
			'weight_1' => 'required|numeric',
			'weight_2' => 'required|numeric',
			'weight_3' => 'required|numeric',
			'weight_4' => 'required|numeric',
			'weight_5' => 'required|numeric',
			'photo_front' => 'mimetypes:image/jpg,image/jpeg,image/png',
			'photo_side' => 'mimetypes:image/jpg,image/jpeg,image/png'
		]);

		$log = BodyLogRecord::find($request->log_id);

		$log->weight_1 = $request->weight_1;
		$log->weight_2 = $request->weight_2;
		$log->weight_3 = $request->weight_3;
		$log->weight_4 = $request->weight_4;
		$log->weight_5 = $request->weight_5;

		$log->chest = is_null($request->chest)?null:$request->chest;
		$log->abdominal = $request->abdominal;
		$log->thigh = $request->thigh;
		$log->tricep = $request->tricep;
		$log->axilla = $request->axilla;
		$log->subscapular = $request->subscapular;
		$log->supraspinale = $request->supraspinale;
		$log->waist = $request->waist;
		$log->forearm = $request->forearm;


		if( strlen($request->photo_front) ) {
			$photo_front = $log->id. '-photo_front.' . $request->file('photo_front')->getClientOriginalExtension();

			$request->file('photo_front')->move(
				base_path() . '/public/images/log/', $photo_front
			);

			$log->photo_front = '/images/log/' . $photo_front;
		}

		if ( strlen($request->photo_side) ) {
			$photo_side = $log->id.'-photo_side.' . $request->file('photo_side')->getClientOriginalExtension();

			$request->file('photo_side')->move(
				base_path() . '/public/images/log/', $photo_side
			);

			$log->photo_side = '/images/log/' . $photo_side;
		}

		$log->save();

		Session::flash('success', 'Log entry updated.');

		return view('body_log_record', compact('log'));
    }

	public function show($id) {
		$log = BodyLogRecord::findOrFail($id);

		return view('body_log_record', compact('log'));
    }

	public function destroy($id) {

    }

	public function store(Request $request) {
		$this->validate($request, [
			'weight_1' => 'required|numeric',
			'weight_2' => 'required|numeric',
			'weight_3' => 'required|numeric',
			'weight_4' => 'required|numeric',
			'weight_5' => 'required|numeric',
			'photo_front' => 'mimetypes:image/jpg,image/jpeg,image/png',
			'photo_side' => 'mimetypes:image/jpg,image/jpeg,image/png',
			'chest' => 'numeric',
			'abdominal' => 'numeric',
			'thigh' => 'numeric',
			'tricep' => 'numeric',
			'axilla' => 'numeric',
			'subscapular' => 'numeric',
			'supraspinale' => 'numeric',
			'waist' => 'numeric',
			'forearm' => 'numeric',
			'age' => 'numeric'
		]);

		$log = BodyLogRecord::create([
			'weight_1' => $request->weight_1,
			'weight_2' => $request->weight_2,
			'weight_3' => $request->weight_3,
			'weight_4' => $request->weight_4,
			'weight_5' => $request->weight_5,
			'chest' => $request->chest,
			'abdominal' => $request->abdominal,
			'thigh' => $request->thigh,
			'tricep' => $request->tricep,
			'axilla' => $request->axilla,
			'subscapular' => $request->subscapular,
			'supraspinale' => $request->supraspinale,
			'waist' => $request->waist,
			'forearm' => $request->forearm,
			'age' => $request->age
		]);

		if( strlen($request->photo_front) )	{
			$photo_front = $log->id.'photo_front.' . $request->file('photo_front')->getClientOriginalExtension();
			$request->file('photo_front')->move(
				base_path() . '/public/images/log/', $photo_front
			);

			$log->photo_front = '/images/log/'.$photo_front;
		}

		if ( strlen($request->photo_side) ) {
			$photo_side = $log->id.'photo_side.' . $request->file('photo_side')->getClientOriginalExtension();
			$request->file('photo_side')->move(
				base_path() . '/public/images/log/', $photo_side
			);

			$log->photo_side = '/images/log/'.$photo_side;
		}

		$log->save();

		Session::flash('success', 'Log entry created.');

		return view('body_log_record', compact('log'));
    }
}
