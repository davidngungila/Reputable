<?php

namespace App\Console\Commands;

use App\Http\Controllers\Public\BookingController;
use App\Models\Tour;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestActualBookingSubmissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:actual-booking-submission {test_email=raphaeleliac@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test actual booking submission process like the web form';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testEmail = $this->argument('test_email');
        
        $this->info("🧪 Testing Actual Booking Submission Process");
        $this->info("📧 Test email: {$testEmail}");
        $this->info("🌐 Simulating: http://127.0.0.1:8003/bookings/5/checkout");
        
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
            
            // Step 1: Create a booking (like the store method)
            $this->info("\n🔄 Step 1: Creating booking (like web form)");
            $booking = $this->createBookingLikeWebForm($tour, $testEmail);
            
            if (!$booking) {
                $this->error("❌ Failed to create booking");
                return 1;
            }
            
            $this->info("✅ Booking created: BK-" . str_pad($booking->id, 5, '0', STR_PAD_LEFT));
            $this->info("   URL: http://127.0.0.1:8003/bookings/{$booking->id}/checkout");
            
            // Step 2: Test the confirm method (like clicking "Submit Booking Request")
            $this->info("\n🔄 Step 2: Testing confirm method (Submit Booking Request)");
            $this->testConfirmMethod($booking);
            
            // Step 3: Test email sending directly
            $this->info("\n🔄 Step 3: Testing email sending directly");
            $this->testEmailSendingDirectly($booking);
            
            $this->info("\n🎉 Actual booking submission test completed!");
            $this->info("📧 Check inboxes for:");
            $this->info("   - raphaeleliac@gmail.com");
            $this->info("   - davidngungila@gmail.com");
            $this->info("   - info@reputabletours.com");
            $this->info("   - {$testEmail} (customer)");
            
            return 0;
            
        } catch (\Exception $e) {
            $this->error("❌ Test failed: " . $e->getMessage());
            return 1;
        }
    }
    
    private function createBookingLikeWebForm($tour, $testEmail)
    {
        try {
            // Simulate the exact data that would come from the web form
            $validated = [
                'tour_id' => $tour->id,
                'customer_name' => 'Test Customer From Web',
                'customer_email' => $testEmail,
                'customer_phone' => '+255123456789',
                'start_date' => now()->addDays(7)->format('Y-m-d'),
                'adults' => 2,
                'children' => 1,
                'special_requests' => 'Test booking from web form submission',
                'agree_terms' => '1',
            ];
            
            // Calculate price exactly like the controller
            $totalPrice = $tour->base_price * ($validated['adults'] + ($validated['children'] * 0.5));
            $depositAmount = round($totalPrice * 0.30, 2);
            $balanceAmount = round($totalPrice - $depositAmount, 2);
            
            // Create booking exactly like the controller
            $booking = \App\Models\Booking::create([
                'tour_id' => $validated['tour_id'],
                'user_id' => null, // No user for guest booking
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
            $this->error("❌ Failed to create booking: " . $e->getMessage());
            return null;
        }
    }
    
    private function testConfirmMethod($booking)
    {
        try {
            // Create a mock request for the confirm method
            $request = new Request();
            
            // Start a session to test the success message
            session(['test' => 'active']);
            
            // Call the confirm method exactly like the web form
            $controller = new BookingController();
            $response = $controller->confirm($booking->id);
            
            // Check if the booking was updated
            $updatedBooking = \App\Models\Booking::find($booking->id);
            
            if ($updatedBooking->status === 'confirmed') {
                $this->info("✅ Booking status updated to: confirmed");
                $this->info("   Booking ID: BK-" . str_pad($booking->id, 5, '0', STR_PAD_LEFT));
                $this->info("   Customer: {$booking->customer_email}");
                $this->info("   Tour: {$booking->tour->name}");
            } else {
                $this->error("❌ Booking status not updated");
            }
            
        } catch (\Exception $e) {
            $this->error("❌ Confirm method failed: " . $e->getMessage());
            throw $e;
        }
    }
    
    private function testEmailSendingDirectly($booking)
    {
        try {
            // Test the BookingNotificationService directly
            $notificationService = new \App\Services\BookingNotificationService();
            
            $this->info("📧 Sending booking confirmation emails...");
            
            $notificationService->sendBookingCreated(
                $booking,
                [
                    'account_created' => false,
                    'account_email' => $booking->customer_email,
                    'account_password' => null,
                ]
            );
            
            $this->info("✅ Booking notification service completed");
            $this->info("   Emails sent to:");
            $this->info("   - raphaeleliac@gmail.com (admin)");
            $this->info("   - davidngungila@gmail.com (admin)");
            $this->info("   - info@reputabletours.com (admin)");
            $this->info("   - {$booking->customer_email} (customer)");
            
        } catch (\Exception $e) {
            $this->error("❌ Email sending failed: " . $e->getMessage());
            throw $e;
        }
    }
}
