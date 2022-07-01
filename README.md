# RESE

## 1.概要
- ある企業のグループ会社の飲食店予約サービス。

## 2.環境構築手順

1.GitHubよりダウンロード

 - $　git clone https://github.com/yakushido/COACH_Rese.git

2.Dockerのコンテナを作成、起動

 - $ docker compose up -d --build
  
4..envファイルの書き換え

 - $ docker-compose exec app bash
 - $ cp .env.example .env
 - .env内の下記項目を次に書き換え

    DB_CONNECTION=mysql
    
    DB_HOST=db
    
    DB_PORT=3306
    
    DB_DATABASE=laravel
    
    DB_USERNAME=yaku
    
    DB_PASSWORD=yaku

5.storage 以下に書き込み権限を付ける

 - $ chmod 777 -Rf storage

6.APP_KEYの生成

 - $ php artisan key:generate

7.マイグレーションの実行

 - $ docker-compose exec app bash

 - $ php artisan migrate

8.シーダーの実行

 - $ php artisan db:seed

9.シンボリックリンクを設定する

 - $ php artisan storage:link


## 3.使用画面のイメージ

　店舗一覧ページ
<img width="1440" alt="rese home" src="https://user-images.githubusercontent.com/98631346/176901510-904e1d39-abd8-4d90-8563-2014bdc35425.png">

## 4.制作背景・目的

- 外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## 5.使用技術、バージョン

- フロントエンド
  - HTML / CSS
  - jQuery 3.5.1

- バックエンド
  - PHP 8.1.7
  - Laravel 8.83.12

- データベース
  - MySQL 5.7.34


## 6.機能一覧

- 会員登録
- ログイン
- ログアウト
- ユーザー情報取得
- ユーザー飲食店お気に入り一覧取得
- ユーザー飲食店予約情報取得
- 飲食店一覧取得
- 飲食店詳細取得
- 飲食店お気に入り追加
- 飲食店お気に入り削除
- 飲食店予約情報追加
- 飲食店予約情報削除
- 飲食店予約情報変更
- エリアで検索する
- ジャンルで検索する
- 店名で検索する
- 管理画面

  email: owner@example.com
  
  password: owner@example.comで管理者ページに入れます
