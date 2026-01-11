@extends('layouts.index')

@section('title', 'gest | map')

@section('content')
    <p>マップだよ</p>


    <div id="map" style="width:100%; height:500px"></div>

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

            // 👇 ピンクリック時
            marker.addListener('click', () => {
                infoWindow.open(map, marker);
            });


        }
    </script>


@endsection
