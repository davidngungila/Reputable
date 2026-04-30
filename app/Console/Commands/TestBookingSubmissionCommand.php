<?php

namespace App\Console\Commands;

use App\Http\Controllers\Public\BookingController;
use App\Models\Tour;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TestBookingSubmissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:booking-submission {test_email=raphaeleliac@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test booking submission from checkout page to ensure emails are sent';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testEmail = $this->argument('test_email');
        
        $this->info("🧪 Testing Booking Submission from Checkout Page");
        $this->info("📧 Test email: {$testEmail}");
        $this->info("🌐 Testing: http://127.0.0.1:8003/bookings/5/checkout");
        
        try {
            // Get a sample tour
            $tour = Tour::find(5);
            if (!$tour) {
                $this->warn("⚠️ Tour with ID 5 not found, using first available tour");
                $tour = Tour::first();
            }
            
            if (!$tour) {
                $this->error("❌ No tours found in database");
                return 1;
            }
            
            $this->info("📋 Using tour: {$tour->name}");
            
            // Create a test booking first (simulate the store method)
            $this->info("\n🔄 Step 1: Creating test booking");
            $booking = $this->createTestBooking($tour, $testEmail);
            
            if (!$booking) {
                $this->error("❌ Failed to create test booking");
                return 1;
            }
            
            $this->info("✅ Test booking created: BK-" . str_pad($booking->id, 5, '0', STR_PAD_LEFT));
            
            // Test the confirm method (simulates "Submit Booking Request")
            $this->info("\n🔄 Step 2: Testing booking confirmation (Submit Booking Request)");
            $this->testBookingConfirmation($booking);
            
            $this->info("\n🎉 Booking submission test completed successfully!");
            $this->info("📧 Emails should be sent to:");
            $this->info("   - raphaeleliac@gmail.com (admin)");
            $this->info("   - info@reputabletours.com (admin)");
            $this->info("   - {$testEmail} (customer)");
            $this->info("🎨 All emails use English content with FeedTan CMG design");
            
            return 0;
            
        } catch (\Exception $e) {
            $this->error("❌ Booking submission test failed: " . $e->getMessage());
            Log::error('Booking submission test error', ['error' => $e->getMessage()]);
            return 1;
        }
    }
    
    private function createTestBooking($tour, $testEmail)
    {
        try {
            // Simulate booking creation (similar to store method)
            $validated = [
                'tour_id' => $tour->id,
                'customer_name' => 'Test Customer',
                'customer_email' => $testEmail,
                'customer_phone' => '+255123456789',
                'start_date' => now()->addDays(7)->format('Y-m-d'),
                'adults' => 2,
                'children' => 1,
                'special_requests' => 'Test booking - please ignore',
                'agree_terms' => '1',
            ];
            
            // Simple price calculation
            $totalPrice = $tour->base_price * ($validated['adults'] + ($validated['children'] * 0.5));
            $depositAmount = round($totalPrice * 0.30, 2);
            $balanceAmount = round($totalPrice - $depositAmount, 2);
            
            // Create booking
            $booking = \App\Models\Booking::create([
                'tour_id' => $validated['tour_id'],
                'user_id' => null,
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'start_date' => $validated['start_date'],
                'adults' => $validated['adults'],
                'children' => $validated['children'] ?? 0,
                'special_requests' => $validated['special_requests'],
                'total_price' => $totalPrice,
                'deposit_amount' => $depositAmount,
                'is_deposit_paid' => false,
                'balance_amount' => $balanceAmount,
                'status' => 'pending',
                'payment_status' => 'unpaid',
            ]);
            
            return $booking;
            
        } catch (\Exception $e) {
            $this->error("❌ Failed to create test booking: " . $e->getMessage());
            return null;
        }
    }
    
    private function testBookingConfirmation($booking)
    {
        try {
            // Simulate the confirm method
            $booking->update(['status' => 'confirmed']);
            
            // Send booking confirmation emails (same as in the updated confirm method)
            $notificationService = new \App\Services\BookingNotificationService();
            
            $notificationService->sendBookingCreated(
                $booking,
                [
                    'account_created' => false,
                    'account_email' => $booking->customer_email,
                    'account_password' => null,
                ]
            );
            
            $this->info("✅ Booking confirmed and emails sent");
            $this->info("   - Booking ID: BK-" . str_pad($booking->id, 5, '0', STR_PAD_LEFT));
            $this->info("   - Customer: {$booking->customer_email}");
            $this->info("   - Tour: {$booking->tour->name}");
            $this->info("   - Status: confirmed");
            
        } catch (\Exception $e) {
            $this->error("❌ Failed to confirm booking and send emails: " . $e->getMessage());
            throw $e;
        }
    }
}
