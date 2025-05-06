

<head>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-white to-gray-100 dark:from-[#0a0a0a] dark:to-[#1a1a1a] min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="w-full max-w-4xl bg-white dark:bg-[#121212] rounded-2xl shadow-xl p-10 text-center transition-all duration-300">
        <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
            🏡 Welcome to Adhil Realty
        </h1>
        <p class="text-gray-600 dark:text-gray-300 text-lg mb-8">
            Find your dream home with ease. Explore, connect, and move in today.
        </p>

        @if (Route::has('login'))
        <div class="flex justify-center gap-4">
            @auth
            <a href="{{ url('/home') }}"
               class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md shadow-md transition-all">
                Go to Dashboard
            </a>
            @else
            <a href="{{ route('login') }}"
               class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-md transition-all">
                Log in
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md shadow-md transition-all">
                Register
            </a>
            @endif
            @endauth
        </div>
        @endif
    </div>

</body>
