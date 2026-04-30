<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ConvertEmailsToEnglishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:emails-to-english';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert all email content from Swahili to English';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("🔄 Converting all email content from Swahili to English");
        
        $translations = [
            // Swahili to English translations
            'Habari Admin,' => 'Dear Admin,',
            'Habari David,' => 'Dear David,',
            'Habari' => 'Dear',
            'Asante,' => 'Thank you,',
            'Asante' => 'Thank you',
            'Timu ya Reputable Tours' => 'Reputable Tours Team',
            'Let\'s Explore Together! 🌍' => 'Let\'s Explore Together! 🌍',
            'Umeipokea ombi mpya la mteja' => 'You have received a new customer inquiry',
            'Umeipokea taarifa mpya ya kuweka nafasi ya safari' => 'You have received a new booking notification',
            'Maelezo ya Mteja' => 'Customer Information',
            'Jina:' => 'Name:',
            'Barua pepe:' => 'Email:',
            'Simu:' => 'Phone:',
            'Nchi:' => 'Nationality:',
            'Maelezo ya Ombi' => 'Inquiry Details',
            'Anayoivutiwa:' => 'Interested in:',
            'Tarehe ya Safari:' => 'Travel Date:',
            'Muda:' => 'Duration:',
            'Wanaoenda:' => 'Group Size:',
            'Ujumbe wa Mteja' => 'Customer Message',
            'Ona Maelezo Kamili' => 'View Full Details',
            'Jibu Mteja' => 'Reply to Customer',
            'Vidokezo vya Majibu' => 'Response Tips',
            'Jibu kwa mteja ndani ya masaa 24' => 'Respond to customer within 24 hours',
            'Toa maelezo kamili kuhusu safari anazovutiwa' => 'Provide complete details about the tour they\'re interested in',
            'Pendekeza chagua zinazofaa kwa bajeti yake' => 'Suggest options suitable for their budget',
            'Uliza maswali ya kumuelewa mteja vizuri' => 'Ask questions to understand the customer well',
            'Usisite kuwasiliana na ofisi yetu endapo utakuwa na swali lolote' => 'Don\'t hesitate to contact our office if you have any questions',
            'Ombi Mpya la Mteja' => 'New Customer Inquiry',
            'Safari yako imeidhinishwa rasmi' => 'Your safari has been officially confirmed',
            'Tunafurahi kuwakaribisha kwa ajili ya' => 'We are excited to welcome you for',
            'Itinerary yako kwa' => 'Your itinerary for',
            'iko tayari' => 'is ready',
            'Namba ya Kuweka Nafasi:' => 'Booking Reference:',
            'Tarehe ya Kuanza:' => 'Start Date:',
            'Hali:' => 'Status:',
            'Malipo:' => 'Payment:',
            'Wageni:' => 'Travelers:',
            'wazima' => 'adults',
            'watoto' => 'children',
            'Msaada wa Ardhi' => 'Ground Support',
            'Mwongozi Mkuu:' => 'Lead Guide:',
            'Dereva Mkuu:' => 'Lead Driver:',
            'Gari:' => 'Vehicle:',
            'Hajagawiwa' => 'Unassigned',
            'Pakua Voucher PDF' => 'Download Voucher PDF',
            'Maelezo Muhimu' => 'Important Information',
            'Voucher yako/faini imemeandikwa kwenye barua pepe hii' => 'Your voucher/invoice is attached to this email',
            'Ikiwa unahitaji mabadiliko yoyote' => 'If you need any changes',
            'mahitaji ya chakula, mahali pa kuchukua, maelezo ya ndege' => 'dietary needs, pickup point, flight details',
            'jibu barua pepe hii' => 'reply to this email',
            'Vidokezo vya Itinerary' => 'Itinerary Tips',
            'Soma itinerary yako kwa uangalifu' => 'Read your itinerary carefully',
            'Andaa orodha ya vitu muhimu vya kuchukua' => 'Prepare a list of important items to bring',
            'Thibitisha muda wa kuchukua kwa kila siku' => 'Confirm pickup times for each day',
            'Wasiliana na mwongozo wako mapema' => 'Contact your guide early',
            'Tunaangalia kukuona siku ya safari yako' => 'We look forward to seeing you on your safari day',
            'Tunaangalia kukuona siku ya kuanza kwa safari yako' => 'We look forward to seeing you on your safari start day',
            'Vidokezo vya Maandalizi' => 'Preparation Tips',
            'Andaa vitambulisho vyako vya safari' => 'Prepare your travel documents',
            'Hakikisha pasipoti yako ni halali kwa muda wa safari' => 'Ensure your passport is valid for the duration of the trip',
            'Panga mavazi yanayofaa kwa hali ya hewa' => 'Pack appropriate clothing for the weather',
            'Andika orodha ya dawa muhimu' => 'Make a list of essential medications',
            'Maelezo ya Kuweka Nafasi' => 'Booking Details',
            'Muhtasari wa Kifedha' => 'Financial Summary',
            'Jumla ya Kiasi:' => 'Total Amount:',
            'Namba ya Rejeleo:' => 'Reference Number:',
            'Ona Nafisi Yangu' => 'View My Booking',
            'Maelezo ya Ziada' => 'Additional Information',
            'Itinerary yako inaandaliwa na wataalam wetu wa wasafiri' => 'Your itinerary is being prepared by our expert guides',
            'Timu yetu itawasiliana nawe hivi karibuni na kifurushi cha karibu dijitali na mwongozo wa maandalizi' => 'Our team will contact you shortly with your digital welcome pack and preparation guide',
            'Ikiwa una maswali ya haraka, jibu barua pepe hii au wasiliana nasi kupitia WhatsApp' => 'If you have any immediate questions, simply reply to this email or contact us via WhatsApp',
            'Hii ni barua pepe ya majaribio kutoka kwa mfumo wa Reputable Tours kwa ajili ya' => 'This is a test email from the Reputable Tours system for',
            'Tunatumia ujumbe huu kutoka kwa Reputable Tours kwa ajili ya' => 'We are sending this message from Reputable Tours for',
            'Hii ni barua pepe ya mfumo kutoka Reputable Tours' => 'This is a system email from Reputable Tours',
            'Ikiwa hii ni kosa, tafadhali puauza barua pepe hii' => 'If this is an error, please ignore this email',
            'Kuhusu Reputable Tours' => 'About Reputable Tours',
            'Tunaishiwa na dhamira ya kutoa huduma bora za utalii nchini Tanzania, tukihakikisha unapata uzoefu usioweza kusahaulika' => 'We are committed to providing excellent tourism services in Tanzania, ensuring you get an unforgettable experience',
            'Asante kwa kuwa sehemu ya familia ya Reputable Tours' => 'Thank you for being part of the Reputable Tours family',
            'Wapendwa,' => 'Dear,',
            'Tunatumai ujumbe huu unakufikia ukiwa na afya njema' => 'We hope this message finds you well',
            'Hii ni majaribio ya mfano mpya wa barua pepe ukitumia muundo wa FeedTan CMG' => 'This is a test of the new email template using the FeedTan CMG design',
            'Tumefanikiwa kusasisha muundo wa barua pepe zetu kuwa na rangi ya kijani (#006400) na miundo ya kitaalamu inayolingana na FeedTan CMG' => 'We have successfully updated our email templates with the green color (#006400) and professional design matching FeedTan CMG',
            'Muundo huu unajumuisha:' => 'This design includes:',
            'Rangi ya kijani ya kitaalamu' => 'Professional green color',
            'Tipi za Poppins' => 'Poppins fonts',
            'Miundo inayofaa kwa simu' => 'Mobile-friendly layouts',
            'Vitufe vya vitendo vya kitaalamu' => 'Professional action buttons',
            'Ujumbe wa Mafanikio!' => 'Success Message!',
            'Mfano wa barua pepe umefanikiwa kutumwa kwa mafanikio' => 'The email template has been successfully sent',
            'Muundo wa FeedTan CMG unaonekana vizuri na unafanya kazi kama ilivyopangwa' => 'The FeedTan CMG design looks great and works as planned',
            '"Mawasiliano mazuri ni muhimu kwa biashara yoyote."' => '"Good communication is essential for any business."',
            'Asante kwa kuipitia barua pepe hii ya majaribio' => 'Thank you for reviewing this test email',
            'Hii ni barua pepe ya majaribio kutoka kwa mfumo wa kuweka nafasi' => 'This is a test email from the booking system',
            'Hii ni barua pepe ya majaribio kutoka kwa mfumo wa ombi' => 'This is a test email from the inquiry system',
            'Nina nia ya kujua zaidi kuhusu safari zenu' => 'I am interested in learning more about your tours',
            'Hii ni ombi la majaribio kutoka kwa mfumo wa ombi' => 'This is a test inquiry from the inquiry system',
            'Hii ni barua pepe ya majaribio kutoka kwa mfumo wa barua pepe' => 'This is a test email from the email system',
            'Template hii inaonyesha muundo kamili wa FeedTan CMG' => 'This template shows the complete FeedTan CMG design',
            'Template hii inatumia muundo wa FeedTan CMG na rangi ya kijani ya kitaalamu' => 'This template uses the FeedTan CMG design with professional green color',
            'Vipengele vya Template:' => 'Template Features:',
            'Mfumo wa barua pepe umefanikiwa vizuri' => 'The email system is working perfectly',
            'Hii ni majaribio ya mwisho ya mfumo wa barua pepe wa FeedTan CMG' => 'This is the final test of the FeedTan CMG email system',
            'Template hii inaonyesha jinsi template ya' => 'This template shows how the',
        ];
        
        $emailTemplatesPath = resource_path('views/emails');
        $templatesUpdated = 0;
        
        // Find all .blade.php files in the emails directory
        $files = File::allFiles($emailTemplatesPath);
        
        foreach ($files as $file) {
            if ($file->getExtension() === 'php') {
                $filePath = $file->getPathname();
                $content = File::get($filePath);
                $originalContent = $content;
                
                // Apply all translations
                foreach ($translations as $swahili => $english) {
                    $content = str_replace($swahili, $english, $content);
                }
                
                // Only update if content changed
                if ($content !== $originalContent) {
                    // Create backup
                    $backupPath = $filePath . '.english.backup';
                    File::copy($filePath, $backupPath);
                    
                    File::put($filePath, $content);
                    
                    $relativePath = str_replace(resource_path(), '', $filePath);
                    $this->info("✅ Updated: " . ltrim($relativePath, '/\\'));
                    $templatesUpdated++;
                }
            }
        }
        
        $this->info("\n🎉 Email content conversion completed!");
        $this->info("📊 Summary:");
        $this->info("   📁 Templates updated: {$templatesUpdated}");
        $this->info("   🌐 Language: English");
        $this->info("   💾 Backups created with .english.backup extension");
        
        if ($templatesUpdated > 0) {
            $this->info("\n🧪 Test the updated templates with:");
            $this->info("   php artisan test:all-email-templates raphaeleliac@gmail.com");
        } else {
            $this->warn("\n⚠️ No templates found with Swahili content");
        }
        
        return 0;
    }
}
