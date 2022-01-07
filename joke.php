<?php $pageid = "index"; ?>
<?php
include 'dbconnect.php';
$conn = OpenCon();
// echo "Connected Successfully";
$query = "SELECT * FROM joke";
$result = $conn->query($query);
CloseCon($conn);
?>

<?php
// connect to the database
$con = mysqli_connect('localhost', 'root', '', 'ajoke');

if (isset($_POST['liked'])) {
    $postid = $_POST['id'];
    $result = mysqli_query($con, "SELECT * FROM joke WHERE id=$postid");
    $row = mysqli_fetch_array($result);
    $n = $row['liked'];

    mysqli_query($con, "UPDATE joke SET liked=$n+1 WHERE id=$postid");

    echo $n + 1;
    exit();
}
if (isset($_POST['unliked'])) {
    $postid = $_POST['id'];
    $result = mysqli_query($con, "SELECT * FROM joke WHERE id=$postid");
    $row = mysqli_fetch_array($result);
    $n = $row['disliked'];

    mysqli_query($con, "UPDATE joke SET disliked=$n+1 WHERE id=$postid");

    echo $n + 1;
    exit();
}

// Retrieve posts from the database
$posts = mysqli_query($con, "SELECT * FROM joke");
if (isset($_GET["id"])) {
    $getid = $_GET['id'];
    $post = mysqli_query($con, "SELECT * FROM joke WHERE id=$getid");
}
?>
<?php include 'include/header.php'; ?>

<main class="p-top">
    <section class="p-top__mv">
        <div class="l-container">
            <h2 class="c-title1">
                <span class="c-title1__large">A joke a day keeps the doctor away</span>
                <span class="c-title1__small">If you joke wrong way, your teeth have to pay(Sirious)</span>
            </h2>
        </div>
    </section>
    <section class="p-top__main">
        <div class="l-container">

            <ul class="p-top__list">
                <li class="p=top__item">

                    <?php
                if (isset($_GET["id"])) {
                    $getid = $_GET['id'];
                    $post = mysqli_query($con, "SELECT * FROM joke WHERE id=$getid");
                    ?>

                    <?php
                if ($row = mysqli_fetch_array($post)) {
                    // var_dump($row['id']);
                    // $results = mysqli_query($con, "SELECT * FROM joke WHERE id=".$row['id']."");
                ?>
                    <p class="p-top__text"><?php echo $row['content']; ?></p>
                    <?php
                    // if (mysqli_num_rows($results) == 1) : ?>

                    <div class="p-top__btns">
                        <span class="liked" data-id="<?php echo $row['id']; ?>"><span
                                class="liked_count"><?php echo $row['liked']; ?> liked</span></span>
                        <span class="unliked" data-id="<?php echo $row['id']; ?>"><span
                                class="unliked_count"><?php echo $row['disliked']; ?> unliked</span></span>
                    </div>
                    <a href="joke.php?id=<?php echo $row["id"] + 1; ?>" class="liked"
                        style="margin-top: 30px; display: block">Click to next</a>
                    <?php // endif ?>

                    <?php 
                } else{
                    ?>
                    <p class="p-top__text">That's all the jokes for today! Come back another day!</p>
                    <?php
                }
                ?>
                    <?php
                } else{ ?>
                    <div class="welcome">
                        <h2 class="c-title1">Welcome to Smiley</h2>
                        <a href="joke.php?id=1" class="unliked" style="margin-top: 30px; width: 400px;">Click to smile
                            everyday!</a>
                    </div>
                    <?php }
                ?>

                </li>

            </ul>
        </div>
    </section>
</main>



<!-- Add Jquery to page -->
<script>
$(document).ready(function() {
    // when the user clicks on like
    $('.liked').on('click', function() {
        var postid = $(this).data('id');
        $post = $(this);

        $.ajax({
            url: 'joke.php',
            type: 'post',
            data: {
                'liked': 1,
                'id': postid
            },
            success: function(response) {
                $post.parent().find('span.liked_count').text(response + " likes");
                $post.addClass('hide');
                $post.siblings().removeClass('hide');
            }
        });
    });

    // when the user clicks on unlike
    $('.unliked').on('click', function() {
        var postid = $(this).data('id');
        $post = $(this);

        $.ajax({
            url: 'joke.php',
            type: 'post',
            data: {
                'unliked': 1,
                'id': postid
            },
            success: function(response) {
                $post.parent().find('span.unliked_count').text(response + " unlikes");
                $post.addClass('hide');
                $post.siblings().removeClass('hide');
            }
        });
    });
});
</script>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/hls/include/footer.php'); ?>