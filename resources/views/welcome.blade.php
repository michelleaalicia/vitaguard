<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitaGuard - Healthcare Management System</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-slate-50 text-slate-800">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-100">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-2 font-bold text-lg text-blue-600">
                <span
                    class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white text-sm">
                    ♥
                </span>
                VitaGuard
            </a>

            <div class="hidden md:flex gap-3">
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-5 py-2 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-medium hover:opacity-90 transition">
                            Dashboard
                        </a>
                    @elseif(auth()->user()->role == 'doctor')
                        <a href="{{ route('doctor.dashboard') }}"
                            class="px-5 py-2 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-medium hover:opacity-90 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('member.dashboard') }}"
                            class="px-5 py-2 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-medium hover:opacity-90 transition">
                            Dashboard
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 rounded-lg border border-blue-600 text-blue-600 text-sm font-medium hover:bg-blue-50 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-medium hover:opacity-90 transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 overflow-hidden">
        <div class="absolute inset-0 opacity-20"
            style="background-image: radial-gradient(circle at 20% 20%, white 0%, transparent 45%), radial-gradient(circle at 80% 80%, white 0%, transparent 45%);">
        </div>

        <div class="relative max-w-4xl mx-auto px-6 py-20 text-center">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/15 text-white text-sm mb-5">
                🛡️ Trusted Healthcare Platform
            </span>

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                Your Health, <br class="hidden md:block"> Our Priority
            </h1>

            <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                Manage appointments, online consultations, and access trusted
                health articles all in one application.
            </p>
        </div>
    </section>

    <!-- CTA Card (overlap hero) -->
    <div class="max-w-2xl mx-auto px-6 -mt-16 relative z-10">
        <div class="bg-white rounded-2xl shadow-xl p-10 text-center">
            <h3 class="text-2xl font-bold mb-3">
                Welcome 👋
            </h3>

            <p class="text-slate-500 mb-6">
                Manage appointments, online consultations,
                and health articles in one application.
            </p>

            @auth
                @if(auth()->user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="inline-block px-6 py-3 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium hover:opacity-90 transition">
                        Go to Admin Dashboard
                    </a>
                @elseif(auth()->user()->role == 'doctor')
                    <a href="{{ route('doctor.dashboard') }}"
                        class="inline-block px-6 py-3 rounded-lg bg-green-600 text-white font-medium hover:bg-green-700 transition">
                        Go to Doctor Dashboard
                    </a>
                @else
                    <a href="{{ route('member.dashboard') }}"
                        class="inline-block px-6 py-3 rounded-lg bg-cyan-600 text-white font-medium hover:bg-cyan-700 transition">
                        Go to Member Dashboard
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="inline-block px-6 py-3 rounded-lg border border-blue-600 text-blue-600 font-medium hover:bg-blue-50 transition mr-2">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="inline-block px-6 py-3 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium hover:opacity-90 transition">
                    Register
                </a>
            @endauth
        </div>
    </div>

    <!-- Features -->
    <section class="max-w-6xl mx-auto px-6 py-24">
        <div class="text-center mb-14">
            <h2 class="text-3xl font-bold mb-2">Why Choose VitaGuard?</h2>
            <p class="text-slate-500">Everything you need for your health, in one platform</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition p-8">
                <div
                    class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-4">
                    📅
                </div>
                <h5 class="font-bold text-lg mb-2">Easy Booking</h5>
                <p class="text-slate-500 text-sm">
                    Schedule appointments with your preferred doctor anytime, without long queues.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition p-8">
                <div
                    class="w-14 h-14 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-2xl mb-4">
                    🎥
                </div>
                <h5 class="font-bold text-lg mb-2">Online Consultation</h5>
                <p class="text-slate-500 text-sm">
                    Consult directly with professional doctors from anywhere, in real time.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg hover:-translate-y-1 transition p-8">
                <div
                    class="w-14 h-14 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-2xl mb-4">
                    📰
                </div>
                <h5 class="font-bold text-lg mb-2">Health Articles</h5>
                <p class="text-slate-500 text-sm">
                    Read trusted health information written by medical professionals.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-8">
        <div class="max-w-6xl mx-auto px-6 text-center text-sm">
            &copy; {{ date('Y') }} VitaGuard. All rights reserved.
        </div>
    </footer>

</body>

</html>