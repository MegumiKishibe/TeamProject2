<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Search</title>
</head>

<body class="map-page">
    {{-- map表示 --}}
    <div id="map" class="map-canvas" aria-label="Map placeholder"></div>

    <div id="menuOverlay" class="map-overlay" aria-hidden="true"></div>

    {{-- 検索UI --}}
    <header class="search-bar" role="search">
        <div class="search-bar-inner">
            <span class="material-symbols-rounded search-icon" aria-hidden="true">search</span>
            <input class="search-input" type="search" name="q" placeholder="例：スターバックス 道頓堀" autocomplete="off"
                inputmode="search" list="store-list" />
            <button type="button" class="search-btn">検索</button>
            <datalist id="store-list"></datalist>
        </div>

        <div class="search-hint">
            検索結果は地図担当が後で反映します
        </div>
    </header>

    <button type="button" id="menuOpenBtn" class="map-menu-btn">MENU</button>

    {{-- オーバーレイ --}}
    <div id="menuOverlay" class="map-overlay" aria-hidden="true"></div>

    {{-- モーダル --}}
    <div id="menuModal" class="map-modal" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="map-modal-grid">
            <a class="map-modal-item" href="/search" aria-label="Search">
                <span class="material-symbols-rounded map-icon" aria-hidden="true">search</span>
                <span class="map-label">Search</span>
            </a>

            <a class="map-modal-item" href="/reviews" aria-label="History">
                <span class="material-symbols-rounded map-icon" aria-hidden="true">history</span>
                <span class="map-label">History</span>
            </a>

            <a class="map-modal-item" href="/profile" aria-label="Account">
                <span class="material-symbols-rounded map-icon" aria-hidden="true">person</span>
                <span class="map-label">Account</span>
            </a>

            <a class="map-modal-item" href="/" aria-label="Logout">
                <span class="material-symbols-rounded map-icon" aria-hidden="true">logout</span>
                <span class="map-label">Logout</span>
            </a>
        </div>
    </div>
    <script>
        window.starbucksStores = @json($starbucksStores);
    </script>

    @vite('resources/js/search.js')

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&language=ja&callback=initMap"
        async defer></script>

</body>

</html>
