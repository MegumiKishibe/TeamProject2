@props([
  'store' => '',
  'account' => '',
  'title' => null,
  'hideStore' => false,
])

<x-review-frame
  :store="$store"
  :account="$account"
  active="history"
  nav="menu"
  :title="$title"
  :hide-store="$hideStore"
>
  {{ $slot }}
</x-review-frame>
