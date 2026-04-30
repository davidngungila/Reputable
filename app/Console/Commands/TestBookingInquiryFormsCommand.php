<?php

namespace App\Console\Commands;

use App\Http\Controllers\Public\BookingController;
use App\Http\Controllers\Public\InquiryController;
use App\Models\Tour;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestBookingInquiryFormsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:booking-inquiry-forms {test_email=raphaeleliac@gmail.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test booking and inquiry forms with updated email configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testEmail = $this->argument('test_email');
        
        $this->info("🧪 Testing Booking and Inquiry Forms");
        $this->info("📧 Test email: {$testEmail}");
        $this->info("🌐 Server: http://127.0.0.1:8003");
        
        // Test 1: Booking Form
        $this->info("\n🔄 Test 1: Booking Form");
        $this->testBookingForm($testEmail);
        
        // Test 2: Inquiry Form
        $this->info("\n🔄 Test 2: Inquiry Form");
        $this->testInquiryForm($testEmail);
        
        $this->info("\n🎉 Testing completed!");
        $this->info("📧 Check inboxes for:");
        $this->info("   - raphaeleliac@gmail.com (admin notifications)");
        $this->info("   - info@reputabletours.com (admin notifications)");
        $this->info("   - {$testEmail} (customer notifications)");
        
        return 0;
    }
    
    private function testBookingForm($testEmail)
    {
        try {
            // Get a sample tour
            $tour = Tour::find(2);
            if (!$tour) {
                $this->warn("⚠️ Tour with ID 2 not found, using first available tour");
                $tour = Tour::first();
            }
            
            if (!$tour) {
                $this->error("❌ No tours found in database");
                return;
            }
            
            $this->info("📋 Using tour: {$tour->name}");
            
            // Create test booking request
            $request = new Request([
                'tour_id' => $tour->id,
                'customer_name' => 'Test Customer',
                'customer_email' => $testEmail,
                'customer_phone' => '+255123456789',
                'start_date' => now()->addDays(7)->format('Y-m-d'),
                'adults' => 2,
                'children' => 1,
                'special_requests' => 'Test booking request - please ignore',
                'agree_terms' => '1',
            ]);
            
            // Create booking controller and test store method
            $controller = new BookingController();
            
            // Mock the redirect to avoid actual redirect
            $response = $controller->store($request);
            
            $this->info("✅ Booking form test completed");
            $this->info("   - Tour: {$tour->name}");
            $this->info("   - Customer: {$testEmail}");
            $this->info("   - Adults: 2, Children: 1");
            $this->info("   - Emails should be sent to: raphaeleliac@gmail.com, info@reputabletours.com, {$testEmail}");
            
        } catch (\Exception $e) {
            $this->error("❌ Booking form test failed: " . $e->getMessage());
            Log::error('Booking form test error', ['error' => $e->getMessage()]);
        }
    }
    
    private function testInquiryForm($testEmail)
    {
        try {
            // Create test inquiry request
            $request = new Request([
                'name' => 'Test Inquirer',
                'email' => $testEmail,
                'phone' => '+255123456789',
                'tour_id' => 2,
                'message' => 'Test inquiry message - please ignore. This is a test of the inquiry form functionality.',
            ]);
            
            // Create inquiry controller and test store method
            $controller = new InquiryController();
            
            // Mock the redirect to avoid actual redirect
            $response = $controller->store($request);
            
            $this->info("✅ Inquiry form test completed");
            $this->info("   - Name: Test Inquirer");
            $this->info("   - Email: {$testEmail}");
            $this->info("   - Message: Test inquiry sent");
            $this->info("   - Emails should be sent to: raphaeleliac@gmail.com, info@reputabletours.com, {$testEmail}");
            
        } catch (\Exception $e) {
            $this->error("❌ Inquiry form test failed: " . $e->getMessage());
            Log::error('Inquiry form test error', ['error' => $e->getMessage()]);
        }
    }
}
