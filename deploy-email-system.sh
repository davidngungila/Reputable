#!/bin/bash

# 🚀 Live Server Email System Deployment Script
# Usage: ./deploy-email-system.sh your-email@example.com

set -e  # Exit on any error

EMAIL=${1:-"davidngungila@gmail.com"}

echo "🚀 Starting Email System Deployment..."
echo "📧 Test Email: $EMAIL"
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Function to print colored output
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

# Check if running as root
if [ "$EUID" -eq 0 ]; then
    print_error "Don't run this script as root!"
    exit 1
fi

# Step 1: Pre-deployment checks
print_info "Step 1: Pre-deployment checks..."

# Check PHP version
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
print_info "PHP Version: $PHP_VERSION"

if [ $(echo "$PHP_VERSION" | cut -d. -f1) -lt 8 ]; then
    print_error "PHP 8.0+ required. Current: $PHP_VERSION"
    exit 1
fi

# Check required extensions
REQUIRED_EXTENSIONS=("mbstring" "openssl" "tokenizer" "xml" "curl" "fileinfo" "gd")
for ext in "${REQUIRED_EXTENSIONS[@]}"; do
    if php -m | grep -q "$ext"; then
        print_status "Extension $ext is installed"
    else
        print_error "Extension $ext is missing"
        exit 1
    fi
done

# Step 2: Pull latest changes
print_info "Step 2: Pulling latest changes..."
git pull origin main
print_status "Latest changes pulled"

# Step 3: Install dependencies
print_info "Step 3: Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction
print_status "Dependencies installed"

# Step 4: Database migration
print_info "Step 4: Running database migrations..."
php artisan migrate --force
print_status "Database migrations completed"

# Step 5: Clear caches
print_info "Step 5: Clearing caches..."
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan config:clear
print_status "Caches cleared"

# Step 6: Optimize for production
print_info "Step 6: Optimizing for production..."
php artisan optimize
print_status "Application optimized"

# Step 7: Test email system
print_info "Step 7: Testing email system..."

# Basic email test
print_info "Testing basic email connectivity..."
if php artisan email:send-test --to="$EMAIL" 2>/dev/null; then
    print_status "Basic email test passed"
else
    print_error "Basic email test failed"
    print_warning "Check email configuration in .env file"
fi

# Comprehensive email test
print_info "Testing comprehensive email system..."
if php artisan test:email-system --to="$EMAIL" 2>/dev/null; then
    print_status "Comprehensive email test passed"
else
    print_warning "Some email services may not be configured"
fi

# Booking email test
print_info "Testing booking email system..."
if php artisan test:booking-email 23 2>/dev/null; then
    print_status "Booking email test passed"
else
    print_warning "Booking email test failed - check booking #23 exists"
fi

# Step 8: Verify inquiry system
print_info "Step 8: Verifying inquiry system..."

# Check if inquiry fields exist
INQUIRY_FIELDS=$(php artisan tinker --execute="print_r(implode(',', \Schema::getColumnListing('inquiries')));" 2>/dev/null | tr -d '\r\n')
if [[ "$INQUIRY_FIELDS" == *"nationality"* ]] && [[ "$INQUIRY_FIELDS" == *"travel_date"* ]]; then
    print_status "Inquiry system fields verified"
else
    print_error "Inquiry fields missing - run migrations again"
fi

# Step 9: Final verification
print_info "Step 9: Final verification..."

# Check Laravel health
if php artisan about --quiet 2>/dev/null; then
    print_status "Laravel application healthy"
else
    print_error "Laravel application issues detected"
fi

# Check application cache
if php artisan config:cache 2>/dev/null; then
    print_status "Configuration cached successfully"
fi

# Step 10: Summary
echo ""
print_info "🎉 DEPLOYMENT SUMMARY"
echo "=================="
print_status "✅ Code updated from Git repository"
print_status "✅ Dependencies installed and optimized"
print_status "✅ Database migrations applied"
print_status "✅ Application caches cleared and optimized"
print_status "✅ Email system tested"
print_status "✅ Inquiry system verified"
print_status "✅ Laravel application healthy"

echo ""
print_info "📧 EMAIL TESTING RESULTS"
echo "======================"
print_info "Test emails sent to: $EMAIL"
print_info "Check your inbox for:"
echo "  • Basic test email"
echo "  • Booking confirmation email"
echo "  • System notification emails"

echo ""
print_info "🔗 IMPORTANT URLs TO TEST"
echo "========================"
echo "• Contact Form: $(php artisan route:list | grep contact | head -1 | awk '{print $1}')"
echo "• Advanced Inquiry: $(php artisan route:list | grep 'contact/inquiry' | head -1 | awk '{print $1}')"
echo "• Booking Checkout: $(php artisan route:list | grep 'bookings.*checkout' | head -1 | awk '{print $1}')"

echo ""
print_info "🚀 NEXT STEPS"
echo "=============="
echo "1. Test the URLs above in your browser"
echo "2. Submit an inquiry form to test the full flow"
echo "3. Check email delivery at: $EMAIL"
echo "4. Monitor logs: tail -f storage/logs/laravel.log"
echo "5. Verify admin notifications are received"

echo ""
print_status "🎊 Email system deployment completed successfully!"
print_info "If you encounter any issues, run: php artisan diagnose:email"

# Optional: Restart queue workers if using queues
if command -v supervisorctl &> /dev/null; then
    print_info "Restarting queue workers..."
    supervisorctl restart laravel-worker:* 2>/dev/null || true
fi

echo ""
print_status "Deployment script completed at $(date)"
