<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subscribers;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        // If the honeypot field is filled, treat as spam but act like success
        if ($request->filled('website')) {
            return $request->expectsJson()
                ? response()->json(['ok' => true])
                : back()->with('status', 'Thanks for subscribing.');
        }

        $validated = $request->validate([
            'subscribe' => 'required|email:rfc,dns|max:191',
            'page'      => 'nullable|string|max:50',
            'content_id'=> 'nullable|integer|min:0',
        ]);

        // Save or update if it already exists (assumes a "subscribers" table)
        $subscribe = Subscribers::firstOrCreate(
            [
                'email' => $validated['subscribe'],
                'source_page' => $validated['page'],
                'source_id' => $validated['content_id']
            ]
        );

        return back()->with('message-success','Thanks for subscribing.');
    }
}
