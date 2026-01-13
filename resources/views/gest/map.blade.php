<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Map</title>
</head>

<body>
    <div id="map"></div>

    <button type="button" id="menuOpenBtn" class="map-menu-btn">MENU</button>

    <div id="menuOverlay" class="map-overlay" aria-hidden="true"></div>

    <div id="menuModal" class="map-modal" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="map-modal-grid">
        <a class="map-modal-item" href="/map" aria-label="Search">
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

    {{-- #TODO  JSONでのデータ取得に変更する --}}
    <script>
        function initMap() {
            const myLatLng = {
                // 大阪城公園店
                lat: 34.68986445237345,
                lng: 135.53217119155266,
            };

            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: myLatLng,
                mapTypeId: 'roadmap',
            });
            const marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'スターバックスコーヒー 大阪城公園店',
                label: {
                    text: 'スターバックスコーヒー 大阪城公園店',
                    color: '#02754B',
                    fontSize: '12px',
                    fontWeight: 'bold',
                },
                // iconで好きなピンに変更可能
            });

            // 詳細ポップアップ
            const infoWindow = new google.maps.InfoWindow({
                content: `
            <div style="min-width:200px">
                <h4>スターバックスコーヒー 大阪城公園店</h4>
                <p>大阪市中央区大阪城1-1</p>
                <a href="/reviews"><button>口コミを見る</button></a>
            </div>
        `,
            });

            // ピンクリック時
            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });


        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&language=ja&callback=initMap"
        async defer></script>


</body>

</html>
