<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Http\Requests\ContactUSRequest;
use App\Models\Content_US;
use Illuminate\Http\Request;

class ContentUSController extends Controller
{
    public function contactus(ContactUSRequest $request){
        $contact = Content_US::create([
            "fname" => $request->fname,
            "lname"  => $request->lname,
            "email"  => $request->email,
            "phone"  => $request->phone,
            "message"  => $request->message
        ]);

        return ApiResponse::sendresponse(200,"your message send to Admin to contact you " , $contact);
    }
}
