
<?php session_start(); 

    require_once './config/connect.php';
    require_once './config/functions.php';

    $user_data = check_login($conn);
?>

<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="css/home.css">

    <div class="first-content">
        <div class="content">
            <div class="title">Clubhouse Sandwich Savor, served <br> with crispy fries and a refreshing <br> 12 oz iced tea.</div>
            <p class="caption"><span style="color: #e0bb5e; font-weight: bold;">Upgrade</span> your iced tea to 16 oz or any Block 69 beverage <br> for just an additional 20!
            Don't forget, our Clubhouse Sandwich is also <br> available solo (without fries and drink)!</p>
            <a class="view-menu" href="menu.html">VIEW MENU</a>
        </div>
        <img src="Homepage Products/Clubhouse bundle design1.png" alt="">
    </div>
    <div class="second-content">
        <img src="Homepage Products/Workshop.jpg" alt="">
            <div class="content">
                <p class="title">A perfect blend of art, flavors, and fun!
                   <br> Which workshop would you like to join next? </p>
                <p class="caption">Embarked on a <span style="font-weight: bold; color: #e0bb5e;">successful</span> tote bag painting <br> extravaganza today, fueled by the delightful <br> combination of coffee and non-coffee, <br> scrumptious food, and an abundance of creative joy.</p>
                <a class="view-menu" href="#">LEARN MORE</a>
            </div>
        </div>
    </div>
    <div class="third-content">
        <img src="Homepage Products/latte.jpg" alt="">
        <div class="content">
            <span class="title">Keep an eye out on Block 69's latte.</span>
            <p class="caption">Embark on a <span style="font-weight: bold; color: #e0bb5e;">journey</span> 
                through the heart <br> of these vibrant cafes,
                where every cup holds a tale and each <br> corner whispers cozy conversations.</p>
            <a class="view-menu" href="menu.html">VIEW MENU</a>
        </div>
    </div>
    <div class="fourth-content">
        <div class="content">
            <div class="title">Indulge in the ultimate non-coffee delights <br> that have won over crowds everywhere! </div>
            <p class="caption">Have you treated yourself to the <span style="font-weight: bold; color: #e0bb5e;">refreshing</span> allure of our Pink Paradise or <br> the tantalizing blend of flavors in our Dark Berry? Sip, savor, <br> and discover your new favorites today!</p>
            <a class="view-menu" href="menu.html">VIEW MENU</a>
        </div>
        <img src="Homepage Products/dark berry design2.png" alt="image">
    </div>
    <div class="fifth-content">
        <img src="Homepage Products/pastries (1).png" alt="">
        <div class="content">
            <div class="title">Warning: Proceed with caution.</div>
            <p class="caption">These <span style="font-weight: bold; color: #e0bb5e;">pastries</span> have been known to cause uncrontrollable smiles <br> and sudden cravings. Eat at your own risk!</p>
            <a class="view-menu" href="menu.html">VIEW MENU</a>
        </div>
    </div>
    <div class="announcement">
        <p class="caption">We have a new schedule! <br>
            Starting February 19, 2024, we will operate from 8 AM to 12 AM. <br>
            Will accept dine-ins, take-outs, and deliveries</p>
    </div>

<?php include('partials/footer.php'); ?>