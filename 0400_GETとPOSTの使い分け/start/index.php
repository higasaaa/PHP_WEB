<?php 
/**
 * GETとPOSTの使い分け
 * 
 * - URLは最大2000文字程度までしか設定できない。
 * - GETではパラメータを含めて共有できる。
 */
// データベースからデータを取り出すという処理に置き換わる
$students = [
    '1' => [
        'name' => 'taro',
        'age' => 15,
    ],
    '2' => [
        'name' => 'hanako',
        'age' => 14,
    ],
    '3' => [
        'name' => 'jiro',
        'age' => 12,
    ],
];

$id = $_GET['id'] ?? 1;
$student = $students[$id];
$name = $student['name'];
$age = $student['age'];
?>
<div><?php echo "{$name}は{$age}才です。"; ?></div>