<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        /* Tailwind CSS (used in Maizzle or compiled inline for email clients) */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <div class="text-center mb-4">
            <h1 class="text-2xl font-bold text-gray-700">Welcome to Our Service</h1>
            <p class="text-sm text-gray-500">Thank you for signing up!</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-600">Hello,</p>
            <p class="text-gray-600">{{$emailBody}}</p>
        </div>

        <div class="text-gray-500 text-xs text-center mt-8">
            <p>If you did not sign up for this account, please ignore this email.</p>
        </div>
    </div>
</body>
</html>
