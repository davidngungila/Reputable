<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; padding: 0; background-color: #f0f4f8; font-family: 'Poppins', sans-serif; color: #333; line-height: 1.6; }
        .email-container { max-width: 600px; margin: 30px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; }
        .header { background: #006400; padding: 30px 25px; text-align: center; color: white; }
        .header .title { font-size: 26px; font-weight: 700; margin-bottom: 5px; }
        .header .sub-title { font-size: 14px; opacity: 0.9; }
        .content { padding: 30px 25px; }
        .greeting { font-size: 18px; font-weight: 600; color: #2d3748; margin-bottom: 15px; }
        
        .card { background-color: #f7fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 20px; margin-bottom: 25px; }
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
        
        .header img {
            width: 120px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .header p {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .welcome-message {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .welcome-message h2 {
            color: #1f2937;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .welcome-message p {
            color: #6b7280;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .inquiry-card {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            border-left: 4px solid #3b82f6;
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .inquiry-details {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .detail-label {
            color: #6b7280;
            font-weight: 500;
        }
        
        .detail-value {
            color: #1f2937;
            font-weight: 600;
        }
        
        .message-preview {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            margin-top: 20px;
        }
        
        .message-preview h3 {
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }
        
        .message-text {
            color: #4b5563;
            font-size: 14px;
            line-height: 1.6;
            font-style: italic;
        }
        
        .timeline {
            background: #f0f9ff;
            border-left: 4px solid #0ea5e9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .timeline h3 {
            color: #0c4a6e;
            font-size: 18px;
            margin-bottom: 15px;
        }
        
        .timeline ol {
            color: #0c4a6e;
            margin-left: 20px;
            line-height: 1.8;
        }
        
        .timeline li {
            margin-bottom: 8px;
        }
        
        .cta-section {
            text-align: center;
            margin: 30px 0;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(59, 130, 246, 0.4);
        }
        
        .footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
        
        .footer p {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 8px;
        }
        
        .footer a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .content {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>{{ $heading }}</h1>
            <p>{{ $subheading }}</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <!-- Welcome Message -->
            <div class="welcome-message">
                <h2>Thank You for Contacting Us!</h2>
                <p>Hello {{ $inquiry->name ?? 'Guest' }}, we appreciate your interest in Reputable Tours and look forward to helping you plan your African adventure.</p>
            </div>
            
            <!-- Inquiry Card -->
            <div class="inquiry-card">
                <h3 style="color: #1e40af; font-size: 18px; margin-bottom: 15px;">📋 Your Inquiry Details</h3>
                
                <div class="inquiry-details">
                    <div class="detail-item">
                        <span class="detail-label">Name:</span>
                        <span class="detail-value">{{ $inquiry->name }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value">{{ $inquiry->email }}</span>
                    </div>
                    @if($inquiry->phone)
                    <div class="detail-item">
                        <span class="detail-label">Phone:</span>
                        <span class="detail-value">{{ $inquiry->phone }}</span>
                    </div>
                    @endif
                    @if($inquiry->tour)
                    <div class="detail-item">
                        <span class="detail-label">Interested Tour:</span>
                        <span class="detail-value">{{ $inquiry->tour->name }}</span>
                    </div>
                    @endif
                </div>
                
                <!-- Message Preview -->
                <div class="message-preview">
                    <h3>Your Message</h3>
                    <p class="message-text">"{{ Str::limit($inquiry->message, 200) }}"</p>
                </div>
            </div>
            
            <!-- Next Steps -->
            <div class="timeline">
                <h3>🔄 What Happens Next?</h3>
                <ol>
                    <li>Our team reviews your inquiry within 2-4 hours</li>
                    <li>We prepare a personalized response based on your interests</li>
                    <li>You'll receive a detailed quote and recommendations</li>
                    <li>Work with our specialists to craft your perfect itinerary</li>
                </ol>
            </div>
            
            <!-- Quick Actions -->
            <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
                <h3 style="color: #92400e; font-size: 18px; margin-bottom: 10px;">💡 While You Wait</h3>
                <ul style="color: #92400e; margin-left: 20px; line-height: 1.8;">
                    <li>Browse our <a href="{{ $website_url }}/tours" style="color: #92400e; font-weight: 600;">tour collection</a> for inspiration</li>
                    <li>Read our <a href="{{ $website_url }}/blog" style="color: #92400e; font-weight: 600;">travel guides</a> and tips</li>
                    <li>Follow us on social media for daily safari inspiration</li>
                </ul>
            </div>
            
            <!-- CTA Section -->
            <div class="cta-section">
                <p style="margin-bottom: 20px; color: #6b7280; font-size: 16px;">
                    Have questions in the meantime?
                </p>
                <a href="mailto:{{ $support_email }}" class="cta-button">
                    Contact Our Team
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p><strong>Need Immediate Assistance?</strong></p>
            <p>Email: <a href="mailto:{{ $support_email }}">{{ $support_email }}</a></p>
            <p>WhatsApp: <a href="https://wa.me/255675255523" target="_blank">+255 675 255 523</a></p>
            <p style="font-size: 12px; color: #9ca3af; margin-top: 10px;">
                Inquiry received on {{ now()->format('M d, Y \a\t g:i A') }}
            </p>
            <p style="font-size: 12px; color: #9ca3af; margin-top: 10px;">
                © {{ date('Y') }} Reputable Tours. Your gateway to unforgettable African adventures.
            </p>
        </div>
    </div>
</body>
</html>
