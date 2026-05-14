<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            background: linear-gradient(to right, #f8fafc, #e2e8f0);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">

    <div class="text-center">

        <!-- 404 Number -->
        <h1 class="text-8xl md:text-9xl font-extrabold text-indigo-600 drop-shadow-lg">
            404
        </h1>

        <!-- Heading -->
        <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-800">
            Oops! Page Not Found
        </h2>

        <!-- Description -->
        <p class="mt-4 text-gray-600 max-w-md mx-auto">
            The page you are looking for might have been removed,
            had its name changed, or is temporarily unavailable.
        </p>

        <!-- Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            
            <a href="/"
               class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-semibold shadow-lg hover:bg-indigo-700 transition duration-300">
                Go Home
            </a>

            <button onclick="history.back()"
                    class="px-6 py-3 rounded-xl border border-gray-300 bg-white text-gray-700 font-semibold hover:bg-gray-100 transition duration-300">
                Go Back
            </button>

        </div>

    </div>

</body>
</html>