<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])
    <title>Document</title>
</head>

<body>
    <p>マップだよ</p>

    <a href="{{ route('/') }}"><button>←戻る</button></a>


    <div id="map" style="width:100%; height:500px"></div>


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
                <a href="/reviews">口コミを見る</a>
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
