<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Reputable Tours</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; background-color: #f0f4f8; font-family: "Poppins", sans-serif; color: #333; line-height: 1.6; }
        .email-container { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; }
        .header { background: #006400; padding: 30px 25px; text-align: center; color: white; }
        .header .title { font-size: 26px; font-weight: 700; margin-bottom: 5px; }
        .header .sub-title { font-size: 14px; opacity: 0.9; }
        .content { padding: 30px 25px; }
        .greeting { font-size: 18px; font-weight: 600; color: #2d3748; margin-bottom: 15px; }
        
        .card { background-color: #f7fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 20px; margin-bottom: 25px; border-left: 5px solid #006400; }
        .card-header { display: flex; align-items: center; margin-bottom: 15px; }
        .card-header .icon { font-size: 24px; margin-right: 12px; color: #4CAF50; }
        .card-header h4 { margin: 0; font-size: 16px; font-weight: 600; color: #2d3748; }

        .button-container { text-align: center; margin: 30px 0; }
        .download-button { display: inline-block; padding: 12px 25px; background-color: #438a5e; color: white !important; font-weight: 600; border-radius: 6px; text-decoration: none; transition: background-color 0.3s ease; }
        .download-button:hover { background-color: #2e7d32; }
        
        .special-section { background-color: #fff8e1; border-left: 5px solid #FFC107; padding: 25px; border-radius: 8px; margin: 25px 0; }
        .special-section h4 { margin-top: 0; font-size: 18px; display: flex; align-items: center; color: #c09e4f; font-weight: 600; }
        .special-section .icon { font-size: 24px; margin-right: 10px; color: #c09e4f; }
        .special-section p { margin: 10px 0; font-size: 14px; }
        
        .invest-button { display: inline-block; padding: 12px 25px; background-color: #006400; color: white !important; font-weight: 600; border-radius: 6px; text-decoration: none; transition: background-color 0.3s ease; margin-top: 15px; }
        .invest-button:hover { background-color: #2e7d32; }

        .signature { margin-top: 40px; font-size: 14px; color: #4a5568; }
        .footer { background-color: #006400; color: white; text-align: center; padding: 15px; font-size: 12px; letter-spacing: 0.5px; opacity: 0.8; }
        
        .detail-item { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; }
        .detail-label { color: #6b7280; font-weight: 500; }
        .detail-value { color: #1f2937; font-weight: 600; }
        
        @media (max-width: 600px) {
            .email-container { margin: 10px; border-radius: 8px; }
            .header { padding: 20px; }
            .content { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="title">Reputable Tours</div>
            <div class="sub-title">NSSF Commercial Complex, Moshi - Your Gateway to Tanzanian Adventures</div>
        </div>
        <div class="content">
            <div style="background-color:#f8fafc;border-radius:8px;padding:24px;margin-bottom:20px;border:1px solid #e2e8f0;">
                <div style="text-align:center;margin-bottom:24px;">
                    <div style="display:inline-block;background-color:#EA6D24;color:white;padding:8px 16px;border-radius:50px;font-weight:700;font-size:14px;letter-spacing:0.5px;text-transform:uppercase;">
                        BOOKING CONFIRMED
                    </div>
                </div>

                <div style="background-color:#ffffff;border-radius:8px;padding:24px;margin-bottom:20px;border-left:4px solid #054422;">
                    <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;color:#1e293b;margin-bottom:16px;">
                        Dear <strong>{{ $booking->customer_name }}</strong>,
                    </div>
                    
                    <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;color:#475569;margin-bottom:20px;">
                        Thank you for choosing <strong style="color:#054422;">Reputable Tours</strong> for your Tanzania safari adventure! We are delighted to confirm your booking and look forward to providing you with an unforgettable experience.
                    </div>

                    <div style="background-color:#f8fafc;border-radius:6px;padding:16px;margin-bottom:20px;">
                        <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;color:#054422;margin-bottom:8px;">
                            BOOKING DETAILS
                        </div>
                        
                        <table style="width:100%;border-collapse:collapse;">
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Booking Reference:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">BK-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</td>
                            </tr>
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Tour Package:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">{{ $booking->tour->name ?? 'Safari Package' }}</td>
                            </tr>
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Start Date:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">{{ $booking->start_date->format('F j, Y') }}</td>
                            </tr>
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Number of Guests:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">
                                    {{ $booking->adults }} Adult{{ $booking->adults > 1 ? 's' : '' }}
                                    @if($booking->children > 0)
                                        and {{ $booking->children }} Child{{ $booking->children > 1 ? 'ren' : '' }}
                                    @endif
                                </td>
                            </tr>
                            @if(!empty($booking->special_requests))
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;vertical-align:top;">Special Requests:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">{{ $booking->special_requests }}</td>
                            </tr>
                            @endif
                        </table>
                    </div>

                    <div style="background-color:#f8fafc;border-radius:6px;padding:16px;margin-bottom:20px;">
                        <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;color:#054422;margin-bottom:12px;">
                            PAYMENT SUMMARY
                        </div>
                        
                        <table style="width:100%;border-collapse:collapse;">
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Total Amount:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">${{ number_format($booking->total_price, 2) }}</td>
                            </tr>
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Deposit Required:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#EA6D24;font-weight:600;">${{ number_format($booking->deposit_amount, 2) }} (30%)</td>
                            </tr>
                            <tr>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Balance Due:</td>
                                <td style="padding:8px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">${{ number_format($booking->balance_amount, 2) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div style="text-align:center;margin:24px 0;">
                    <a href="{{ $payment_url ?? '#' }}" style="display:inline-block;background-color:#054422;color:white;padding:16px 32px;border-radius:6px;text-decoration:none;font-weight:600;font-size:16px;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
                        Complete Payment & View Details
                    </a>
                </div>

                @if($account_created ?? false)
                <div style="background-color:#fff7ed;border:1px solid #fbbf24;border-radius:8px;padding:20px;margin-bottom:20px;">
                    <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;color:#92400e;margin-bottom:8px;">
                        🎉 YOUR ACCOUNT HAS BEEN CREATED
                    </div>
                    <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;color:#475569;">
                        We've automatically created a customer account for you to manage your bookings and access exclusive features.
                    </div>
                    <table style="width:100%;border-collapse:collapse;margin-top:12px;">
                        <tr>
                            <td style="padding:4px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Email:</td>
                            <td style="padding:4px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">{{ $account_email ?? $booking->customer_email }}</td>
                        </tr>
                        <tr>
                            <td style="padding:4px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#64748b;font-weight:500;">Password:</td>
                            <td style="padding:4px 0;font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;color:#1e293b;font-weight:600;">{{ $account_password ?? 'Set during first login' }}</td>
                        </tr>
                    </table>
                    <div style="text-align:center;margin-top:16px;">
                        <a href="{{ $login_url ?? route('login') }}" style="display:inline-block;background-color:#EA6D24;color:white;padding:12px 24px;border-radius:6px;text-decoration:none;font-weight:600;font-size:14px;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
                            Access Your Account
                        </a>
                    </div>
                </div>
                @endif

                <div style="background-color:#f0f9ff;border:1px solid #dbeafe;border-radius:8px;padding:20px;">
                    <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;color:#1e40af;margin-bottom:8px;">
                        📋 IMPORTANT INFORMATION
                    </div>
                    <ul style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;color:#475569;margin:0;padding-left:20px;">
                        <li style="margin-bottom:8px;">Please review your booking details carefully and contact us immediately if any corrections are needed.</li>
                        <li style="margin-bottom:8px;">A 30% deposit is required to secure your booking with the balance due 60 days before travel.</li>
                        <li style="margin-bottom:8px;">Your detailed invoice is attached to this email for your records.</li>
                        <li style="margin-bottom:8px;">We recommend travel insurance for comprehensive coverage during your safari.</li>
                    </ul>
                </div>
            </div>

            <div style="background-color:#ffffff;border-radius:8px;padding:24px;margin-bottom:20px;">
                <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;font-weight:600;color:#054422;margin-bottom:12px;">
                    🌍 WHAT HAPPENS NEXT?
                </div>
                <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;color:#475569;margin-bottom:16px;">
                    <strong>1. Payment Confirmation:</strong> Once your deposit is processed, you'll receive a payment confirmation email with receipt.
                </div>
                <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;color:#475569;margin-bottom:16px;">
                    <strong>2. Travel Preparation:</strong> Our team will contact you 7 days before your safari to finalize arrangements and answer any questions.
                </div>
                <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;color:#475569;margin-bottom:16px;">
                    <strong>3. Safari Experience:</strong> Your professional guide and driver will meet you at the agreed location for an incredible Tanzania adventure.
                </div>
            </div>

            <div style="background-color:#f8fafc;border-radius:8px;padding:24px;text-align:center;">
                <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:16px;line-height:24px;color:#054422;margin-bottom:16px;">
                    <strong>Have Questions?</strong>
                </div>
                <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;color:#475569;margin-bottom:20px;">
                    Our dedicated customer service team is here to assist you every step of the way.
                </div>
                <div style="font-family:'Segoe UI',Arial,Helvetica,sans-serif;font-size:14px;line-height:20px;color:#475569;">
                    <strong>Customer Support:</strong><br>
                    📧 Email: <a href="mailto:info@reputabletours.com" style="color:#054422;text-decoration:none;font-weight:500;">info@reputabletours.com</a><br>
                    📱 Phone/WhatsApp: <a href="tel:+255675255523" style="color:#054422;text-decoration:none;font-weight:500;">+255 675 255 523</a><br>
                    🌐 Website: <a href="{{ config('app.url') }}" style="color:#054422;text-decoration:none;font-weight:500;">{{ config('app.url') }}</a>
                </div>
                <div style="margin-top:20px;">
                    <a href="{{ config('app.url') }}/contact" style="display:inline-block;background-color:#EA6D24;color:white;padding:12px 24px;border-radius:6px;text-decoration:none;font-weight:600;font-size:14px;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
                        Contact Our Team
                    </a>
                </div>
            </div>
        </div>
        <div class="footer">
            Reputable Tours Email System V1.1.0.2026 - FeedTan CMG Design | Sent on {{ now()->format('M d, Y \a\t g:i A') }}
        </div>
    </div>
</body>
</html>