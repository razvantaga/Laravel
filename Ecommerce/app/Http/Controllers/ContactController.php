<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function AdminContact() {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function AdminAddContact() {
        return view('admin.contact.create');
    }

    public function AdminStoreContact(Request $request) {
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.contact')->with('success', 'Contact added successfully!');
    }

    public function EditContact($id) {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }

    public function UpdateContact(Request $request, $id) {
        $update = Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('admin.contact')->with('success', 'Contact updated successfully!');
    }

    public function DeleteContact($id) {
        $delete = Contact::find($id)->delete();
        return redirect()->route('admin.contact')->with('success', 'Contact deleted successfully!');
    }

    public function AdminMessage() {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }

    public function contact() {
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }

    public function ContactForm(Request $request) {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('contact')->with('success', 'Your message sended successfully!');
    }

    public function DeleteMessage($id) {
        $delete = ContactForm::find($id)->delete();
        return redirect()->route('admin.message')->with('success', 'Message deleted successfully!');
    }
} 
