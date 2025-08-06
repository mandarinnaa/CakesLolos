<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MessageA;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{

    public function index()
    {
        $messages = Message::latest()->get(); 
        return view('admin.mensajes', compact('messages'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'status' => 'pendiente' 
        ]);

        Mail::to('destinatario@example.com')->send(new MessageA($message));

        return redirect()->back()->with('success', '¡Tu mensaje ha sido enviado!');
    }
}
