# TeamProject2（プロジェクト名は後で確定）

## 概要

-   目的：<一言で>
-   対象ユーザー：<誰が使うか>
-   成果物：<Web/CLI/モバイル 等>

## 動作環境

-   Docker / Docker Compose v2
-   言語・FW：<Ruby 3.1 / Rails 7 など>
-   DB：<MySQL 8 など>

## セットアップ（開発者向け）

```bash
# 初回のみ
docker compose up -d --build
docker compose exec web bin/rails db:create db:migrate
exit
```

## php で始まるコマンドを打ちたいとき

※コンテナの中に入る

```
docker compose exec laravel.test bash
```

## @Vite 使用　 Blade(HTML)表示

```
docker-compose exec laravel.test npm run dev
```

Docker 立ち上げ後、`npm run dev`は必須

```
ユーザー名：TestHanako
メールアドレス：Test@example.com
パスワード：Testtest1234
```

| 状態   | ページ     | Views                   | リンク                         |
| ------ | ---------- | ----------------------- | ------------------------------ |
| ゲスト | ログイン   | auth/top.blade.php      | http://127.0.0.1:8000/login    |
| ゲスト | 新規登録   | auth/register.blade.php | http://127.0.0.1:8000/register |
| ゲスト | マップ     | gest/map.blade.php      | http://127.0.0.1/map           |
| ゲスト | 口コミ閲覧 | gest/reviews.blade.php  | http://127.0.0.1/reviews       |

| 状態     | ページ         | Views             | リンク                                     |
| -------- | -------------- | ----------------- | ------------------------------------------ |
| ユーザー | ホーム         | example.blade.php | http://127.0.0.1:8000/example              |
| ユーザー | アカウント編集 | profile/          | http://127.0.0.1/profile                   |
| ユーザー | 自分の投稿履歴 | author/           | http://127.0.0.1:8000/author-myposts       |
| ユーザー | 自分の投稿作成 | author/           | http://127.0.0.1:8000/author-review-create |
| ユーザー | 自分の投稿編集 | author/           | http://127.0.0.1:8000/author-review-edit   |
| ユーザー | 口コミ一覧画面 | suthor/           | http://127.0.0.1/author-reviews            |
