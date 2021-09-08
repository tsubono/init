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

### ダミーデータ作成
```
php artisan db:seed --class=DummyDataSeeder
```

### データリセット
```
 php artisan migrate:refresh --seed  
```

### 資料
- [XDデザイン](https://xd.adobe.com/view/ee793497-0356-4907-9c78-058d14e2b1c6-bb2a/)
- [設計](https://docs.google.com/spreadsheets/d/1FI2-o69B-Qwq7OY3VXW4r-EhMBn6x7I7vYLIkmLrm10/edit#gid=2015969446)