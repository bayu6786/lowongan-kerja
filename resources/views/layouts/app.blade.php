<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Custom animations and effects */
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            @keyframes fadeInUp {
                from { 
                    opacity: 0; 
                    transform: translateY(20px); 
                }
                to { 
                    opacity: 1; 
                    transform: translateY(0); 
                }
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }
            
            .animated-bg {
                background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
                position: relative;
                overflow: hidden;
            }
            
            .animated-bg::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
                animation: shimmer 3s infinite;
            }
            
            @keyframes shimmer {
                0% { left: -100%; }
                100% { left: 100%; }
            }
            
            .glass-effect {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            }
            
            .fade-in-up {
                animation: fadeInUp 0.8s ease-out forwards;
            }
            
            .floating {
                animation: float 6s ease-in-out infinite;
            }
            
            .page-transition {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            /* Particle background effect */
            .particles {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                overflow: hidden;
            }
            
            .particle {
                position: absolute;
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                animation: particleFloat 20s infinite linear;
            }
            
            @keyframes particleFloat {
                0% {
                    transform: translateY(100vh) rotate(0deg);
                    opacity: 0;
                }
                10% {
                    opacity: 1;
                }
                90% {
                    opacity: 1;
                }
                100% {
                    transform: translateY(-100px) rotate(360deg);
                    opacity: 0;
                }
            }
            
            /* Hover effects */
            .hover-scale {
                transition: transform 0.3s ease;
            }
            
            .hover-scale:hover {
                transform: scale(1.02);
            }
            
            /* Header enhancement */
            .enhanced-header {
                background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.8) 100%);
                backdrop-filter: blur(15px);
                border-bottom: 1px solid rgba(0,0,0,0.1);
                box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen animated-bg page-transition">
            <!-- Floating particles background -->
            <div class="particles">
                <div class="particle" style="left: 10%; width: 4px; height: 4px; animation-delay: 0s;"></div>
                <div class="particle" style="left: 20%; width: 6px; height: 6px; animation-delay: 2s;"></div>
                <div class="particle" style="left: 30%; width: 3px; height: 3px; animation-delay: 4s;"></div>
                <div class="particle" style="left: 40%; width: 5px; height: 5px; animation-delay: 6s;"></div>
                <div class="particle" style="left: 50%; width: 4px; height: 4px; animation-delay: 8s;"></div>
                <div class="particle" style="left: 60%; width: 6px; height: 6px; animation-delay: 10s;"></div>
                <div class="particle" style="left: 70%; width: 3px; height: 3px; animation-delay: 12s;"></div>
                <div class="particle" style="left: 80%; width: 5px; height: 5px; animation-delay: 14s;"></div>
                <div class="particle" style="left: 90%; width: 4px; height: 4px; animation-delay: 16s;"></div>
            </div>
            
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="enhanced-header shadow-lg hover-scale">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 fade-in-up">
                        <div class="relative">
                            {{ $header }}
                            <!-- Decorative elements -->
                            <div class="absolute -top-2 -right-2 w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full opacity-20 floating"></div>
                            <div class="absolute -bottom-2 -left-2 w-8 h-8 bg-gradient-to-br from-blue-400 to-indigo-400 rounded-full opacity-30 floating" style="animation-delay: 3s;"></div>
                        </div>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="relative z-10">
                <div class="fade-in-up" style="animation-delay: 0.2s;">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <div class="glass-effect rounded-2xl p-8 hover-scale">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
            
            <!-- Decorative bottom gradient -->
            <div class="fixed bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/5 to-transparent pointer-events-none"></div>
        </div>
        
        <script>
            // Add smooth page transitions
            document.addEventListener('DOMContentLoaded', function() {
                // Add entrance animation delay to elements
                const animatedElements = document.querySelectorAll('.fade-in-up');
                animatedElements.forEach((el, index) => {
                    el.style.animationDelay = (index * 0.1) + 's';
                });
                
                // Add hover effects to interactive elements
                const interactiveElements = document.querySelectorAll('button, a, input, select, textarea');
                interactiveElements.forEach(el => {
                    el.addEventListener('mouseenter', function() {
                        this.style.transform = 'translateY(-2px)';
                        this.style.transition = 'all 0.3s ease';
                    });
                    
                    el.addEventListener('mouseleave', function() {
                        this.style.transform = 'translateY(0)';
                    });
                });
            });
        </script>
    </body>
</html>