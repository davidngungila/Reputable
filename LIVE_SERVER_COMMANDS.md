# 🚀 LIVE SERVER EMAIL SYSTEM COMMANDS

## ⚡ QUICK DEPLOYMENT (RECOMMENDED)

### One-Command Deployment
```bash
# Run this single command on your live server:
curl -s https://raw.githubusercontent.com/davidngungila/Reputable/main/deploy-email-system.sh | bash -s your-email@example.com
```

### Manual Deployment Steps
```bash
# 1. Pull latest changes
git pull origin main

# 2. Install dependencies
composer install --no-dev --optimize-autoloader

# 3. Run migrations
php artisan migrate --force

# 4. Clear and optimize caches
php artisan cache:clear && php artisan view:clear && php artisan route:clear && php artisan config:clear
php artisan optimize

# 5. Test email system
php artisan email:send-test --to=your-email@example.com
```

## 📧 EMAIL TESTING COMMANDS

### Basic Email Test
```bash
# Test basic email connectivity
php artisan email:send-test --to=your-email@example.com
```

### Comprehensive Email System Test
```bash
# Test all email services including backup
php artisan test:email-system --to=your-email@example.com
```

### Booking Email Test
```bash
# Test booking confirmation emails with PDF
php artisan test:booking-email 23
```

### Full Booking Flow Test
```bash
# Test complete booking and email workflow
php artisan test:full-booking-flow 23
```

## ⚙️ EMAIL CONFIGURATION

### Configure Hostinger Email
```bash
# Configure Hostinger SMTP (replace YOUR_PASSWORD)
php artisan configure:hostinger-email YOUR_PASSWORD
```

### Alternative Email Setup
```bash
# Direct Hostinger configuration
php artisan setup:hostinger-direct YOUR_PASSWORD

# Update email password
php artisan update:email-password NEW_PASSWORD
```

## 🔍 DIAGNOSTIC COMMANDS

### Email System Diagnosis
```bash
# Complete email system diagnostic
php artisan diagnose:email
```

### Check Email Services
```bash
# Test all email service providers
php artisan email:check-services
```

### Test SMTP Connection
```bash
# Test SMTP connectivity
php artisan email:test-smtp
```

## 🚨 EMERGENCY FIXES

### Quick Emergency Fix
```bash
# Run emergency fix script
curl -s https://raw.githubusercontent.com/davidngungila/Reputable/main/emergency-email-fix.sh | bash
```

### Manual Emergency Steps
```bash
# 1. Clear all caches
php artisan cache:clear && php artisan view:clear && php artisan route:clear && php artisan config:clear

# 2. Rebuild configuration
php artisan config:cache && php artisan optimize

# 3. Test email
php artisan email:send-test --to=your-email@example.com

# 4. If still failing, run diagnosis
php artisan diagnose:email
```

## 📊 MONITORING COMMANDS

### Monitor Email Logs
```bash
# Real-time email log monitoring
tail -f storage/logs/laravel.log | grep -i email

# Check recent email attempts
grep -E "(Email|Mail|SMTP)" storage/logs/laravel.log | tail -10
```

### Check System Health
```bash
# Laravel system health check
php artisan about
```

## 🎯 VERIFICATION TESTS

### Test All Email Templates
```bash
# Test booking template
php artisan email:test-template booking-created --to=your-email@example.com

# Test inquiry template
php artisan email:test-template inquiry-received --to=your-email@example.com
```

### Verify Inquiry System
```bash
# Check inquiry fields
php artisan tinker --execute="print_r(\Schema::getColumnListing('inquiries'));"

# Test inquiry processing
php artisan test:inquiry-system
```

## 🔄 MAINTENANCE COMMANDS

### Weekly Maintenance
```bash
# Clear caches
php artisan cache:clear && php artisan view:clear && php artisan route:clear && php artisan config:clear

# Optimize
php artisan optimize

# Test email system
php artisan email:send-test --to=your-email@example.com
```

### Monthly Maintenance
```bash
# Update dependencies
composer update --no-dev

# Clear and rebuild
php artisan cache:clear && php artisan view:clear && php artisan route:clear && php artisan config:clear
php artisan optimize

# Full system test
php artisan test:email-system --to=your-email@example.com
```

## 📱 TESTING URLs

After deployment, test these URLs in your browser:

### Contact Forms
- Basic Contact: `https://yourdomain.com/contact`
- Advanced Inquiry: `https://yourdomain.com/contact/inquiry`

### Booking System
- Checkout: `https://yourdomain.com/bookings/23/checkout`
- Confirmation: `https://yourdomain.com/bookings/23/confirm`

### Admin Panel
- Dashboard: `https://yourdomain.com/admin`
- Bookings: `https://yourdomain.com/admin/bookings`

## 🎯 SUCCESS CHECKLIST

### ✅ Deployment Success When:
- [ ] `git pull origin main` completes without errors
- [ ] `composer install` finishes successfully
- [ ] `php artisan migrate --force` runs without issues
- [ ] `php artisan email:send-test --to=your-email@example.com` sends email
- [ ] `php artisan test:booking-email 23` completes successfully
- [ ] Contact forms load and submit correctly
- [ ] Booking checkout page works properly

### ✅ Email System Working When:
- [ ] Test email arrives in inbox
- [ ] Booking confirmation email includes PDF attachment
- [ ] Inquiry notifications send to both customer and admin
- [ ] Email templates display with proper branding (#054422, #EA6D24)
- [ ] No email-related errors in logs

## 🆘 TROUBLESHOOTING

### If Emails Don't Send:
```bash
# 1. Run diagnostic
php artisan diagnose:email

# 2. Check configuration
grep -E "(MAIL_|EMAIL_)" .env

# 3. Test SMTP
php artisan email:test-smtp

# 4. Run emergency fix
curl -s https://raw.githubusercontent.com/davidngungila/Reputable/main/emergency-email-fix.sh | bash
```

### If Pages Don't Load:
```bash
# 1. Clear caches
php artisan cache:clear && php artisan view:clear && php artisan route:clear

# 2. Check permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# 3. Optimize
php artisan optimize
```

### If Database Issues:
```bash
# 1. Check connection
php artisan db:show

# 2. Run migrations
php artisan migrate --force

# 3. Check specific migration
php artisan migrate --path=database/migrations/2026_05_01_000001_add_fields_to_inquiries_table.php
```

---

## 📞 IMPORTANT NOTES

1. **Replace `your-email@example.com`** with your actual email address
2. **Run commands from project root directory**
3. **Check logs** if anything fails: `tail -f storage/logs/laravel.log`
4. **Backup .env file** before making changes
5. **Test thoroughly** after deployment

## 🎉 DEPLOYMENT COMPLETE!

After running these commands:
- ✅ Your email system will be fully functional
- ✅ All inquiry forms will capture complete data
- ✅ Booking confirmations will send with PDF invoices
- ✅ Admin notifications will work properly
- ✅ Emergency fixes are available if needed

**🚀 Your Reputable Tours email system is now ready for production!**
