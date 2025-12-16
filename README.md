# TeamProject2（プロジェクト名は後で確定）

## 概要
- 目的：<一言で>
- 対象ユーザー：<誰が使うか>
- 成果物：<Web/CLI/モバイル 等>

## 動作環境
- Docker / Docker Compose v2
- 言語・FW：<Ruby 3.1 / Rails 7 など>
- DB：<MySQL 8 など>

## セットアップ（開発者向け）
```bash
# 初回のみ
docker compose up -d --build
docker compose exec web bin/rails db:create db:migrate
exit
```


## phpで始まるコマンドを打ちたいとき
```
docker compose exec laravel.test bash
```

## @Vite使用　Blade(HTML)表示
Docker立ち上げ後、`npm run dev`は必須

http://127.0.0.1/example アクセス可能に
