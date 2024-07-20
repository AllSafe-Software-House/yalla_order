<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\Places;
use Carbon\Carbon;
use Livewire\Component;

class Notifications extends Component
{
    public $notifications;
    public $countToShow = 20;
    public $unreadNotifications;

    public function render()
    {
        $checkuser = auth()->user();
        if($checkuser->role == 'admin'){
            $admin = Admin::where('user_id', $checkuser->id)->first();
            if($admin->place_id != null){
                $place = Places::where('id',$admin->place_id)->first();
                $placeName = json_decode($place->name, true);
                $this->notifications = Notification::where('data->place_id',$placeName)->orderBy('created_at', 'DESC')->limit($this->countToShow)->get();
            }else{
                $this->notifications = Notification::orderBy('created_at', 'DESC')->limit($this->countToShow)->get();
            }
        }
        // where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')'user_id' => auth()->user()->id,
        return view('livewire.notifications', [
                'lang' => app()->getLocale(),
            ]);
    }

    public function readNotify($id)
    {
        Notification::where(['read_at' => null, 'id' => "$id"])->update(['read_at' => Carbon::now()]);
    }
}
