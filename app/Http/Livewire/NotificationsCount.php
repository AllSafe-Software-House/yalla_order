<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\Places;
use Livewire\Component;

class NotificationsCount extends Component
{
    public $unreadNotifications;

    public function render()
    {
        $checkuser = auth()->user();
        if($checkuser->role == 'admin'){
            $admin = Admin::where('user_id', $checkuser->id)->first();
            if($admin->place_id != null){
                $place = Places::where('id',$admin->place_id)->first();
                $placeName = json_decode($place->name, true);
                $this->unreadNotifications = Notification::where(['read_at' => null , 'data->placeName'=>$placeName])->count();
            }else{
                $this->unreadNotifications = Notification::where(['read_at' => null])->count();
            }
        }
        $this->unreadNotifications = Notification::where(['read_at' => null])->count();
        return view('livewire.notifications-count');
    }
}
