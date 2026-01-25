window.initMap = function () {
    const stores = window.starbucksStores;
    const loginStatus = typeof isLoggedIn !== "undefined" ? isLoggedIn : false;
    if (!stores || stores.length === 0) {
        console.error("店舗データが見つかりません");
        return;
    }

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: {
            lat: parseFloat(stores[2].lat),
            lng: parseFloat(stores[2].lng),
        },
        mapTypeId: "roadmap",
    });

    const dataList = document.getElementById("store-list");
    stores.forEach((store) => {
        const option = document.createElement("option");
        option.value = store.name;
        dataList.appendChild(option);
    });

    const markers = [];

    stores.forEach((store) => {
        const linkUrl = loginStatus
            ? `/author-reviews?starbucks_store_id=${store.id}`
            : `/reviews?starbucks_store_id=${store.id}`;
        const btnText = "口コミを見る";
        const btnColor = "#007042";

        const marker = new google.maps.Marker({
            position: {
                lat: parseFloat(store.lat),
                lng: parseFloat(store.lng),
            },
            map: map,
            title: store.name,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: `
                <div style="max-width:200px">
                    <h1 class="map-infowindow">${store.name}</h1>
                    <p class="map-infowindow-p">${store.address}</p>
                    <a href="${linkUrl}" style="text-decoration: none;">
                        <button type="button" style="
                            width: 100%;
                            color: white; 
                            background-color: ${btnColor}; 
                            cursor: pointer; 
                            border: none; 
                            padding: 8px; 
                            border-radius: 4px;
                            font-weight: bold;
                        ">
                            ${btnText}
                        </button>
                    </a>
                </div>
            `,
        });

        marker.addListener("click", () => {
            infoWindow.open(map, marker);
        });

        markers.push({ data: store, marker: marker, infoWindow: infoWindow });
    });

    // 検索ボタンの設定
    const searchInput = document.querySelector(".search-input");
    const searchBtn = document.querySelector(".search-btn");

    if (searchBtn && searchInput) {
        const performSearch = () => {
            const keyword = searchInput.value.trim().toLowerCase();
            if (!keyword) return;

            const target = markers.find((item) =>
                item.data.name.toLowerCase().includes(keyword),
            );

            if (target) {
                map.setCenter({
                    lat: parseFloat(target.data.lat),
                    lng: parseFloat(target.data.lng),
                });
                map.setZoom(17);
                target.infoWindow.open(map, target.marker);
            } else {
                alert("お店が見つかりませんでした");
            }
        };

        searchBtn.addEventListener("click", performSearch);
        searchInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") performSearch();
        });
    }
};
window.addEventListener("load", () => {
    if (typeof google !== "undefined" && typeof window.initMap === "function") {
        window.initMap();
    }
});