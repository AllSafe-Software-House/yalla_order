<?php
namespace App\Http\Controllers\Dashboard;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CashbackSettingController extends Controller
{
    public function index()
    {
        $defaults = [
            'cashback_enabled' => 0,
            'cashback_amount' => 0,
            'cashback_percentage' => 0,
            'cashback_limit' => 0,
        ];

        $settings = GeneralSetting::whereIn('key', array_keys($defaults))->pluck('value', 'key')->toArray();

        // Merge defaults with existing settings
        $settings = array_merge($defaults, $settings);
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
