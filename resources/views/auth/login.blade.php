<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pupukku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-400 to-green-700 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-green-800">🌱 Pupukku</h1>
            <p class="text-gray-600 mt-2">Toko Berkah Abadi</p>
        </div>

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
        @endif

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Masukkan email">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Masukkan password">
            </div>

            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-gray-700">Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">
                Login
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-600">Belum punya akun? 
                <a href="{{ route('register') }}" class="text-green-600 hover:underline">Daftar di sini</a>
            </p>
        </div>

        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
            <p class="text-sm text-gray-700 font-semibold mb-2">Demo Account:</p>
            <p class="text-sm text-gray-600">Admin: admin@pupukku.com / admin123</p>
            <p class="text-sm text-gray-600">Customer: customer@test.com / customer123</p>
        </div>
    </div>
</body>
</html>