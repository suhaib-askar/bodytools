<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{

	public function index() {
		$exercises = Exercise::all();
		return view('exercise.index', compact('exercises'));
    }

	public function create() {
		return view('exercise.create');
	}


	public function show(Request $request) {
		$exercise = Exercise::firstOrFail($request->get('id'));
		return view('exercise.create', compact('exercise'));
	}


	public function store() {

	}

	public function update() {

	}
}
