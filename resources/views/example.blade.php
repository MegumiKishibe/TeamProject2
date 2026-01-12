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
                                <a href="/author-reviews?starbucks_store_id=${store.id}"" }}"><button style="color: red;">口コミを見る</button></a>
                            </div>
                            `,
                });
                // /reviewsstarbucks_store_id=${store.id}"

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

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&language=ja&callback=initMap"
        async defer></script>

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
