

<section id="header">
<a href="index.html">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">
        <li class="link">
            <a class="active " href="index.html"></a>
        </li>
        <li class="link">
            <a href="shop.php"></a>
        </li>

        <li class="link">
            <a href="shop.php"><?= $content['shop'] ?></a>
        </li>

        <li class="link">
            <a href="blog.html"><?= $content['blog'] ?></a>
        </li>
        <li class="link">
            <a href="about.html"><?= $content['about'] ?></a>
        </li>
        <li class="link">
            <a href="contact.html"><?= $content['contact'] ?></a>
        </li>
        <li class="link">
            <a href="signup.php"><?= $content['signup'] ?></a>
        </li>
        <li class="link">
            <a href="lang.php?lang=en">English</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=ar">العربية</a>
        </li>
<?php if(isset($_SESSION['login'])){?>

    <li class="link">
            <a href="logout.php"><?= $content['logout'] ?></a>
        </li>

        <li class="link">
            <a href="#"><?= $_SESSION['user']['username'] ?></a>
        </li>
    <?php }else{ ?>

        <li class="link">
            <a href="login.php"><?= $content['login'] ?></a>
        </li>
        <?php } ?>

        <li class="link">
            <a id="lg-cart" href="cart.php">
                <i class="fas fa-shopping-cart"></i> 
            </a>
        </li>
        <a href="#" id="close"><i class="fas fa-times"></i> </a>
    </ul>

</div>

<div id="mobile">
    <a href="cart.php">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
</div>
</section>