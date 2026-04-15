<!DOCTYPE html>
<html lang="en">
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
            background: #ffffff;
            min-height: 100vh;
        }
        .font-serif { font-family: 'Playfair Display', serif; }
        
        .login-container {
            max-width: 420px;
            margin: 0 auto;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(31, 41, 55, 0.15);
            border-radius: 1rem;
            box-shadow: 0 20px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            margin: 1rem;
            padding: 2rem;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-group input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(31, 41, 55, 0.2);
            border-radius: 0.5rem;
            color: #333;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .input-group input:focus {
            outline: none;
            border-color: #E67A2E;
            box-shadow: 0 0 0 3px rgba(230, 122, 46, 0.1);
        }
        
        .input-group label {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #333;
            font-size: 0.875rem;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.9);
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }
        
        .login-btn {
            width: 100%;
            padding: 0.875rem;
            background: #1F5A3A;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .login-btn:hover {
            background: #2E7A5A;
            transform: translateY(-2px);
        }
        
        .login-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            color: #fff;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="flex items-center justify-center">
    <div class="login-container">
        <div class="login-card p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <img src="{{ asset('logo.png') }}" alt="Reputable Tours" class="h-16 w-auto mx-auto mb-4">
                <h1 class="text-2xl font-serif font-bold text-white mb-2">Reputable Tours</h1>
                <p class="text-white/70 text-sm">Admin Portal</p>
            </div>
            
            <!-- Credentials -->
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-lg p-4 mb-6">
                <p class="text-white/90 text-xs font-mono mb-2">Credentials:</p>
                <p class="text-white text-sm font-bold">Username: <span class="text-[#E67A2E]">admin</span></p>
                <p class="text-white text-sm font-bold">Password: <span class="text-[#E67A2E]">reputable2024</span></p>
            </div>
            
            <!-- Login Form -->
            <form action="{{ route('simple.login') }}" method="POST" class="space-y-6">
                @csrf
                
                @if($errors->any())
                    <div class="error-message">
                        {{ $errors->first() }}
                    </div>
                @endif
                
                <div class="input-group">
                    <label for="username">Email (Username)</label>
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
                    <label for="password">Password (min 8 chars)</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        minlength="8"
                    >
                </div>
                
                <button type="submit" class="login-btn">
                    Sign In
                </button>
            </form>
            
            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-white/60 text-xs">
                    &copy; {{ date('Y') }} Reputable Tours. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
