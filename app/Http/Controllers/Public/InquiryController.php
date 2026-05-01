<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Tour;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InquiryController extends Controller
{
    public function create(Request $request)
    {
        $tour = null;
        if ($request->has('tour_id')) {
            $tour = Tour::find($request->tour_id);
        }

        return view('inquiries.create', compact('tour'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'nationality' => 'nullable|string|max:100',
            'tour_id' => 'nullable|exists:tours,id',
            'travel_date' => 'nullable|date',
            'duration' => 'nullable|string|max:20',
            'group_size' => 'nullable|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        $inquiry = Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'nationality' => $validated['nationality'] ?? null,
            'tour_id' => $validated['tour_id'] ?? null,
            'travel_date' => $validated['travel_date'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'group_size' => $validated['group_size'] ?? null,
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        // Send emails to admin addresses
        try {
            $notificationService = new NotificationService();
            $emailSuccess = true;
            
            // Send to customer
            $customerSubject = 'Inquiry Received - Reputable Tours';
            $customerHtml = view('emails.customer.inquiry-received', [
                'inquiry' => $inquiry,
                'title' => $customerSubject,
                'heading' => 'Thank You for Your Inquiry!',
                'subheading' => 'We have received your message and will respond within 24 hours.',
                'website_url' => config('app.url'),
                'support_email' => 'info@reputabletours.com',
            ])->render();
            
            $customerSent = $notificationService->sendEmail($inquiry->email, $customerSubject, $customerHtml);
            if ($customerSent) {
                Log::info('Customer inquiry email sent successfully', [
                    'inquiry_id' => $inquiry->id,
                    'customer_email' => $inquiry->email
                ]);
            } else {
                Log::error('Failed to send customer inquiry email', [
                    'inquiry_id' => $inquiry->id,
                    'customer_email' => $inquiry->email
                ]);
                $emailSuccess = false;
            }
            
            // Send to admin emails
            $adminSubject = 'New Inquiry Alert - ' . $inquiry->name;
            $adminHtml = view('emails.admin.new-inquiry', [
                'inquiry' => $inquiry,
                'title' => $adminSubject,
                'heading' => 'New Customer Inquiry Received',
                'subheading' => 'A new inquiry has been submitted by ' . $inquiry->name,
                'website_url' => config('app.url'),
                'admin_url' => route('admin.inquiries.show', $inquiry->id),
            ])->render();
            
            $adminEmails = ['raphaeleliac@gmail.com', 'davidngungila@gmail.com', 'info@reputabletours.com'];
            foreach ($adminEmails as $adminEmail) {
                $adminSent = $notificationService->sendEmail($adminEmail, $adminSubject, $adminHtml);
                if ($adminSent) {
                    Log::info('Admin inquiry email sent successfully', [
                        'inquiry_id' => $inquiry->id,
                        'admin_email' => $adminEmail
                    ]);
                } else {
                    Log::error('Failed to send admin inquiry email', [
                        'inquiry_id' => $inquiry->id,
                        'admin_email' => $adminEmail
                    ]);
                    $emailSuccess = false;
                }
            }

            if ($emailSuccess) {
                Log::info('All inquiry notifications sent successfully', [
                    'inquiry_id' => $inquiry->id,
                    'customer_email' => $inquiry->email
                ]);
            } else {
                Log::warning('Some inquiry notifications failed', [
                    'inquiry_id' => $inquiry->id,
                    'customer_email' => $inquiry->email
                ]);
            }
            
        } catch (\Throwable $e) {
            Log::error('Inquiry email notification system failed', [
                'inquiry_id' => $inquiry->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        return redirect()->back()
            ->with('success', 'Thank you for your inquiry! We have received your message and will get back to you within 24 hours.');
    }
}
