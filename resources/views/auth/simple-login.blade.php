<!DOCTYPE html>
<html lang="en" x-data="{ showPassword: false, loading: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Reputable Tours</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { 
            font-family: 'Manrope', sans-serif;
            background: linear-gradient(135deg, #1F5A3A 0%, #2E7A5A 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        
        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('{{ asset('images/03.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(8px) brightness(0.3);
            z-index: -1;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 480px;
            padding: 3rem;
            position: relative;
            z-index: 10;
        }
        
        .logo-section {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .logo-section img {
            height: 3.5rem;
            width: auto;
            margin-bottom: 1rem;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1.75rem;
        }
        
        .input-group input {
            width: 100%;
            padding: 1rem 1.25rem 1rem 3.5rem;
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(31, 41, 55, 0.15);
            border-radius: 0.75rem;
            color: #333;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .input-group input:focus {
            outline: none;
            border-color: #E67A2E;
            box-shadow: 0 0 0 8px rgba(230, 122, 46, 0.2);
            transform: translateY(-1px);
        }
        
        .input-group input::placeholder {
            color: #999;
            font-style: italic;
        }
        
        .input-group label {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #333;
            font-size: 0.875rem;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.375rem 0.75rem;
            border-radius: 0.375rem;
            pointer-events: none;
        }
        
        .login-btn {
            width: 100%;
            padding: 1rem 1.25rem;
            background: linear-gradient(135deg, #E67A2E 0%, #059669 100%);
            color: white;
            border: none;
            border-radius: 0.75rem;
            font-weight: 700;
            font-size: 1.125rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(230, 122, 46, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .login-btn:hover::before {
            left: 100%;
        }
        
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(230, 122, 46, 0.4);
        }
        
        .login-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }
        
        .error-message {
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
            color: #fff;
            padding: 1rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.925rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #FCD34D;
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .credentials-info {
            background: rgba(230, 122, 46, 0.1);
            border: 1px solid rgba(230, 122, 46, 0.2);
            border-radius: 0.75rem;
            padding: 1rem 1.25rem;
            margin-bottom: 2rem;
        }
        
        .credentials-info h4 {
            color: #E67A2E;
            font-weight: 700;
            margin-bottom: 0.75rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .credentials-info .credential-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            color: #333;
            font-size: 0.9rem;
        }
        
        .credentials-info .credential-item i {
            color: #E67A2E;
            font-size: 1.125rem;
        }
        
        .password-toggle {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            padding: 0.5rem;
            transition: color 0.3s ease;
        }
        
        .password-toggle:hover {
            color: #E67A2E;
        }
        
        .footer-info {
            text-align: center;
            margin-top: 2rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.825rem;
        }
        
        .loading-spinner {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { border-top-color: rgba(255, 255, 255, 0.3); }
            50% { border-top-color: white; }
            100% { border-top-color: rgba(255, 255, 255, 0.3); }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <!-- Logo Section -->
            <div class="logo-section">
                <img src="{{ asset('logo.png') }}" alt="Reputable Tours">
                <h1 class="text-3xl font-serif font-bold text-gray-800 mb-2">Reputable Tours</h1>
                <p class="text-gray-600 font-medium">Administrator Portal</p>
            </div>
            
            <!-- Credentials Information -->
            <div class="credentials-info">
                <h4>Sample Credentials</h4>
                <div class="credential-item">
                    <i class="ph-bold ph-user"></i>
                    <span>Username: <strong class="text-emerald-600">admin@reputabletours.com</strong></span>
                </div>
                <div class="credential-item">
                    <i class="ph-bold ph-lock"></i>
                    <span>Password: <strong class="text-emerald-600">reputable2024</strong></span>
                </div>
            </div>
            
            <!-- Login Form -->
            <form action="{{ route('simple.login') }}" method="POST" @submit="loading = true" class="space-y-2">
                @csrf
                
                @if($errors->any())
                    <div class="error-message">
                        <div class="flex items-center gap-2">
                            <i class="ph-bold ph-warning-circle"></i>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif
                
                <div class="input-group">
                    <label for="username">
                        <i class="ph-bold ph-envelope"></i>
                        Email Address
                    </label>
                    <input 
                        type="email" 
                        id="username" 
                        name="username" 
                        required
                        autocomplete="username"
                        value="{{ old('username') }}"
                        placeholder="Enter your email address"
                    >
                </div>
                
                <div class="input-group">
                    <label for="password">
                        <i class="ph-bold ph-lock"></i>
                        Password
                    </label>
                    <button 
                        type="button" 
                        @click="showPassword = !showPassword"
                        class="password-toggle"
                        x-show="!showPassword"
                    >
                        <i class="ph-bold ph-eye"></i>
                    </button>
                    <button 
                        type="button" 
                        @click="showPassword = !showPassword"
                        class="password-toggle"
                        x-show="showPassword"
                    >
                        <i class="ph-bold ph-eye-slash"></i>
                    </button>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        minlength="8"
                        x-bind:type="showPassword ? 'text' : 'password'"
                    >
                </div>
                
                <button type="submit" class="login-btn" :disabled="loading">
                    <span x-show="!loading" class="flex items-center justify-center gap-2">
                        <i class="ph-bold ph-sign-in"></i>
                        Sign In to Dashboard
                    </span>
                    <span x-show="loading" class="flex items-center justify-center gap-2">
                        <div class="loading-spinner"></div>
                        Authenticating...
                    </span>
                </button>
            </form>
            
            <!-- Footer Information -->
            <div class="footer-info">
                <p class="mb-2">
                    <i class="ph-bold ph-shield-check"></i>
                    Secure Admin Access
                </p>
                <p>
                    &copy; {{ date('Y') }} Reputable Tours. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
