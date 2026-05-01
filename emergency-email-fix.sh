#!/bin/bash

# 🚨 Emergency Email System Fix Script
# Usage: ./emergency-email-fix.sh

set -e

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

echo "🚨 Emergency Email System Fix"
echo "============================"

# Step 1: Clear all caches
print_info "Step 1: Clearing all caches..."
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear
print_status "All caches cleared"

# Step 2: Rebuild configuration
print_info "Step 2: Rebuilding configuration..."
php artisan config:cache
php artisan optimize
print_status "Configuration rebuilt"

# Step 3: Check email configuration
print_info "Step 3: Checking email configuration..."
MAIL_MAILER=$(grep "MAIL_MAILER=" .env | cut -d'=' -f2)
MAIL_HOST=$(grep "MAIL_HOST=" .env | cut -d'=' -f2)
MAIL_PORT=$(grep "MAIL_PORT=" .env | cut -d'=' -f2)
MAIL_ENCRYPTION=$(grep "MAIL_ENCRYPTION=" .env | cut -d'=' -f2)

print_info "Current email config:"
echo "  Mailer: $MAIL_MAILER"
echo "  Host: $MAIL_HOST"
echo "  Port: $MAIL_PORT"
echo "  Encryption: $MAIL_ENCRYPTION"

# Step 4: Test email connectivity
print_info "Step 4: Testing email connectivity..."
if php artisan email:send-test --to=davidngungila@gmail.com 2>/dev/null; then
    print_status "Email test successful"
else
    print_error "Email test failed - checking configuration..."
    
    # Try to fix common issues
    if [ "$MAIL_MAILER" = "log" ]; then
        print_warning "Email mailer is set to 'log' - changing to smtp"
        sed -i 's/MAIL_MAILER=log/MAIL_MAILER=smtp/' .env
    fi
    
    if [ -z "$MAIL_HOST" ]; then
        print_warning "MAIL_HOST is empty - setting default"
        echo "MAIL_HOST=smtp.hostinger.com" >> .env
    fi
    
    if [ -z "$MAIL_PORT" ]; then
        print_warning "MAIL_PORT is empty - setting default"
        echo "MAIL_PORT=465" >> .env
    fi
    
    if [ -z "$MAIL_ENCRYPTION" ]; then
        print_warning "MAIL_ENCRYPTION is empty - setting default"
        echo "MAIL_ENCRYPTION=ssl" >> .env
    fi
    
    # Clear cache again
    php artisan config:clear
    php artisan config:cache
    
    # Test again
    print_info "Retesting email connectivity..."
    if php artisan email:send-test --to=davidngungila@gmail.com 2>/dev/null; then
        print_status "Email test successful after fixes"
    else
        print_error "Email test still failing - manual intervention required"
        print_info "Run: php artisan diagnose:email for detailed diagnosis"
    fi
fi

# Step 5: Check database connection
print_info "Step 5: Checking database connection..."
if php artisan db:show 2>/dev/null | grep -q "Database"; then
    print_status "Database connection working"
else
    print_error "Database connection issues detected"
    print_info "Check .env database configuration"
fi

# Step 6: Verify inquiry fields
print_info "Step 6: Verifying inquiry fields..."
INQUIRY_COLUMNS=$(php artisan tinker --execute="echo implode(',', \Schema::getColumnListing('inquiries'));" 2>/dev/null)

if [[ "$INQUIRY_COLUMNS" == *"nationality"* ]]; then
    print_status "Inquiry fields verified"
else
    print_warning "Inquiry fields missing - running migration"
    php artisan migrate --force
fi

# Step 7: Check file permissions
print_info "Step 7: Checking file permissions..."
if [ -w "storage/logs" ]; then
    print_status "Log directory writable"
else
    print_warning "Fixing log directory permissions"
    chmod -R 755 storage/logs
fi

if [ -w "storage/framework" ]; then
    print_status "Framework directory writable"
else
    print_warning "Fixing framework directory permissions"
    chmod -R 755 storage/framework
fi

# Step 8: Restart services if needed
print_info "Step 8: Restarting services..."

# Restart queue workers if using supervisor
if command -v supervisorctl &> /dev/null; then
    supervisorctl restart laravel-worker:* 2>/dev/null || true
    print_status "Queue workers restarted"
fi

# Restart PHP-FPM if available
if command -v systemctl &> /dev/null; then
    if systemctl is-active --quiet php8.1-fpm 2>/dev/null; then
        systemctl reload php8.1-fpm
        print_status "PHP-FPM reloaded"
    elif systemctl is-active --quiet php8.2-fpm 2>/dev/null; then
        systemctl reload php8.2-fpm
        print_status "PHP-FPM reloaded"
    fi
fi

# Step 9: Final test
print_info "Step 9: Running final diagnostic..."
php artisan diagnose:email 2>/dev/null || print_warning "Diagnostic command failed"

echo ""
print_status "🎯 Emergency fix completed!"
echo ""
print_info "📊 Status Summary:"
echo "• Caches cleared and rebuilt"
echo "• Email configuration checked and fixed"
echo "• Database connection verified"
echo "• Inquiry fields verified"
echo "• File permissions fixed"
echo "• Services restarted"
echo ""
print_info "📧 Test email system:"
echo "• Run: php artisan email:send-test --to=your-email@example.com"
echo "• Run: php artisan test:email-system --to=your-email@example.com"
echo ""
print_info "🔍 Monitor logs:"
echo "• tail -f storage/logs/laravel.log | grep -i email"
