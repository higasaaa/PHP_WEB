<?php
session_start();
$self_url = $_SERVER['PHP_SELF']; //今いる自分のURLを取得する。
?>

<form action="<?php echo $self_url; ?>" method="post">
    <input type="text" name="title">
    <input type="submit" name="type" value="create">
</form>

<?php //フォームから値を受け取るためのロジック


if (isset($_POST['type'])) {
    if ($_POST['type'] === 'create') {
        $_SESSION['todos'][] = $_POST['title']; //配列のtodosに要素を追加していく
        echo "新しいタスク[{$_POST['title']}]が追加されました。<br>";
    } elseif ($_POST['type'] === 'update') {
        $id = $_POST['id'];
        $_SESSION['todos'][$id] = $_POST['title'];
        echo "タスク[{$_POST['title']}]に変更されました。<br>";
    } elseif ($_POST['type'] === 'delete') {
        $id = $_POST['id'];
        array_splice($_SESSION['todos'], $id, 1);
        echo "タスク[{$_POST['title']}]が削除されました。<br>";
    }
}
if (empty($_SESSION['todos'])) { //sessionの配列が空だった場合
    $_SESSION['todos'] = []; //配列として使いたい場合には1番最初に初期化を行ってあげる必要がある
    echo "タスクを入力しましょう！";
    die(); //処理を止める関数
}

?>

<ul>
    <?php
    for ($i = 0; $i < count($_SESSION['todos']); $i++) :
    ?>
        <li>
            <form action="<?php echo $self_url; ?>" method="post"> <!--self_url自分のurl-->
                <input type="hidden" name="id" value="<?php echo $i; ?>"> <!--どのアイテムかわからなくなるため何番目のidが飛んできたのかわかるようにする-->
                <input type="text" name="title" value="<?php echo $_SESSION['todos'][$i]; ?>">
                <input type="submit" name="type" value="delete">
                <input type="submit" name="type" value="update">
            </form>
        </li>

    <?php endfor; ?>
</ul>