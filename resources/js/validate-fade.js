document.addEventListener("DOMContentLoaded", function () {
    const toast = document.getElementById("status-toast");
    if (toast) {
        // 3秒経ったら透明にする
        setTimeout(() => {
            toast.classList.add("fade-out");
            // 透明になった後、完全に消す
            setTimeout(() => {
                toast.remove();
            }, 500);
        }, 3000);
    }
});
