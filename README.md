## INIT Webアプリ用リポジトリ

### 技術
**Laravel 8.50.0*
- PHP7.4
- HTML / CSS
- Vue.js

### 最初だけ実行必要なコマンド
```
# .envファイル作成
cp .env.example .env
# ここで.envを自分の環境に編集してください
vi .env
# composerインストール
composer install
# npm インストール & ビルド
npm install
npm run dev
# APP_KEY設定
php artisan key:generate
# マイグレーション & シーダー実行
php artisan migrate --seed
# シンボリックリンク作成
php artisan storage:link
```