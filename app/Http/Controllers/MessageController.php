<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = [
            'judul' => 'Customer Messages',
            'DataM' => Message::latest()->get(),
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.message', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validate form
        $request->validate([
            'Name'      => 'required|max:255',
            'Phone'     => 'required|numeric|max_digits:20',
            'Email'     => 'required|email|max:255',
            'Subject'   => 'required|max:255',
            'Message'   => 'required',
        ]);

        //create
        Message::create([
            'id_messages'       => 'Message'.Str::random(33),
            'name_messages'     => $request->Name,
            'email_messages'    => $request->Email,
            'phone_messages'    => $request->Phone,
            'subject_messages'  => $request->Subject,
            'content_messages'  => $request->Message,
            'status_messages'   => 'Unread',
            'created_by'        => $request->Email.' (Customer)',
            'modified_by'       => $request->Email.' (Customer)',
        ]);

        //redirect to index
        return redirect()->route('contact.publik')->with(['success' => 'Your message has been Sent!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);

        $message->update([
            'status_messages'   => 'Read',
            'modified_by'       => Auth::user()->email,
        ]);

        $data = [
            'judul' => 'Detail Message',
            'DetailM' => Message::findOrFail($id),
            'cOP' => Order::where('status_orders', 'Pending')->count(),
            'cMC' => Message::where('status_messages', 'Unread')->count(),
        ];
        return view('pages.admin.message_detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id): RedirectResponse
    {
        $message = Message::findOrFail($id);

        $message->update([
            'status_messages'   => 'Unread',
            'modified_by'       => Auth::user()->email,
        ]);

        return redirect()->route('message.data')->with(['success' => 'Message marked Unread!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get by ID
        $message = Message::findOrFail($id);

        //delete
        $message->delete();

        //redirect to index
        return redirect()->route('message.data')->with(['success' => 'Message has been Deleted!']);
    }
}
