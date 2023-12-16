<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
// use DataTables;

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
    
    // if ($request->ajax()) {
    //     $data =  DB::table('accounts')->select('id', 'name', 'code', 'type', 'hasPrice')->get();
    //     return $dataTable::of($data)
    //             ->addIndexColumn()
    //             ->make(true);
    // }

    // return $dataTable->render('welcome');

    if ($request->ajax()) {
        $data = \App\Models\Account::select('*');
        return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }
            return view('welcome');

    // return $dataTable->render('welcome');
    // return view('welcome', []);
})->name('welcome');


use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::get('welcome', [AccountController::class, 'index'])->name('welcome.index');