<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JournalController extends Controller
{
    public function index(Request $request) 
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');

        return view('Finance.Journal.Transactions.CreateJournal', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken
        ]);
    }

    public function ReportPaymentJournal(Request $request) 
    {
        return view('Finance.Journal.Reports.ReportJournalSummary');
    }
}