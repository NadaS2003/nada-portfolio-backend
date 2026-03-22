<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {// التحقق من البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('nadaramadan1512002@gmail.com')->send(new ContactMail($validated));
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // هذا السطر سيكشف لنا السر في تبويب الـ Response في المتصفح
            return response()->json(['error' => $e->getMessage()], 500);
        }
       // Mail::to($validated['email'])->send(new \App\Mail\ContactMail($validated));

        return response()->json([
            'status' => 'success',
            'message' => 'تم استلام طلبك بنجاح'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
