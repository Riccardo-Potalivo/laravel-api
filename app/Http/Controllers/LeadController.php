<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;

class LeadController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('riccardopotalivo@gmail.com')->send(new NewContact($newLead));

        return response()->json([
            'success' => true,
        ]);
    }
}
