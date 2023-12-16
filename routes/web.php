<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request, \App\DataTables\AccountDataTable $dataTable) {
    
    if ($request->ajax()) {
        $data =  DB::table('accounts')->select('id', 'name', 'code', 'type', 'hasPrice')->get();
        return $dataTable::of($data)
                ->addIndexColumn()
                ->make(true);
    }

    return $dataTable->render('welcome');

    // return $dataTable->render('welcome');
    // return view('welcome', []);
})->name('welcome');
