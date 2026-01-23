window.initMap = function () {
    const stores = window.starbucksStores;

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
        const marker = new google.maps.Marker({
            position: {
                lat: parseFloat(store.lat),
                lng: parseFloat(store.lng),
            },
            map: map,
            title: store.name,
            label: {
                text: store.name,
                color: "#02754B",
                fontSize: "12px",
                fontWeight: "bold",
            },
        });

        const infoWindow = new google.maps.InfoWindow({
            content: `
                <div style="min-width:200px">
                    <h4>${store.name}</h4>
                    <p>${store.address}</p>
                    <a href="/reviews?starbucks_store_id=${store.id}">
                        <button style="color: red; cursor: pointer;">口コミを見る</button>
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
