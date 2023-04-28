# udemy Laravel講座　第3弾

## ダウンロード方法

git clone

git clone

git clone ブランチを指定してダウンロードする場合

git clone -b ブランチ名 

もしくはzipファイルでダウンロードしてください

## インストール方法

- cd laravel_uReserve
- composer install
- npm install
- npm run dev

.env.example をコピーして .envファイルを作成

.envファイルを使用環境に合わせて変更してください。
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_ureserve
DB_USERNAME=root
DB_PASSWORD=

XAMPP/MAMPまたは他の開発環境でDBを起動した後に、

php artisan migrate:fresh --seed

と実行してください。（データベーステーブルとダミーデータが追加されればOK）

最後に
php artisan key:generate
と入力してキーを生成後、

php artisan serve
で簡易サーバーを立ち上げ、表示確認をしてください。

## インストール後の実施事項

画像のリンク
php artisan storage:link

プロフィールページで画像アップロード機能を使う場合は、
.envのAPP＿URLを下記に変更してください。

# APP_URL=http://localhost
APP_URLhttp://127.0.01:8000

Tailwindcss 3.xのJustInTime機能により、
使ったHTML内クラスのみ反映されるようになっていますので、
HTMLを編集する際は、別途コマンドプロンプトで
npm run dev
を走らせた状態で実行してください。
