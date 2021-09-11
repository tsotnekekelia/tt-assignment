<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmitted;
use App\Models\Contact;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends BaseController
{
    public function create(Request $request)
    {
        $data = collect($request->json()->all())
            ->filter(fn($it) => $it != null)
            ->toArray();

        $validator = Validator::make($data, [
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:500'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->toArray()], 400);
        }

        $contact = new Contact($data);

        try {
            $contact->save();

            Mail::to(env('ADMIN_EMAIL'))->send(new ContactSubmitted($contact));

            return response(['ok' => true], 200);
        } catch (QueryException $e) {
            return response(['errors' => 'Internal Server Error'], 500);
        }
    }
}
