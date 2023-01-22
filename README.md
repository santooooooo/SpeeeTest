# Speee技術課題　フィボナッチ数を返すAPIサービスの開発
# 使用方法
## curl
```terminal
curl -X GET -H "Content-Type: application/json" "https://speee-recruit-test.herokuapp.com/api/fib?n=求めたい番号"
```
## ブラウザ
```terminal
https://speee-recruit-test.herokuapp.com/api/fib?n=求めたい番号
```
# 出力
## 成功例（入力値が正の整数である場合）
```json
{"result":"求めたい番号の数値(int型)"}
```
## 失敗例（入力値に負の整数や文字列データ、少数点がある場合）
```json
{"result":"求めたい番号の数値(int型|string型)"}
```

**注意点**
- herokuのecho dynoを使用しているため最初のリクエストに対するレスポンス処理はそれ以降のリクエストに比べて遅くなる
- フィボナッチ数が`PHP_INT_MAX(9223372036854775807)`を超える時（n>92）、数値として処理できなかったため指数を利用した文字列データを返す

# 実装について

# 動作環境
|ツール|バージョン|
|:--|:--|
|PHP|8.0.27|
|Laravel|9.48.0|
|nginx||
|php-fpm||

## 構成
- [FibonacciController.php](https://github.com/santooooooo/SpeeeTest/blob/main/app/Http/Controllers/FibonacciController.php)
リクエスト内容のバリデーションとFibonacciCalculate.phpの実行
- [FibonacciCalculate.php](https://github.com/santooooooo/SpeeeTest/blob/main/app/Service/FibonacciCalculate.php)
フィボナッチ数の算出
![https://whi.s3.amazonaws.com/asset/Speee_+Backend.png](https://whi.s3.amazonaws.com/asset/Speee_+Backend.png)

## ユニットテスト
### 使用方法
- [FibonacciControllerTest.php](https://github.com/santooooooo/SpeeeTest/blob/main/tests/Feature/FibonacciControllerTest.php): FibonacciController.phpのテスト
このリポジトリのrootディレクトリで以下のコマンドを実行
```terminal
php artisan test tests/Feature/FibonacciControllerTest.php
```

- [FibonacciCalculateTest.php](https://github.com/santooooooo/SpeeeTest/blob/main/tests/Unit/FibonacciCalculateTest.php): FibonacciCalculate.phpのテスト
このリポジトリのrootディレクトリで以下のコマンドを実行
```terminal
php artisan test tests/Unit/FibonacciCalculateTest.php
```
