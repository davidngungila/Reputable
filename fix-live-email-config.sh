#!/bin/bash

# 🔧 Live Server Email Configuration Fix
# This script fixes the SMTP configuration for Hostinger email

set -e

echo "🔧 Fixing Live Server Email Configuration"
echo "======================================"

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

print_status() {
    echo -e "${GREEN}[✅]${NC} $1"
}

print_info() {
    echo -e "${BLUE}[ℹ️]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[⚠️]${NC} $1"
}

print_error() {
    echo -e "${RED}[❌]${NC} $1"
}

# Check current configuration
print_info "Checking current email configuration..."

# Create backup of .env
if [ -f .env ]; then
    cp .env .env.backup.$(date +%Y%m%d_%H%M%S)
    print_status "Backed up current .env file"
fi

# Fix SMTP configuration
print_info "Updating SMTP configuration for Hostinger..."

# Remove incorrect mail configuration
sed -i '/^MAIL_HOST=/d' .env 2>/dev/null || true
sed -i '/^MAIL_PORT=/d' .env 2>/dev/null || true
sed -i '/^MAIL_ENCRYPTION=/d' .env 2>/dev/null || true
sed -i '/^MAIL_USERNAME=/d' .env 2>/dev/null || true
sed -i '/^MAIL_PASSWORD=/d' .env 2>/dev/null || true
sed -i '/^MAIL_MAILER=/d' .env 2>/dev/null || true

# Add correct Hostinger configuration
cat >> .env << 'EOF'

# Hostinger Email Configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_ENCRYPTION=ssl
MAIL_USERNAME=info@reputabletours.com
MAIL_PASSWORD=REPLACE_WITH_ACTUAL_PASSWORD
MAIL_FROM_ADDRESS=info@reputabletours.com
MAIL_FROM_NAME="${APP_NAME}"
EOF

print_status "Updated SMTP configuration for Hostinger"

# Clear caches
print_info "Clearing configuration caches..."
php artisan config:clear 2>/dev/null || true
php artisan cache:clear 2>/dev/null || true

# Rebuild configuration
print_info "Rebuilding configuration..."
php artisan config:cache 2>/dev/null || true

print_warning "IMPORTANT: You need to update the MAIL_PASSWORD in .env file"
print_info "Current password is set to 'REPLACE_WITH_ACTUAL_PASSWORD'"
print_info "Please replace it with your actual Hostinger email password"

# Test the configuration
print_info "Testing email configuration..."

# Create a test script to verify configuration
cat > test_email_config.php << 'EOF'
<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Test configuration
$config = config('mail');
echo "Current Mail Configuration:\n";
echo "Mailer: " . $config['default'] . "\n";
echo "Host: " . $config['mailers']['smtp']['host'] . "\n";
echo "Port: " . $config['mailers']['smtp']['port'] . "\n";
echo "Encryption: " . $config['mailers']['smtp']['encryption'] . "\n";
echo "Username: " . $config['mailers']['smtp']['username'] . "\n";
echo "Password: " . (empty($config['mailers']['smtp']['password']) ? 'NOT SET' : 'SET') . "\n";
EOF

php test_email_config.php
rm test_email_config.php

echo ""
print_status "Configuration updated successfully!"
echo ""
print_info "📧 NEXT STEPS:"
echo "1. Edit .env file and replace REPLACE_WITH_ACTUAL_PASSWORD with your real Hostinger password"
echo "2. Run: php artisan config:cache"
echo "3. Test with: php artisan email:send-test --to=davidngungila@gmail.com"
echo ""
print_info "🔧 ALTERNATIVE OPTIONS:"
echo "If Hostinger doesn't work, try Gmail:"
echo "1. Set up Gmail App Password"
echo "2. Run: php artisan configure:gmail-email YOUR_APP_PASSWORD"
echo ""
print_info "📞 TROUBLESHOOTING:"
echo "- Check spam/junk folders"
echo "- Add info@reputabletours.com to contacts"
echo "- Verify email password is correct"
echo "- Check if Hostinger account is active"
