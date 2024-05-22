<?php
include_once './config/connect.php';
include_once './config/functions.php';
include_once './config/content-manage.php';
include_once('partials/header.php');

session_start();
$conn = get_connection();
$user_data = check_login($conn);
$user_type = check_usertype($conn);

//GETTING content
$content_id = 0;
$contentsimages = get_galleryimage($conn);
$contentssection = get_gallerysection($conn);
$contentsvideos1 = get_galleryvideo($conn, 2);
$contentsvideos2 = get_galleryvideo($conn, 3);
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="css/gallery.css">
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<section class="bg-white w-full h-fullflex flex-col pb-24">
    <div class="flex flex-col gap-7 text-center">
        <div class="w-full h-96">
            <img src="galleryImages/pastries (1).png" alt="Home image" class="w-full h-96 object-cover">
        </div>
        <div class="px-40">
            <h1 class="text-3xl">
                GALLERY
            </h1>
            <h3 class="font-light">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            </h3>
        </div>
    </div>
</section>
<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnBlack edit-open" data-modal="modal-1" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-black w-full flex items-center justify-center py-40">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-2/4">
    <?php 

    $img0 = $contentsimages[0]["img"];
    $img0id = $contentsimages[0]["img_ID"];
    $img1 = $contentsimages[1]["img"];
    $img1id = $contentsimages[1]["img_ID"];
    $img2 = $contentsimages[2]["img"];
    $img2id = $contentsimages[2]["img_ID"];
    $img3 = $contentsimages[3]["img"];
    $img3id = $contentsimages[3]["img_ID"];

    echo '
    
        <img src="'.$img0. '" class="object-cover h-full max-h-60 w-full" alt="">
        <img src="'.$img1. '" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
        <img src="'.$img2. '" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
        <img src="'.$img3. '" class="object-cover h-full max-h-60 w-full" alt="">
    
    ';
    ?>
    </div>
    <div class="bg-modal modal-1" id="modal-1">
        <div class="modal-content">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
            <div class="flex flex-col gap-4">
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image1"><?php echo $img0 ?></label>
                    <input type="file" class="inputfile" id="image1" name="image1">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image2"><?php echo $img1 ?></label>
                    <input type="file" class="inputfile" id="image2" name="image2">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image3"><?php echo $img2 ?></label>
                    <input type="file" class="inputfile" id="image3" name="image3">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image4"><?php echo $img3 ?></label>
                    <input type="file" class="inputfile" id="image4" name="image4">
                </div>
                <div class="flex gap-4 self-end">
                    <input class="saveBtn" type="submit" name="submit">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnWhite edit-open" data-modal="modal-2" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-white w-full flex items-center justify-center py-40">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-2/4">
    <?php 

    $img4 = $contentsimages[4]["img"];
    $img5 = $contentsimages[5]["img"];
    $img6 = $contentsimages[6]["img"];
    $img7 = $contentsimages[7]["img"];

    echo '
    
        <img src="'.$img4. '" class="object-cover h-full max-h-60 w-full" alt="">
        <img src="'.$img5. '" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
        <img src="'.$img6. '" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
        <img src="'.$img7. '" class="object-cover h-full max-h-60 w-full" alt="">
    
    ';
    ?>
    </div>
    <div class="bg-modal modal-2" id="modal-2">
        <div class="modal-content">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
            <div class="flex flex-col gap-4">
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image5"><?php echo $img4 ?></label>
                    <input type="file" class="inputfile" id="image5" name="image5">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image6"><?php echo $img5 ?></label>
                    <input type="file" class="inputfile" id="image6" name="image6">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image7"><?php echo $img6 ?></label>
                    <input type="file" class="inputfile" id="image7" name="image7">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image8"><?php echo $img7 ?></label>
                    <input type="file" class="inputfile" id="image8" name="image8">
                </div>
                <div class="flex gap-4 self-end">
                    <input class="saveBtn" type="submit" name="submit">
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnBlack edit-open" data-modal="modal-3" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-black w-full flex items-center justify-center py-40">
    <div class="flex flex-col items-center justify-center md:flex-row">
        <div class="flex hidden items-center justify-center p-10 md:block">
        <?php

            $vid1 = $contentsvideos1[0]["video"];

            echo '
                <video src="'.$vid1.'" controls></video>
            ';

        ?>
        </div>
        <div class="flex flex-col items-center justify-center p-10">
            <h1 class="text-white text-center text-2xl pb-3">
                <?php
                    echo $contentssections[0]["title"];
                ?>
            </h1>
            <h3 class="text-white text-justify font-light">
                <?php
                    echo $contentssections[0]["description"];
                ?>
            </h3>
        </div>
        <div class="flex block items-center justify-center p-10 md:hidden">
            <?php

            $vid1 = $contentsvideos1[0]["video"];

            echo '
                <video src="'.$vid1.'" controls></video>
            ';

            ?>
        </div>
    </div>
    <div class="bg-modal modal-3" id="modal-3">
        <div class="modal-content">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
            <div class="flex flex-col gap-4">
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="section1title">Title</label>
                    <input type="text" id="section1title" name="section1title" value="<?php echo $contentssections[0]["title"]; ?>">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="section1description">Description</label>
                    <textarea id="section1description" name="section1description"><?php echo $contentssections[0]["description"]; ?></textarea>
                </div>
                <div class="flex gap-4 self-end">
                    <input class="saveBtn" type="submit" name="submit">
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnWhite edit-open" data-modal="modal-4" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-white w-full flex items-center justify-center py-20">
    <div class="flex flex-col items-center justify-center px-20">
        <h1 class="text-black text-center text-2xl pb-3">
            <?php
                echo $contentssections[1]["title"];
            ?>
        </h1>
        <h3 class="text-black text-center font-light pb-3">
            <?php
                echo $contentssections[1]["description"];
            ?>
        </h3>
        <div class="grid grid-cols-1 auto-rows-auto grid-flow-cols gap-5 md:grid-cols-3 md:grid-row-2 grid-flow-cols md:gap-4">
            <?php foreach($contentsvideos2 as $contentvideo2) {
                $vid = $contentvideo2["video"];
                echo '
                <div class="">
                    <video src="'.$vid.'" loop autoplay controls></video>
                </div>
                ';
            }
            ?>
        </div>
    </div>
    <div class="bg-modal modal-4" id="modal-4">
        <div class="modal-content">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
            <div class="flex flex-col gap-4">
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="section2title">Title</label>
                    <input type="text" id="section2title" name="section2title" value="<?php echo $contentssections[1]["title"]; ?>">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="section2description">Description</label>
                    <textarea id="section2description" name="section2description"><?php echo $contentssections[1]["description"]; ?></textarea>
                </div>
                <div class="flex gap-4 self-end">
                    <input class="saveBtn" type="submit" name="submit">
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnBlack edit-open" data-modal="modal-5" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-black w-full flex items-center justify-center py-40">
    <div class="flex flex-col items-center justify-center px-20">
        <h1 class="text-white text-center text-2xl pb-3">
            <?php
                echo $contentssections[2]["title"];
            ?>
        </h1>
        <h3 class="text-white text-center font-light pb-3">
            <?php
                echo $contentssections[2]["description"];
            ?>
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
            <?php foreach($contentsimages as $image) {
                $img = $image["img"];
                echo '
                <div class="w-full">
                    <img src="'.$img.'" class="object-cover h-full max-h-60 w-full" alt="">
                </div>
                ';
            }
            ?>
            <?php foreach($contentsvideos2 as $contentvideo2) {
                $vid = $contentvideo2["video"];
                echo '
                <div class="w-full">
                    <video src="'.$vid.'" loop autoplay controls></video>
                </div>
                ';
            }
            ?>
        </div>
    </div>
    <div class="bg-modal modal-5" id="modal-5">
        <div class="modal-content">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
            <div class="flex flex-col gap-4">
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="section3title">Title</label>
                    <input type="text" id="section3title" name="section3title" value="<?php echo $contentssections[2]["title"]; ?>">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="section3description">Description</label>
                    <textarea id="section3description" name="section3description"><?php echo $contentssections[2]["description"]; ?></textarea>
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="image9">Upload Image</label>
                    <input type="file" class="inputfile" id="image9" name="image9">
                </div>
                <div class="flex gap-4">
                    <label class="text-white custom-file-upload" for="video1">Upload Video</label>
                    <input type="file" class="inputfile" id="video1" name="video1">
                </div>
                <div class="flex gap-4 self-end">
                    <input class="saveBtn" type="submit" name="submit">
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('partials/footer.php'); ?>

<script>
document.querySelectorAll('.edit-open').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var modalId = this.getAttribute('data-modal');
        document.getElementById(modalId).style.display = 'flex';
    });
});

document.querySelectorAll('.close').forEach(function(element) {
    element.addEventListener('click', function() {
        this.closest('.bg-modal').style.display = 'none';
    });
});
</script>
