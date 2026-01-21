<x-app-layout>
  <x-review-frame
    account="Account No.0001"
    active="history"
    nav="menu"
    title="投稿履歴"
  >
    {{-- main --}}
    <main class="history-empty">
      <div class="history-empty-icon" aria-hidden="true">
        <span class="material-symbols-rounded">history</span>
      </div>

      <p class="history-empty-title">履歴がまだありません</p>
      <p class="history-empty-sub">
        店舗の在庫状況を投稿すると、ここに履歴として残ります。
      </p>
    </main>
  </x-review-frame>
</x-app-layout>
