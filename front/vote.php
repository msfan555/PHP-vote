<?php
include_once "./api/base.php";

// $user=find("users",$_SESSION['user'])['id'];

$subject = find("subjects", $_GET['id']);

$opts = all("options", ['subject_id' => $_GET['id']]);

?>

<h1><?= $subject['subject']; ?></h1>
<form action="./api/vote.php" method="post">

<?php
foreach ($opts as $opt) {
?>
    <div class="vote-item">
        <?php
        if ($subject['multiple'] == 0) {
        ?>
            <input type="radio" name="opt" value="<?=$opt['id'];?>">
        <?php
        } else {
        ?>
            <input type="checkbox" name="opt[]" value="<?=$opt['id'];?>">
        <?php
        }
        ?>
        <?= $opt['option']; ?>
    </div>
<?php
}
?>

<input type="submit" value="投票！" >
<input type="reset" value="重新選擇" >
<input type="button" value="放棄投票" onclick="location.href='index.php'">
</form>