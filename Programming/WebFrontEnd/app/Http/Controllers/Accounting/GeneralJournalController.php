<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Helpers\ZhtHelper\System\FrontEnd\Helper_APICall;
use App\Helpers\ZhtHelper\System\Helper_Environment;
use App\Helpers\ZhtHelper\Cache\Helper_Redis;

class GeneralJournalController extends Controller
{
    public function index(Request $request) 
    {
        $var                = $request->query('var', 0);
        $varAPIWebToken     = Session::get('SessionLogin');

        return view('Accounting.GeneralJournal.Transactions.CreateGeneralJournal', [
            'var'                   => $var,
            'varAPIWebToken'        => $varAPIWebToken
        ]);
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function RevisionGeneralJournal(Request $request) 
    {
        $varAPIWebToken     = Session::get('SessionLogin');
        $generalJournalID   = $request->input('modal_general_journal_id');

        return view('Accounting.GeneralJournal.Transactions.RevisionGeneralJournal', [
            'varAPIWebToken'        => $varAPIWebToken
        ]);
    }

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
