<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Services</title>
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
                <!--------------------------------------------------------------------------------->
                <!-- AGAR RAPI NANTI DI PHP BUAT PRODUCT DESC DENGAN MAKSIMAL KARAKTER 110 CHAR --->
                <!--------------------------------------------------------------------------------->
                <form action="product_search.php" method="get">
                    <input type="text" name="search" placeholder="Input Search">
                    <input type="submit" value="search">
                </form>
                <?php
                include "config/config.php";
                $search = $_GET['search'];

                $sql = "SELECT * FROM product_tbl WHERE name_product LIKE '%$search%' ";

                $queryproduct = $koneksi->query($sql);
                $product = $queryproduct->fetch_assoc();
                if ($product == true) {
                    do { ?>
                        <div class="product_item">
                            <div class="number_icon"><?= $product['id_procuct'] ?></div>
                            <h2 class="product_title"><?= $product['name_product'] ?></h2>
                            <div class="product_image">
                                <a class="example-image-link" href="product_images/<?= $product['gambar_product'] ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img src="product_images/<?= $product['gambar_product'] ?>"></a>
                            </div>
                            <p class="product_desc">
                                <?= substr($product['descripction_product'], 0, 250); ?>
                            </p>
                            <a href="#" class="detail_product">Read More</a>
                        </div>
                    <?php
                    } while ($product = $queryproduct->fetch_assoc());
                    ?>
                <?php } elseif ($product == false) {
                    echo "DATA KOSONG";
                    exit;
                } ?>



                <!--- END CONTENT WRAPPER -->

            </div>
            <!--------------------------------------- END CONTENT CONTENT--------------------------->
            <div id="footer">

                <div class="container">
                    <p> Copyright &copy; Your Company All Right Reserved</p>
                </div>

            </div>
            <!---------------------------------------- END FOOTER --------------------------------->
        </div>
        <script src="lightbox/js/jquery-1.11.0.min.js"></script>
        <script src="lightbox/js/lightbox.js"></script>
</body>

</html>