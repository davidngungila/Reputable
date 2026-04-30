<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reputable Tours - Professional Email</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333333;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 25%, #fdc830 50%, #ff4444 75%, #cc2936 100%);
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><path d="M0,10 Q25,0 50,10 T100,10 L100,20 L0,20 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: cover;
            opacity: 0.3;
        }
        
        .logo-section {
            position: relative;
            z-index: 1;
        }
        
        .logo-text {
            font-size: 32px;
            font-weight: bold;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        
        .tagline {
            font-size: 14px;
            color: #ffffff;
            opacity: 0.9;
            font-style: italic;
        }
        
        .sun-icon {
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, #fdc830 0%, #ff6b35 70%, #ff4444 100%);
            border-radius: 50%;
            margin: 0 auto 15px;
            position: relative;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.5);
        }
        
        .sun-rays {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
        }
        
        .sun-rays::before,
        .sun-rays::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ff6b35, transparent);
            transform: translate(-50%, -50%);
        }
        
        .sun-rays::after {
            transform: translate(-50%, -50%) rotate(90deg);
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 24px;
            color: #ff6b35;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .message {
            font-size: 16px;
            color: #555555;
            margin-bottom: 25px;
            line-height: 1.8;
        }
        
        .highlight-box {
            background: linear-gradient(135deg, #fff5f0 0%, #fff0e5 100%);
            border-left: 4px solid #ff6b35;
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }
        
        .highlight-title {
            font-size: 18px;
            font-weight: 600;
            color: #ff6b35;
            margin-bottom: 10px;
        }
        
        .feature-list {
            list-style: none;
            margin: 20px 0;
        }
        
        .feature-list li {
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
        }
        
        .feature-list li:last-child {
            border-bottom: none;
        }
        
        .feature-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            margin: 20px 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
        }
        
        .footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
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
            min-width: 200px;
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
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 5px;
            text-align: center;
            line-height: 35px;
            color: white;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        
        .social-link:hover {
            background: #ff6b35;
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            font-size: 12px;
            opacity: 0.7;
        }
        
        .signature {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }
        
        .signature-text {
            font-style: italic;
            color: #777777;
            margin-bottom: 10px;
        }
        
        .signature-name {
            font-weight: 600;
            color: #ff6b35;
        }
        
        .signature-title {
            font-size: 14px;
            color: #999999;
        }
        
        @media (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 0;
            }
            
            .header {
                padding: 20px;
            }
            
            .logo-text {
                font-size: 24px;
            }
            
            .content {
                padding: 25px 20px;
            }
            
            .footer-content {
                flex-direction: column;
            }
            
            .footer-section {
                margin: 15px 0;
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
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="content">
            <h1 class="greeting">🌅 Hello {{ $name ?? 'Valued Customer' }}!</h1>
            
            <div class="message">
                <p>Welcome to an extraordinary journey with <strong>Reputable Tours</strong>! We're thrilled to share the magic of Tanzania's breathtaking landscapes, magnificent wildlife, and vibrant culture with you.</p>
                
                <p>Our professional email system is now fully operational, ensuring seamless communication for all your travel inquiries and booking needs.</p>
            </div>
            
            <!-- Highlight Box -->
            <div class="highlight-box">
                <h3 class="highlight-title">🎉 Exciting News!</h3>
                <p>We've successfully upgraded our email system with advanced professional templates that match our brand identity and provide you with the best communication experience.</p>
            </div>
            
            <!-- Features List -->
            <ul class="feature-list">
                <li>
                    <div class="feature-icon">✈</div>
                    <div>
                        <strong>Expertly Curated Tours</strong><br>
                        <small>Handcrafted itineraries for unforgettable experiences</small>
                    </div>
                </li>
                <li>
                    <div class="feature-icon">🦁</div>
                    <div>
                        <strong>Wildlife Adventures</strong><br>
                        <small>Serengeti safaris, Ngorongoro crater, and more</small>
                    </div>
                </li>
                <li>
                    <div class="feature-icon">🏔️</div>
                    <div>
                        <strong>Mountain Expeditions</strong><br>
                        <small>Kilimanjaro climbs, Meru treks, and hiking adventures</small>
                    </div>
                </li>
                <li>
                    <div class="feature-icon">🏖️</div>
                    <div>
                        <strong>Beach & Cultural Experiences</strong><br>
                        <small>Zanzibar beaches, cultural visits, and local traditions</small>
                    </div>
                </li>
            </ul>
            
            <!-- Call to Action -->
            <div style="text-align: center;">
                <a href="{{ $ctaUrl ?? 'https://reputabletours.com' }}" class="cta-button">
                    Explore Our Adventures →
                </a>
            </div>
            
            <!-- Additional Information -->
            <div class="message">
                <p><strong>Why Choose Reputable Tours?</strong></p>
                <p>With years of experience and a passion for Tanzania, we ensure every journey is safe, comfortable, and truly memorable. Our professional guides, comfortable accommodations, and attention to detail set us apart.</p>
            </div>
            
            <!-- Signature -->
            <div class="signature">
                <p class="signature-text">Looking forward to creating amazing memories with you!</p>
                <div class="signature-name">The Reputable Tours Team</div>
                <div class="signature-title">Your Tanzanian Adventure Specialists</div>
            </div>
        </div>
        
        <!-- Footer Section -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h4 class="footer-title">📍 Contact Us</h4>
                    <div class="footer-info">
                        Email: info@reputabletours.com<br>
                        Phone: +255 123 456 789<br>
                        Location: Arusha, Tanzania
                    </div>
                </div>
                <div class="footer-section">
                    <h4 class="footer-title">🕐 Business Hours</h4>
                    <div class="footer-info">
                        Monday - Friday: 8:00 AM - 6:00 PM<br>
                        Saturday: 9:00 AM - 4:00 PM<br>
                        Sunday: Emergency Only
                    </div>
                </div>
                <div class="footer-section">
                    <h4 class="footer-title">🌍 Follow Us</h4>
                    <div class="social-links">
                        <a href="#" class="social-link">f</a>
                        <a href="#" class="social-link">t</a>
                        <a href="#" class="social-link">i</a>
                        <a href="#" class="social-link">in</a>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; {{ date('Y') }} Reputable Tours. All rights reserved. | Arusha, Tanzania</p>
                <p>This email was sent because you're subscribed to our newsletter or have inquired about our services.</p>
            </div>
        </div>
    </div>
</body>
</html>
