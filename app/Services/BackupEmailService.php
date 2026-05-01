<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class BackupEmailService
{
    /**
     * Send email using backup service (SendGrid API)
     */
    public function send(string|array $to, string $subject, string $htmlBody, ?string $attachmentPath = null, ?string $attachmentName = null): bool
    {
        try {
            // Try SendGrid as backup
            $apiKey = config('services.sendgrid.api_key') ?: env('SENDGRID_API_KEY');
            $fromEmail = config('mail.from.address') ?: env('MAIL_FROM_ADDRESS', 'info@reputabletours.com');
            $fromName = config('mail.from.name') ?: env('MAIL_FROM_NAME', 'Reputable Tours');

            if (!$apiKey) {
                Log::warning('Backup email service: SendGrid API key not configured');
                return false;
            }

            $recipients = is_array($to) ? $to : [$to];
            
            $payload = [
                'personalizations' => [
                    [
                        'to' => array_map(function($email) {
                            return ['email' => $email];
                        }, $recipients),
                        'subject' => $subject
                    ]
                ],
                'from' => [
                    'email' => $fromEmail,
                    'name' => $fromName
                ],
                'content' => [
                    [
                        'type' => 'text/html',
                        'value' => $htmlBody
                    ]
                ]
            ];

            // Add attachment if provided
            if ($attachmentPath && file_exists($attachmentPath)) {
                $content = base64_encode(file_get_contents($attachmentPath));
                $payload['attachments'] = [
                    [
                        'content' => $content,
                        'filename' => $attachmentName ?: basename($attachmentPath),
                        'type' => 'application/pdf',
                        'disposition' => 'attachment'
                    ]
                ];
            }

            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json'
                ])
                ->post('https://api.sendgrid.com/v3/mail/send', $payload);

            if ($response->successful()) {
                Log::info('Backup email sent successfully via SendGrid', [
                    'to' => is_array($to) ? implode(', ', $to) : $to,
                    'subject' => $subject
                ]);
                return true;
            } else {
                Log::error('Backup email failed via SendGrid', [
                    'to' => is_array($to) ? implode(', ', $to) : $to,
                    'subject' => $subject,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }

        } catch (\Throwable $e) {
            Log::error('Backup email service exception', [
                'to' => is_array($to) ? implode(', ', $to) : $to,
                'subject' => $subject,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Send email using Mailgun as another backup option
     */
    public function sendViaMailgun(string|array $to, string $subject, string $htmlBody, ?string $attachmentPath = null, ?string $attachmentName = null): bool
    {
        try {
            $apiKey = config('services.mailgun.api_key') ?: env('MAILGUN_API_KEY');
            $domain = config('services.mailgun.domain') ?: env('MAILGUN_DOMAIN');
            $fromEmail = config('mail.from.address') ?: env('MAIL_FROM_ADDRESS', 'info@reputabletours.com');
            $fromName = config('mail.from.name') ?: env('MAIL_FROM_NAME', 'Reputable Tours');

            if (!$apiKey || !$domain) {
                Log::warning('Backup email service: Mailgun not configured');
                return false;
            }

            $recipients = is_array($to) ? $to : [$to];
            
            $postData = [
                'from' => "{$fromName} <{$fromEmail}>",
                'to' => implode(',', $recipients),
                'subject' => $subject,
                'html' => $htmlBody
            ];

            // Add attachment if provided
            if ($attachmentPath && file_exists($attachmentPath)) {
                $postData['attachment'] = [
                    new \CURLFile($attachmentPath, $attachmentName ?: basename($attachmentPath))
                ];
            }

            $response = Http::timeout(30)
                ->withBasicAuth('api', $apiKey)
                ->asMultipart()
                ->post("https://api.mailgun.net/v3/{$domain}/messages", $postData);

            if ($response->successful()) {
                Log::info('Backup email sent successfully via Mailgun', [
                    'to' => is_array($to) ? implode(', ', $to) : $to,
                    'subject' => $subject
                ]);
                return true;
            } else {
                Log::error('Backup email failed via Mailgun', [
                    'to' => is_array($to) ? implode(', ', $to) : $to,
                    'subject' => $subject,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return false;
            }

        } catch (\Throwable $e) {
            Log::error('Backup Mailgun service exception', [
                'to' => is_array($to) ? implode(', ', $to) : $to,
                'subject' => $subject,
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }
}
