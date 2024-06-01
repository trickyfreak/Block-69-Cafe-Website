<?php 

session_start();
include('partials/header.php'); 

?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<section class="bg-white w-full h-full flex flex-col pb-24">
    <div class="flex flex-col gap-7 text-center">
        <div class="w-full h-96">
            <img src="packagesImages/packageHome.png" alt="Home image" class="w-full h-96 object-cover">
        </div>
        <div class="px-40 gap-20">
            <h1 class="text-3xl">
                PACKAGES
            </h1>
            <h3 class="font-light">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            </h3>
        </div>
    </div>
</section>

<section class="flex justify-center w-full h-full flex pb-24">

    <div class="flex flex-row w-4/5 gap-5">
        <div class="flex flex-col w-auto h-auto border-black border-2 rounded-lg text-center items-center p-5">
            <img src="packagesimages/coffee-icon.png" alt="" class="w-1/5 mb-5">
            <h1 class="text-3xl mb-1">
                Cafe Packages
            </h1>
            <h3 class="font-light">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </h3>
            <a href="cafePackages.php" class="w-1/5 bg-white text-black border-black border-2 rounded p-3 mt-3 hover:bg-black hover:text-white">More</a>
        </div>
        <div class="flex flex-col w-auto h-auto border-black border-2 rounded-lg text-center items-center p-5">
            <img src="packagesimages/chef-icon.png" alt="" class="w-1/5 mb-5">
            <h1 class="text-3xl mb-1">
                Catering Services
            </h1>
            <h3 class="font-light">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </h3>
            <a href="cateringServices.php" class="w-1/5 bg-white text-black border-black border-2 rounded p-3 mt-3 hover:bg-black hover:text-white">More</a>
        </div>
    </div>

</section>


<?php include('partials/footer.php'); ?>