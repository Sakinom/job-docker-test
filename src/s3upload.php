<?php
require_once "vendor/autoload.php";

use Aws\S3\S3Client;

$credentials = new Aws\Credentials\Credentials('your-access-key', 'your-secret-key');

// S3クライアントを作成
$s3 = new S3Client(array(
    'version' => 'latest',
    'credentials' => $credentials,
    // 'credentials' => array(
    //     'key' => $_ENV['AWS_KEY'],
    //     'secret' => $_ENV['AWS_SECRET'],
    //     // 'key'    => $awsKey,
    //     // 'secret' => $awsSecret,
    // ),
    'region'  => 'ap-northeast-1',
));

// ファイルがアップロードされているかチェック
$file = $_FILES['file']['tmp_name'];
if (!is_uploaded_file($file)) {
    error_log("E001:アップロードに失敗しました、エラーコードを運営に連絡してください。");
    throw new RuntimeException('E001:アップロードに失敗しました、エラーコードを運営に連絡してください。');
}


// S3バケットに画像をアップロード
$date = new DateTime();
$result = $s3->putObject(array(
    // 'Bucket' => 'your_aws_bucket_key',
    'Bucket' => $_ENV['AWS_BUCKET'],
    // 'Bucket' => $bucket,
    'Key' => $_POST['posse-gen'] . '期生/'
        . $_POST['filegroup'] . '/'
        . $_POST['member-list'] . '_' . $date->format('U') . '_' . $_FILES['file']['name'],
    'Body' => fopen($file, 'rb'),
    'ContentType' => $_FILES['file']['type'],
));

// 結果を表示
echo "I001:ファイルのアップロードOKです！";
