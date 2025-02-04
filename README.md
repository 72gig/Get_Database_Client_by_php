## MQTT程式應用_客戶端(使用php)

這是一個測試使用php要怎麼連線資料庫來取得目標的程式，但有些部分需要設定，想要下載以後直接使用還是不行

### 事前準備

需要下載 php 程式，將 php 的 bin 資料夾路徑設定到環境變數後，將此目錄的 php.ini 複製到 php 的目錄，或是找到在 php 的目錄內的 php.ini-development 檔案，複製並改名為 php.ini ，再編輯檔案刪除下列程式碼前面的分號

```
session.auto_start = 0
extension=pdo_pgsql
extension=pgsql
```

### 使用方式

1. 開啟 php 程式，如果已經設定好環境變數，可以在終端機輸入以下的程式碼
```
php -S localhost:8000
```
2. 開啟 main.html ，在關注目標內輸入 mqtt 的 topic
3. 按下"顯示/收起連線資料"的按鈕，輸入登入資料庫的資料，以及使用的 php 使用的位址
4. 按下"登入"的按鈕，如果在今天有 topic 的資料，會每五秒更新一次
