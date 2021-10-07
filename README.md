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

### ローカル用管理ユーザー (admin_users)
email: admin@test.com
pass: test

### ダミーデータ作成
```
php artisan db:seed --class=DummyDataSeeder
```

### データリセット
```
 php artisan migrate:refresh --seed  
```

### 決済に関して
Paypal & PAY.JP を使用しているので、認証情報を.envに記載必要です
```
### PayPal API Credentials ###
# sandbox (テスト)
PAYPAL_CLIENT_ID=
PAYPAL_CLIENT_SECRET=
# live (本番)
# PAYPAL_CLIENT_ID=
# PAYPAL_CLIENT_SECRET=

### PAYJP API Credentials ###
# テスト
PAYJP_PUBLIC_KEY=
PAYJP_SECRET_KEY=
# 本番
# PAYJP_PUBLIC_KEY=
# PAYJP_SECRET_KEY=
```
IDとSECRETは個別に聞いてください

### 資料
- [XDデザイン](https://xd.adobe.com/view/ee793497-0356-4907-9c78-058d14e2b1c6-bb2a/)
- [設計](https://docs.google.com/spreadsheets/d/1FI2-o69B-Qwq7OY3VXW4r-EhMBn6x7I7vYLIkmLrm10/edit#gid=2015969446)