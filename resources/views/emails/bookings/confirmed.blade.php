<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed - Reputable Tours</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; background-color: #f0f4f8; font-family: 'Poppins', sans-serif; color: #333; line-height: 1.6; }
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
        .price-row.total { border-top: 2px solid #e5e7eb; padding-top: 12px; margin-top: 12px; font-weight: 700; font-size: 16px; color: #1f2937; }
        
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
            <p class="greeting">Dear {{ $booking->customer_name }},</p>
            <p style="font-size: 14px; color: #4a5568;">Your safari has been officially confirmed! We are excited to welcome you for {{ $booking->tour->name }}.</p>

            <div class="card">
                <div class="card-header">
                    <span class="icon">🎉</span>
                    <h4>Safari Imeidhinishwa! - Booking #{{ $booking->id }}</h4>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #006400; margin-bottom: 10px;">Booking Details</h3>
                    <div class="detail-item">
                        <span class="detail-label">Booking Reference:</span>
                        <span class="detail-value">#{{ $booking->id }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Start Date:</span>
                        <span class="detail-value">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M, Y') }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Status:</span>
                        <span class="detail-value">{{ ucfirst($booking->status) }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Payment:</span>
                        <span class="detail-value">{{ strtoupper($booking->payment_status) }}</span>
                    </div>
                </div>
                
                <div style="margin-bottom: 20px;">
                    <h3 style="color: #006400; margin-bottom: 10px;">Financial Summary</h3>
                    <div class="detail-item">
                        <span class="detail-label">Total Amount:</span>
                        <span class="detail-value">${{ number_format($booking->total_price, 2) }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Reference Number:</span>
                        <span class="detail-value">{{ $booking->payment_reference }}</span>
                    </div>
                </div>
                
                <div class="button-container">
                    <a href="{{ config('app.url') }}" class="invest-button">Ona Nafasi Yangu</a>
                </div>
            </div>

            <div class="special-section">
                <h4><span class="icon">📋</span> Additional Information</h4>
                <p>Your itinerary is being prepared by our expert guides. Our team will contact you shortly with your digital welcome pack and preparation guide.</p>
                <p>Ikiwa una maswali ya haraka, reply to this email au wasiliana nasi kupitia WhatsApp.</p>
            </div>

            <div class="savings-tips" style="margin-top: 25px; background-color: #f7fafc; padding: 15px; border-left: 5px solid #38a169; border-radius: 10px;">
                <h4 style="color: #2f855a; margin-bottom: 10px;">💡 Preparation Tips</h4>
                <ul style="font-size: 14px; color: #4a5568; line-height: 1.6; margin-left: 20px;">
                    <li>Prepare your travel documents</li>
                    <li>Ensure your passport is valid for the duration of the trip</li>
                    <li>Pack appropriate clothing for the weather</li>
                    <li>Make a list of essential medications</li>
                </ul>
            </div>
            
            <p style="font-size: 14px; color: #4a5568;">We look forward to seeing you on your safari day!</p>

            <div class="signature">
                <p>Thank you,<br><strong>Reputable Tours Team</strong></p>
                <p style="font-weight: 600; color: #006400;">Let's Explore Together! 🌍</p>
            </div>
        </div>
        <div class="footer">
            Reputable Tours Booking System V1.1.0.2026 | Booking confirmed on {{ now()->format('M d, Y \a\t g:i A') }}
        </div>
    </div>
</body>
</html>
