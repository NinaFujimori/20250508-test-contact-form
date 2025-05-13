# 20250508-test-contact-form

## お問い合わせフォーム


## 環境構築

Dockerビルド
    １git clone　リンク(後でリンクをつける)
    ２docker-compose up -d --build

    *MySQLはOSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

Laravel環境構築
    1.docker-compose exec php bash
    2.composer install
    3..env.exampleファイルから.envファイルを作成し、環境変数を変更
    4.php artisan key:generate
    5.php artisan migrate
    6.php artisan db:seed

## 使用技術
    ・PHP8.0
    ・Laravel 10.0
    ・MySQL 8.0

## ER図
    ![ER図](./ER/202505_test-contact-form_ER.png)


## URL
    ・環境開発:http://localhost
    ・phpMyAdmin:http://localhost:8080/

