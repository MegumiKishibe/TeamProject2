<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    <title>gest | map</title>
</head>

<body>
    <h1>マップだよ</h1>

    <a href="{{ route('login') }}"><button>←戻る</button></a>

    <div id="map" style="width:100%; height:500px"></div>

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
                    label: {
                        text: store.name,
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
                                <p value="{{ old('id') }}">${store.id}</p>
                                <h4 value="{{ old('name') }}">${ store.name }</h4>
                                <p value="{{ old('address') }}">${ store.address }</p>
                                <a href="/reviews?starbucks_store_id=${store.id}"><button style="color: red;">口コミを見る</button></a>
                            </div>
                            `,
                });

                // ピンクリック時
                marker.addListener('click', () => {
                    infoWindow.open(map, marker);
                });

                // 選択した店舗にフォーカスする
                const selectStore = document.getElementById('store-select');
                selectStore.addEventListener('change', function() {
                    const selectOption = this.options[this.selectedIndex];
                    const lat = parseFloat(selectOption.dataset.lat);
                    const lng = parseFloat(selectOption.dataset.lng);

                    if (!isNaN(lat) && !isNaN(lng)) {
                        map.setCenter({
                            lat: lat,
                            lng: lng
                        });
                        map.setZoom(20);
                    }
                });
            });
        }
    </script>

    <div class="wrapper">
        <div>
            <select name="starbucks_store_id" id="store-select">
                <option>選択してください</option>
                @foreach ($starbucksStores as $store)
                    <option value="{{ $store->id }}" data-lat="{{ $store->lat }}" data-lng="{{ $store->lng }}"
                        @if (old('starbucks_store_id') == $store->id) selected @endif>
                        {{ $store->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&language=ja&callback=initMap"
        async defer></script>


</body>

</html>
