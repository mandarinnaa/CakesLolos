<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function dashboard()
    {
        $pendingCount = Message::where('status', 'pendiente')->count();
        $messages = Message::latest()->take(5)->get();
        return view('editor.dashboard', compact('messages', 'pendingCount'));
    }

    public function mensajes(Request $request)
    {
        $status = $request->input('status', 'all');
        
        $query = Message::latest();
        
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        
        $messages = $query->paginate(10);
        $pendingCount = Message::where('status', 'pendiente')->count();
        
        return view('editor.mensajes', [
            'messages' => $messages,
            'pendingCount' => $pendingCount,
            'status' => $status,
            'statusLabels' => [
                'pendiente' => 'Pendiente',
                'approved' => 'Aprobado',
                'rejected' => 'Rechazado'
            ]
        ]);
    }

    public function approve(Message $message)
    {
        $message->update(['status' => 'approved']);
        return back()->with('success', 'Comentario aprobado con éxito.');
    }

    public function reject(Message $message)
    {
        $message->update(['status' => 'rejected']);
        return back()->with('success', 'Comentario rechazado.');
    }

    public function restore(Message $message)
    {
        $message->update(['status' => 'pendiente']);
        return back()->with('success', 'Comentario restaurado a pendiente.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back()->with('success', 'Comentario eliminado permanentemente.');
    }
}