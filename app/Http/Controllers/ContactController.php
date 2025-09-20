<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        Mail::to('farabirakib606@gmail.com')->send(new ContactMail($validated));

        return response()->json(['success' => 'Message sent successfully!']);
    }


    // Index method to list all Contact entries
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('backend.admin.contacts.index', compact('contacts'));

    }

    // AJAX fetch all contacts
    public function fetchContacts()
    {
        $contacts = Contact::latest()->get();
        return response()->json($contacts);
    }

    // Delete contact
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(['status' => 'success']);
    }



}







