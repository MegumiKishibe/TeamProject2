{{--  http://127.0.0.1:8000/example --}}

@extends('layouts.index')

@section('title', 'title | page')

@section('content')

    <div class="validate-wrapper">バリデーションあるよ
        @if (session('status'))
            <div class="validate">
                <p>{{ session('status') }}</p>
            </div>
        @endif
    </div>

    <p>ログイン中のユーザー名：{{ Auth::user()->name }}</p>
    <p>Account:{{ sprintf('%04d', Auth::user()->id) }}</p>

    <div class="wrapper">
        <h1>ここに追加していく</h1>

        <p>・css・jsファイル作成：vite.config.jsに追記["resources/css/style.css"] <br>→npm run buildとnpm run devが必要かも</p>

        <p>・ルートの指定：routes/web.phpに <br>
            Route::get('/example', function () {return view('example');}); で表示できる<br>http://127.0.0.1/exampleでアクセス可能</p>
    </div>


    <div class="wrapper">
        <a href="{{ route('profile.edit') }}"><button>アカウント編集</button></a>


    </div>
    <div class="wrapper">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button" class="nav-item">ログアウト</button>
        </form>
    </div>

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
                <a href="{{route('author.reviews')}}">口コミを見る</a>
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


    <div class="wrapper">
        <div>
            <a href="{{ route('author.reviews') }}"><button>口コミ一覧へ</button></a>
        </div>
    </div>

    <div class="wrapper">
        <div>
            <a href="{{ route('author.myposts') }}"><button>History</button></a>
        </div>
    </div>
@endsection
