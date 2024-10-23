<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top News</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body>
<div class="container mx-auto mt-5">
    <!-- Judul utama halaman -->
    <h1 class="text-3xl font-bold mb-5">Search News</h1>

    <!-- Form pencarian berita -->
    <form method="GET" action="/news">
        <!-- Input untuk pencarian berita, mengikat nilai dengan query jika ada -->
        <input type="text" name="q" value="{{ $query ?? '' }}" class="border rounded p-2" placeholder="Search for news...">
        <!-- Tombol untuk mengirimkan form pencarian -->
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
    </form>

    <!-- Judul untuk daftar berita teratas -->
    <h2 class="text-3xl font-bold mt-5 mb-5">Top News Headlines</h2>

    <!-- Mengecek apakah ada artikel berita yang diterima -->
    @if (isset($articles) && count($articles) > 0)
        <ul>
            <!-- Iterasi melalui setiap artikel berita yang ada -->
            @foreach ($articles as $article)
                <li class="mb-4">
                    <!-- Judul artikel yang dapat diklik -->
                    <h3 class="text-xl font-semibold">
                        <a href="{{ $article['url'] }}" target="_blank" class="text-blue-500 hover:underline">
                            {{ $article['title'] }}
                        </a>
                    </h3>
                    <!-- Deskripsi singkat artikel -->
                    <p>{{ $article['description'] }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <!-- Pesan jika tidak ada berita yang ditemukan -->
        <p>No news found.</p>
    @endif
</div>



</body>
</html>