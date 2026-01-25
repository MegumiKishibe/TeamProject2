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


    {{-- Overlay --}}
    <div id="menuOverlay" class="map-overlay" aria-hidden="true"></div>
    {{-- Modal --}}
    <div id="menuModal" class="map-modal" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="map-modal-grid">
            <a class="map-modal-item" href="search" aria-label="Search">
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
        const stores = @json($starbucksStores);
        console.log(stores);

        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: {
                    lat: parseFloat(stores[2].lat),
                    lng: parseFloat(stores[2].lng),
                },
                mapTypeId: 'roadmap',
            });


            stores.forEach(store => {
                const marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(store.lat),
                        lng: parseFloat(store.lng)
                    },
                    map: map,
                    title: store.name,
                });


                // 詳細ポップアップ
                const infoWindow = new google.maps.InfoWindow({
                    content: `
                            <div style="max-width:200px">
                                <h1 class="map-infowindow">${store.name}</h1>
                                <p class="map-infowindow-p">${store.address}</p>
                                    <a href="/reviews?starbucks_store_id=${store.id}">
                                        <button style="width: 100%;
                                            color: white; 
                                            background-color: ${btnColor}; 
                                            cursor: pointer; 
                                            border: none; 
                                            padding: 8px; 
                                            border-radius: 4px;
                                            font-weight: bold;
                                            color: #007042;">口コミを見る</button>
                                    </a>
                            </div>
                            `,
                });

                // ピンクリック時
                marker.addListener('click', () => {
                    infoWindow.open(map, marker);
                });
            });
        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&language=ja&callback=initMap"
        async defer></script>


</body>

</html>
