<?php
namespace App\Http\Controllers\Dashboard;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CashbackSettingController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::whereIn('key', ['cashback_enabled', 'cashback_amount', 'cashback_percentage', 'cashback_limit'])->pluck('value', 'key')->toArray();
        return view('cashback-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'cashback_enabled' => 'required|boolean',
            'cashback_amount' => 'required|numeric',
            'cashback_percentage' => 'required|numeric',
            'cashback_limit' => 'required|numeric',
        ]);

        GeneralSetting::updateOrCreate(['key' => 'cashback_enabled'], ['value' => $request->cashback_enabled]);
        GeneralSetting::updateOrCreate(['key' => 'cashback_amount'], ['value' => $request->cashback_amount]);
        GeneralSetting::updateOrCreate(['key' => 'cashback_percentage'], ['value' => $request->cashback_percentage]);
        GeneralSetting::updateOrCreate(['key' => 'cashback_limit'], ['value' => $request->cashback_limit]);

        return redirect()->back()->with('success', 'Cashback settings updated successfully.');
    }
}
