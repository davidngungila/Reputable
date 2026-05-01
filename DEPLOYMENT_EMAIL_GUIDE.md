# 🚀 Live Server Email System Deployment Guide

## 📋 PRE-DEPLOYMENT CHECKLIST

### 1. Server Requirements Verification
```bash
# Check PHP version (should be 8.1+)
php -v

# Check required PHP extensions
php -m | grep -E "(mbstring|openssl|tokenizer|xml|curl|fileinfo|gd)"

# Check Laravel requirements
php artisan about
```

### 2. Environment Configuration
```bash
# Backup current .env file
cp .env .env.backup

# Verify email configuration
grep -E "(MAIL_|EMAIL_)" .env
```

## 🔄 DEPLOYMENT COMMANDS

### Step 1: Pull Latest Changes
```bash
# Navigate to project directory
cd /path/to/your/project

# Pull latest changes
git pull origin main

# Verify deployment hash
git log --oneline -1
```

### Step 2: Install Dependencies
```bash
# Install/update Composer dependencies
composer install --no-dev --optimize-autoloader

# Clear and cache configurations
php artisan config:clear
php artisan config:cache
```

### Step 3: Database Migration
```bash
# Run database migrations
php artisan migrate --force

# Verify new inquiry fields
php artisan tinker --execute="echo 'Inquiry table columns: '; print_r(\Schema::getColumnListing('inquiries'));"
```

### Step 4: Clear Caches
```bash
# Clear all caches
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear

# Re-optimize for production
php artisan optimize
```

## 📧 EMAIL SYSTEM TESTING COMMANDS

### Command 1: Basic Email Test
```bash
# Test basic email connectivity
php artisan email:send-test --to=your-email@example.com
```

### Command 2: Comprehensive Email System Test
```bash
# Test entire email system with backup services
php artisan test:email-system --to=your-email@example.com
```

### Command 3: Booking Email Test
```bash
# Test booking confirmation emails
php artisan test:booking-email 23
```

### Command 4: Full Booking Flow Test
```bash
# Test complete booking and email flow
php artisan test:full-booking-flow 23
```

### Command 5: Email Configuration Diagnosis
```bash
# Diagnose email configuration issues
php artisan diagnose:email
```

## ⚙️ EMAIL CONFIGURATION COMMANDS

### Configure Hostinger Email (Recommended)
```bash
# Configure Hostinger SMTP settings
php artisan configure:hostinger-email YOUR_PASSWORD

# Alternative: Direct Hostinger setup
php artisan setup:hostinger-direct YOUR_PASSWORD
```

### Test Email Gateway
```bash
# Test email gateway configuration
php artisan email:test-gateway
```

### Update Email Password
```bash
# Update email password if needed
php artisan update:email-password NEW_PASSWORD
```

## 🔍 VERIFICATION COMMANDS

### Check Email Services Status
```bash
# Check all email service providers
php artisan email:check-services

# Verify SMTP connection
php artisan email:test-smtp

# Test backup email services (SendGrid/Mailgun)
php artisan email:test-backup
```

### Verify Inquiry System
```bash
# Test inquiry form processing
php artisan test:inquiry-system

# Check inquiry email templates
php artisan email:test-inquiry-templates
```

## 🚨 TROUBLESHOOTING COMMANDS

### If Emails Fail to Send
```bash
# Check email logs
tail -f storage/logs/laravel.log | grep -i email

# Test email configuration
php artisan diagnose:email

# Reset email configuration
php artisan email:reset-config
```

### If Database Issues
```bash
# Check migration status
php artisan migrate:status

# Run specific migration
php artisan migrate --path=database/migrations/2026_05_01_000001_add_fields_to_inquiries_table.php

# Reset and re-run migrations (LAST RESORT)
php artisan migrate:fresh --force
```

### If Cache Issues
```bash
# Clear all caches
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear

# Restart queue workers if using queues
php artisan queue:restart
```

## 📊 MONITORING COMMANDS

### Monitor Email Sending
```bash
# Monitor email logs in real-time
tail -f storage/logs/laravel.log | grep -E "(Email|Mail|SMTP)"

# Check recent email attempts
grep -E "(Email|Mail|SMTP)" storage/logs/laravel.log | tail -10
```

### Monitor System Health
```bash
# Check system health
php artisan system:health

# Monitor application performance
php artisan monitor:performance
```

## 🔄 POST-DEPLOYMENT VERIFICATION

### Test All Email Templates
```bash
# Test all email templates
php artisan email:test-all-templates --to=your-email@example.com

# Verify specific templates
php artisan email:test-template booking-created --to=your-email@example.com
php artisan email:test-template inquiry-received --to=your-email@example.com
```

### Test User Workflows
```bash
# Test complete user journey
php artisan test:user-journey --email=your-email@example.com

# Test admin notifications
php artisan test:admin-notifications --to=admin@example.com
```

## 📱 LIVE TESTING URLs

After deployment, test these URLs:

### Inquiry Forms
- Basic Contact: `https://yourdomain.com/contact`
- Advanced Inquiry: `https://yourdomain.com/contact/inquiry`

### Booking System
- Booking Checkout: `https://yourdomain.com/bookings/23/checkout`
- Booking Confirmation: `https://yourdomain.com/bookings/23/confirm`

### Admin Testing
- Admin Dashboard: `https://yourdomain.com/admin`
- Email Logs: `https://yourdomain.com/admin/email-logs`

## 🎯 SUCCESS CRITERIA

### ✅ Email System Working When:
- [ ] Basic test email sends successfully
- [ ] Booking confirmation emails send with PDF attachments
- [ ] Inquiry notifications send to both customer and admin
- [ ] Admin booking alerts send successfully
- [ ] Email templates render correctly with brand colors
- [ ] All new inquiry fields capture and display properly

### ✅ Performance Indicators:
- [ ] Page load times under 3 seconds
- [ ] Email sending completes within 30 seconds
- [ ] No error logs related to email functionality
- [ ] All database migrations applied successfully

## 🆘 EMERGENCY COMMANDS

### Rollback Deployment
```bash
# Quick rollback to previous version
git checkout PREVIOUS_COMMIT_HASH
composer install --no-dev
php artisan optimize
```

### Emergency Email Reset
```bash
# Reset email to default configuration
php artisan email:emergency-reset

# Force email configuration
php artisan email:force-config
```

---

## 📞 SUPPORT

If you encounter issues:
1. Run the diagnostic command: `php artisan diagnose:email`
2. Check logs: `tail -f storage/logs/laravel.log`
3. Verify configuration: `php artisan config:cache && php artisan config:clear`

**Remember to replace `your-email@example.com` with your actual email address for testing!**
