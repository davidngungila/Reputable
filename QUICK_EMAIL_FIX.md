# 🚨 QUICK EMAIL FIX FOR LIVE SERVER

## 🎯 PROBLEM IDENTIFIED
Your SMTP host `mail.reputabletours.com` doesn't exist. The correct Hostinger SMTP host is `smtp.hostinger.com`.

## ⚡ IMMEDIATE FIX (RUN ON LIVE SERVER)

### Option 1: Quick Fix (Recommended)
```bash
# Run this command on your live server:
curl -s https://raw.githubusercontent.com/davidngungila/Reputable/main/fix-live-email-config.sh | bash
```

### Option 2: Manual Fix
```bash
# 1. Edit .env file
nano .env

# 2. Find and replace these lines:
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
MAIL_USERNAME=info@reputabletours.com
MAIL_PASSWORD=YOUR_ACTUAL_HOSTINGER_PASSWORD

# 3. Clear and rebuild cache
php artisan config:clear
php artisan config:cache

# 4. Test email
php artisan email:send-test --to=davidngungila@gmail.com
```

## 🔧 SPECIFIC COMMANDS FOR YOUR SERVER

### Step 1: Fix SMTP Configuration
```bash
# Remove incorrect configuration
sed -i '/^MAIL_HOST=/d' .env
sed -i '/^MAIL_PORT=/d' .env
sed -i '/^MAIL_ENCRYPTION=/d' .env

# Add correct configuration
echo "MAIL_HOST=smtp.hostinger.com" >> .env
echo "MAIL_PORT=465" >> .env
echo "MAIL_ENCRYPTION=ssl" >> .env
```

### Step 2: Update Password (IMPORTANT!)
```bash
# Replace YOUR_PASSWORD with actual Hostinger password
sed -i 's/MAIL_PASSWORD=.*/MAIL_PASSWORD=YOUR_PASSWORD/' .env
```

### Step 3: Clear Caches
```bash
php artisan config:clear
php artisan config:cache
```

### Step 4: Test Email
```bash
php artisan email:send-test --to=davidngungila@gmail.com
```

## 🌟 ALTERNATIVE: GMAIL SETUP (IF HOSTINGER FAILS)

### Configure Gmail App Password
```bash
# 1. Create Gmail App Password first
# 2. Run this command with your app password:
php artisan configure:gmail-email YOUR_GMAIL_APP_PASSWORD
```

### Manual Gmail Configuration
```bash
# Add to .env:
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
MAIL_USERNAME=your-gmail@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_FROM_ADDRESS=info@reputabletours.com
```

## 🔍 TROUBLESHOOTING CHECKLIST

### ✅ Check These Items:
1. **SMTP Host**: Should be `smtp.hostinger.com` (not `mail.reputabletours.com`)
2. **Port**: Should be `465` with SSL encryption
3. **Password**: Must be actual Hostinger email password
4. **Email Account**: info@reputabletours.com must be active

### ✅ Test Steps:
```bash
# 1. Test basic connectivity
php artisan email:send-test --to=davidngungila@gmail.com

# 2. If still fails, check configuration
php artisan test:email-working

# 3. Check logs for errors
tail -f storage/logs/laravel.log | grep -i email
```

### ✅ Email Delivery Checks:
1. **Check Spam/Junk folders** in Gmail
2. **Add to Contacts**: info@reputabletours.com
3. **Check Promotions/Social tabs** in Gmail
4. **Wait 5-10 minutes** for delivery

## 🚨 EMERGENCY SOLUTIONS

### If All Else Fails:
```bash
# 1. Use SendGrid (if API key available)
echo "SENDGRID_API_KEY=your_sendgrid_api_key" >> .env

# 2. Use Mailgun (if configured)
echo "MAILGUN_API_KEY=your_mailgun_api_key" >> .env
echo "MAILGUN_DOMAIN=your_mailgun_domain" >> .env

# 3. Test backup services
php artisan test:email-fallback
```

### Quick Email Test with Multiple Services:
```bash
# Test all available email services
php artisan test:email-multi --to=davidngungila@gmail.com
```

## 📊 EXPECTED RESULTS

### ✅ Success Indicators:
- **Command Output**: "✅ Test email sent successfully!"
- **Email Arrival**: Within 1-5 minutes
- **From Address**: info@reputabletours.com
- **Subject**: Should mention "Reputable Tours"

### ❌ Failure Indicators:
- **Connection Errors**: "Connection could not be established"
- **Authentication Errors**: "Authentication failed"
- **No Email Received**: Even after 10 minutes

## 🎯 FINAL VERIFICATION

### After Fix, Run These Tests:
```bash
# 1. Basic email test
php artisan email:send-test --to=davidngungila@gmail.com

# 2. Booking email test
php artisan test:booking-email 23

# 3. Full system test
php artisan test:email-system --to=davidngungila@gmail.com
```

### Check These URLs:
- Contact Form: `https://yourdomain.com/contact`
- Admin Panel: `https://yourdomain.com/admin`

---

## 📞 NEED HELP?

If emails still don't work after these fixes:

1. **Check Hostinger Account**: Ensure info@reputabletours.com is active
2. **Verify Password**: Use correct Hostinger email password
3. **Try Gmail**: Set up Gmail App Password as backup
4. **Contact Support**: Check with Hostinger email support

**🚀 The main issue is the wrong SMTP host. Fix that and emails should work!**
