#!/bin/bash

echo "🔧 Fixing Cloudinary Configuration"
echo "================================="

# Check if .env file exists
if [ ! -f .env ]; then
    echo "❌ .env file not found. Creating from .env.example..."
    cp .env.example .env
fi

# Remove existing Cloudinary config to avoid duplicates
sed -i '/^CLOUDINARY_/d' .env

# Add correct Cloudinary configuration
echo "" >> .env
echo "# Cloudinary Configuration" >> .env
echo "CLOUDINARY_CLOUD_NAME=dqflffa1o" >> .env
echo "CLOUDINARY_KEY=934773358234285" >> .env
echo "CLOUDINARY_SECRET=GV5IttBrxjmDF5wsDO9jL7KCAUY" >> .env
echo "CLOUDINARY_URL=cloudinary://934773358234285:GV5IttBrxjmDF5wsDO9jL7KCAUY@dqflffa1o" >> .env

echo "✅ Cloudinary configuration added to .env"

# Clear and rebuild cache
echo "🔄 Clearing caches..."
php artisan config:clear
php artisan config:cache
php artisan cache:clear

echo "✅ Configuration updated!"
echo ""
echo "🧪 Test Cloudinary with:"
echo "php artisan tinker"
echo "Then run: \Cloudinary::cloud()->uploadApi()->upload('https://example.com/image.jpg');"
echo ""
echo "🌐 Visit: http://127.0.0.1:8004/admin/cloudinary/test"
