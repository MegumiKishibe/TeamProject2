document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("menuOpenBtn");
  const overlay = document.getElementById("menuOverlay");
  const modal = document.getElementById("menuModal");

  const open = () => {
    overlay.classList.add("is-open");
    modal.classList.add("is-open");
  };

  const close = () => {
    overlay.classList.remove("is-open");
    modal.classList.remove("is-open");
  };

  btn?.addEventListener("click", open);
  overlay?.addEventListener("click", close);
});
