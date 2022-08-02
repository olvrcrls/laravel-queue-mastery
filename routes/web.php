<?php

use App\Jobs\Deploy;
use App\Jobs\PaymentProcess;
use App\Jobs\PullRepo;
use App\Jobs\RunTests;
use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // SendWelcomeEmail::dispatch();
    // PaymentProcess::dispatch()->onQueue('payments'); // naming the queue by onQueue

    /** This will display Queue Workflows Dispatch example */
    $jobChain = array(
        new PullRepo(),
        new RunTests(),
        new Deploy()
    );

    Bus::chain($jobChain)->dispatch(); // The dispatch will be incomplete if one of the sequence in between encounters an error.

    return view('welcome');
});
