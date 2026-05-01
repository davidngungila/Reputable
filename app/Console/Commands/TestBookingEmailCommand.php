<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Services\BookingNotificationService;

class TestBookingEmailCommand extends Command
{
    protected $signature = 'test:booking-email {id=23}';
    protected $description = 'Test booking email sending for a specific booking';

    public function handle()
    {
        $bookingId = $this->argument('id');
        $this->info("Testing booking email for booking #{$bookingId}");
        
        // Find or create booking
        $booking = Booking::find($bookingId);
        
        if (!$booking) {
            $this->error("Booking #{$bookingId} not found. Creating test booking...");
            
            // Create a test booking
            $booking = Booking::create([
                'tour_id' => 1,
                'customer_name' => 'Test Customer',
                'customer_email' => 'davidngungila@gmail.com',
                'customer_phone' => '+255622239304',
                'adults' => 2,
                'children' => 0,
                'start_date' => now()->addDays(30),
                'total_price' => 1200.00,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            $this->info("Created test booking #{$booking->id}");
        }
        
        // Load booking with tour
        $booking->load('tour');
        
        $this->info("Booking Details:");
        $this->info("  ID: " . $booking->id);
        $this->info("  Customer: " . $booking->customer_name);
        $this->info("  Email: " . $booking->customer_email);
        $this->info("  Tour: " . ($booking->tour ? $booking->tour->name : 'N/A'));
        $this->info("  Status: " . $booking->status);
        $this->info("  Total Price: $" . number_format($booking->total_price, 2));
        
        // Test email sending
        $this->info("\nSending booking confirmation emails...");
        
        try {
            $notificationService = new BookingNotificationService();
            
            $context = [
                'account_created' => false,
                'account_email' => $booking->customer_email,
                'account_password' => null,
            ];
            
            $success = $notificationService->sendBookingCreated($booking, $context);
            
            if ($success) {
                $this->info("✅ All booking emails sent successfully!");
                $this->info("📧 Check inbox at: " . $booking->customer_email);
                $this->info("📋 Admin notifications also sent");
            } else {
                $this->error("❌ Some emails failed to send");
                $this->warn("Check logs for detailed error information");
            }
            
        } catch (\Exception $e) {
            $this->error("❌ Email sending failed: " . $e->getMessage());
            $this->error("Stack trace: " . $e->getTraceAsString());
        }
        
        $this->info("\nTest completed!");
        return 0;
    }
}
