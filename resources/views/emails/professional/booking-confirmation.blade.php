<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Reputable Tours</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #2c3e50;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 650px;
            margin: 20px auto;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #e9ecef;
        }
        
        .header {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 25%, #fdc830 50%, #ff4444 75%, #cc2936 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            animation: float 20s linear infinite;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-50px, -50px) rotate(360deg); }
        }
        
        .logo-section {
            position: relative;
            z-index: 1;
        }
        
        .sun-icon {
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, #fdc830 0%, #ff6b35 50%, #ff4444 100%);
            border-radius: 50%;
            margin: 0 auto 20px;
            position: relative;
            box-shadow: 0 0 30px rgba(255, 107, 53, 0.6);
            animation: pulse 3s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .sun-rays {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
        }
        
        .sun-rays::before,
        .sun-rays::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.8), transparent);
            transform: translate(-50%, -50%);
        }
        
        .sun-rays::after {
            transform: translate(-50%, -50%) rotate(90deg);
        }
        
        .logo-text {
            font-size: 36px;
            font-weight: 800;
            color: #ffffff;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
            margin-bottom: 8px;
            letter-spacing: 2px;
        }
        
        .tagline {
            font-size: 16px;
            color: #ffffff;
            opacity: 0.95;
            font-style: italic;
        }
        
        .confirmation-badge {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            margin-top: 15px;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }
        
        .content {
            padding: 50px 40px;
        }
        
        .booking-title {
            font-size: 28px;
            color: #ff6b35;
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .booking-subtitle {
            font-size: 16px;
            color: #6c757d;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .booking-details {
            background: linear-gradient(135deg, #fff5f0 0%, #fff0e5 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border: 2px solid #ff6b35;
            position: relative;
        }
        
        .booking-details::before {
            content: '🎫';
            position: absolute;
            top: -15px;
            left: 30px;
            background: #ff6b35;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 107, 53, 0.1);
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #495057;
            display: flex;
            align-items: center;
        }
        
        .detail-label::before {
            content: '';
            width: 8px;
            height: 8px;
            background: #ff6b35;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .detail-value {
            font-weight: 500;
            color: #2c3e50;
        }
        
        .highlight-value {
            color: #ff6b35;
            font-weight: 700;
            font-size: 18px;
        }
        
        .next-steps {
            background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
        }
        
        .next-steps-title {
            font-size: 20px;
            color: #ff6b35;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .next-steps-title::before {
            content: '📋';
            margin-right: 10px;
            font-size: 24px;
        }
        
        .steps-list {
            list-style: none;
        }
        
        .steps-list li {
            padding: 12px 0;
            padding-left: 30px;
            position: relative;
            color: #495057;
        }
        
        .steps-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 12px;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
        
        .contact-info {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            text-align: center;
        }
        
        .contact-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: #fdc830;
        }
        
        .contact-details {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .contact-item {
            flex: 1;
            min-width: 150px;
        }
        
        .contact-item strong {
            color: #fdc830;
            display: block;
            margin-bottom: 5px;
        }
        
        .cta-section {
            text-align: center;
            margin: 40px 0;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            padding: 18px 40px;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 53, 0.5);
        }
        
        .footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2c3e50 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        
        .footer-section {
            flex: 1;
            min-width: 180px;
            margin: 10px;
        }
        
        .footer-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #fdc830;
        }
        
        .footer-info {
            font-size: 14px;
            line-height: 1.6;
            opacity: 0.9;
        }
        
        .social-links {
            margin: 20px 0;
        }
        
        .social-link {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 8px;
            text-align: center;
            line-height: 40px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: bold;
        }
        
        .social-link:hover {
            background: #ff6b35;
            transform: scale(1.1);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            font-size: 12px;
            opacity: 0.7;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 0;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .logo-text {
                font-size: 28px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .booking-details {
                padding: 20px;
            }
            
            .detail-row {
                flex-direction: column;
                gap: 5px;
            }
            
            .contact-details {
                flex-direction: column;
            }
            
            .footer-content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <div class="logo-section">
                <div class="sun-icon">
                    <div class="sun-rays"></div>
                </div>
                <div class="logo-text">Reputable Tours</div>
                <div class="tagline">Your Gateway to Tanzanian Adventures</div>
                <div class="confirmation-badge">✓ BOOKING CONFIRMED</div>
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="content">
            <h1 class="booking-title">🎉 Booking Confirmed!</h1>
            <p class="booking-subtitle">Your Tanzanian adventure is all set. We're excited to host you!</p>
            
            <!-- Booking Details -->
            <div class="booking-details">
                <div class="detail-row">
                    <span class="detail-label">Booking Reference</span>
                    <span class="detail-value highlight-value">#{{ $bookingReference ?? 'RT2024001' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Guest Name</span>
                    <span class="detail-value">{{ $guestName ?? 'David Ngungila' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Tour Package</span>
                    <span class="detail-value">{{ $tourPackage ?? 'Serengeti Safari Experience' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Travel Dates</span>
                    <span class="detail-value">{{ $travelDates ?? 'June 15-22, 2024' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Number of Guests</span>
                    <span class="detail-value">{{ $guestCount ?? '2 Adults' }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Amount</span>
                    <span class="detail-value highlight-value">${{ $totalAmount ?? '2,450' }}</span>
                </div>
            </div>
            
            <!-- Next Steps -->
            <div class="next-steps">
                <h3 class="next-steps-title">What Happens Next?</h3>
                <ul class="steps-list">
                    <li>You'll receive a detailed itinerary within 24 hours</li>
                    <li>Our team will contact you to confirm special requirements</li>
                    <li>Payment instructions will be sent separately</li>
                    <li>Pre-departure information pack will be shared 2 weeks before travel</li>
                    <li>Emergency contact details will be provided 48 hours before departure</li>
                </ul>
            </div>
            
            <!-- Contact Information -->
            <div class="contact-info">
                <h3 class="contact-title">📞 Need to Contact Us?</h3>
                <div class="contact-details">
                    <div class="contact-item">
                        <strong>Emergency</strong>
                        +255 123 456 789
                    </div>
                    <div class="contact-item">
                        <strong>Office</strong>
                        +255 123 456 788
                    </div>
                    <div class="contact-item">
                        <strong>Email</strong>
                        info@reputabletours.com
                    </div>
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="cta-section">
                <a href="{{ $manageBookingUrl ?? '#' }}" class="cta-button">
                    Manage My Booking
                </a>
            </div>
        </div>
        
        <!-- Footer Section -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h4 class="footer-title">📍 Our Office</h4>
                    <div class="footer-info">
                        Arusha, Tanzania<br>
                        Near Mount Meru Hotel<br>
                        Open Daily: 8AM - 6PM
                    </div>
                </div>
                <div class="footer-section">
                    <h4 class="footer-title">🌍 Why Choose Us</h4>
                    <div class="footer-info">
                        10+ Years Experience<br>
                        Expert Local Guides<br>
                        100% Satisfaction Rate
                    </div>
                </div>
                <div class="footer-section">
                    <h4 class="footer-title">📱 Stay Connected</h4>
                    <div class="social-links">
                        <a href="#" class="social-link">f</a>
                        <a href="#" class="social-link">t</a>
                        <a href="#" class="social-link">i</a>
                        <a href="#" class="social-link">in</a>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; {{ date('Y') }} Reputable Tours. All rights reserved.</p>
                <p>This booking confirmation is for {{ $guestName ?? 'our valued customer' }}</p>
                <p>Booking Reference: #{{ $bookingReference ?? 'RT2024001' }}</p>
            </div>
        </div>
    </div>
</body>
</html>
