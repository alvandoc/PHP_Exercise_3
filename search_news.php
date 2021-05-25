<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search News</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        <div id="header">

            <div class="container">
                <img id="logo" src="images/logo.png">
                <div id="menu">
                    <ul>
                        <li class="nav1"><a href="index.php">HOME</a></li>
                        <li class="nav2"><a href="news_pagging.php">NEWS</a></li>
                        <li class="nav3"><a href="products.php">PRODUCTS</a></li>
                        <li class="nav4"><a href="contact.php">CONTACT</a></li>
                        <li class="nav5"><a href="gallery.php">GALLERY</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!---------------------------------------- END HEADER -------------------------------->
        <div id="greenLine"></div>
        <div id="content">

            <div class="container">
                <div class="top">
                    <style>
                        .top {
                            height: 20px;
                            padding: 20px;
                        }

                        .top form {
                            float: left;
                            width: 250px;
                        }
                    </style>

                    <form action="search_news.php" method="GET">
                        <input type="text" name="search" placeholder="search news">
                        <input type="submit" value="search">
                    </form>
                </div>
                <?php
                //memanggil config database ..
                include "config/config.php";
                $search = $_GET['search'];
                // Script untuk memilih seluruh yang ada di table news_tbl
                $sql = "SELECT * FROM news_tbl WHERE title LIKE '%$search%' ";
                // Script untuk mengarray isi yang ada di dalam news_tbl
                $querynews = $koneksi->query($sql);
                // Script untuk memanggil semua isi yang ada di dalam table database yang sebelumnya di array
                $news = $querynews->fetch_assoc();
                do {
                ?>
                    <div class="newsitem">
                        <div class="date_circle">
                            <p class="day"><?php echo $news['id_news']; ?></p>
                        </div>
                        <h2 class="news_title"><?php echo $news['title']; ?></h2>
                        <div class="clear"></div>
                        <div class="img-box" style="width: 221px; height: 182px; float: left;">
                            <img src="news_images/<?php echo $news['images']; ?>" class="news_image">
                        </div>
                        <p class="news_synopsis"><?php echo substr($news['description'], 0, 250);  ?></p>
                        <a href="news_detail.php?id_news=<?= $news['id_news']; ?>" class="link_detail">Read More</a>
                    </div>
                <?php } while ($news = $querynews->fetch_assoc()); ?>
            </div>
            <!--- END CONTENT WRAPPER -->

        </div>
        <!---------------------------------------- END CONTENT ------------------------------->
        <div id="footer">

            <div class="container">
                <p> Copyright &copy; Your Company All Right Reserved</p>
            </div>

        </div>
        <!---------------------------------------- END FOOTER --------------------------------->
    </div>
</body>

</html>