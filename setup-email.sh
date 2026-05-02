#!/bin/bash

echo "🚀 EMAIL CONFIGURATION SETUP"
echo "=========================="

echo "Choose your email provider:"
echo "1) Gmail SMTP (Recommended)"
echo "2) Hostinger SMTP"
echo "3) Mailtrap (Testing)"
echo "4) SendGrid (Production)"
read -p "Enter your choice (1-4): " choice

case $choice in
    1)
        echo "📧 Gmail SMTP Setup"
        read -p "Enter your Gmail address: " gmail
        read -p "Enter your Gmail App Password: " password
        
        echo "MAIL_MAILER=smtp" >> .env
        echo "MAIL_HOST=smtp.gmail.com" >> .env
        echo "MAIL_PORT=587" >> .env
        echo "MAIL_ENCRYPTION=tls" >> .env
        echo "MAIL_USERNAME=$gmail" >> .env
        echo "MAIL_PASSWORD=$password" >> .env
        echo "MAIL_FROM_ADDRESS=info@reputabletours.com" >> .env
        echo "MAIL_FROM_NAME=\"Reputable Tours\"" >> .env
        ;;
    2)
        echo "🌐 Hostinger SMTP Setup"
        read -p "Enter Hostinger email password: " password
        
        echo "MAIL_MAILER=smtp" >> .env
        echo "MAIL_HOST=smtp.hostinger.com" >> .env
        echo "MAIL_PORT=465" >> .env
        echo "MAIL_ENCRYPTION=ssl" >> .env
        echo "MAIL_USERNAME=info@reputabletours.com" >> .env
        echo "MAIL_PASSWORD=$password" >> .env
        echo "MAIL_FROM_ADDRESS=info@reputabletours.com" >> .env
        echo "MAIL_FROM_NAME=\"Reputable Tours\"" >> .env
        ;;
    3)
        echo "🧪 Mailtrap Setup"
        read -p "Enter Mailtrap username: " username
        read -p "Enter Mailtrap password: " password
        
        echo "MAIL_MAILER=smtp" >> .env
        echo "MAIL_HOST=smtp.mailtrap.io" >> .env
        echo "MAIL_PORT=2525" >> .env
        echo "MAIL_ENCRYPTION=tls" >> .env
        echo "MAIL_USERNAME=$username" >> .env
        echo "MAIL_PASSWORD=$password" >> .env
        echo "MAIL_FROM_ADDRESS=info@reputabletours.com" >> .env
        echo "MAIL_FROM_NAME=\"Reputable Tours\"" >> .env
        ;;
    4)
        echo "📨 SendGrid Setup"
        read -p "Enter SendGrid API Key: " api_key
        
        echo "MAIL_MAILER=sendgrid" >> .env
        echo "SENDGRID_API_KEY=$api_key" >> .env
        echo "MAIL_FROM_ADDRESS=info@reputabletours.com" >> .env
        echo "MAIL_FROM_NAME=\"Reputable Tours\"" >> .env
        ;;
    *)
        echo "❌ Invalid choice"
        exit 1
        ;;
esac

echo "🔧 Clearing caches..."
php artisan config:clear
php artisan config:cache

echo "✅ Email configuration complete!"
echo "📧 Test your email with: php artisan tinker"
echo "Then run: Mail::raw('Test email', function(\$mail) { \$mail->to('your-email@gmail.com')->subject('Test'); });"
