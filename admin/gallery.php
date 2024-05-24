<?php
include_once './config/connect.php';
include_once './config/functions.php';
include_once './config/content-manage.php';

session_start();
$conn = get_connection();
$user_data = check_login($conn);
$user_type = check_usertype($conn);

//GETTING content
$content_id = 0;
$contentsimages = get_galleryimage($conn);
$contentssection = get_gallerysection($conn);
$contentsvideos1 = get_galleryvideo($conn);

update_image_when_submit($conn);
update_sectionContent_when_submit($conn);
update_video_when_submit($conn);


include_once('partials/header.php');
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="css/gallery.css">
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnWhite edit-open" data-modal="modal-1" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>

<section class="bg-white w-full h-full flex flex-col pb-24">
    <div class="flex flex-col gap-8 text-center">
        <div class="w-full h-96">
        <?php 

            $img0 = $contentsimages[0]["img"];
            $img0_id = $contentsimages[0]["img_ID"];

            $title0 = $contentssection[0]["title"];
            $desc0 = $contentssection[0]["description"];
            $section0_ID = $contentssection[0]["sectionID"];

            echo '

            <img src="'.$img0.'" alt="Home image" class="w-full h-96 object-cover">

            ';
        ?>
        </div>
        <div class="px-40 flex gap-2 flex-col">
            <h1 class="text-3xl">
                <?php echo $title0;?>
            </h1>
            <h3 class="font-light">
                <?php echo $desc0;?>
            </h3>
        </div>
    </div>
    <form method='POST' action='./gallery.php' enctype='multipart/form-data'>
        <input hidden name='img_ID' value='<?php echo $img0_id ?>' />
        <input hidden name='sectionID' value='<?php echo $section0_ID ?>' />
        <div class="bg-modal modal-1" id="modal-1">
            <div class="modal-content">
                <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
                <div class="flex flex-col gap-4 bg-black p-10">
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1title">Title</label>
                        <textarea id="section1title" name="section1title"><?php echo $contentssection[0]["title"]; ?></textarea>
                    </div>
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1description">Description</label>
                        <textarea id="section1description" name="section1description"><?php echo $contentssection[0]["description"]; ?></textarea>
                    </div>
                    <div class="flex gap-4 flex-col">
                        <h1 class="text-white">Image displayed:</h1>
                        <label class="text-center text-white custom-file-upload border border-white p-1">
                            <?php echo $img0 ?>
                        </label>
                        <input type="file" class="inputfile text-white" id="image1" name="file-img">
                    </div>
                    <div class="">
                        <button type='submit' class="bg-white px-3 py-1">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnBlack edit-open" data-modal="modal-2" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-black w-full flex items-center flex-col justify-center py-40">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-2/4">
        <?php 
        $img1 = $contentsimages[1]["img"];
        $img1_id = $contentsimages[1]["img_ID"];
        $img2 = $contentsimages[2]["img"];
        $img2_id = $contentsimages[2]["img_ID"];
        $img3 = $contentsimages[3]["img"];
        $img3_id = $contentsimages[3]["img_ID"];
        $img4 = $contentsimages[4]["img"];
        $img4_id = $contentsimages[4]["img_ID"];
        
        echo '
            <img src="'.$img1.'" class="object-cover h-full max-h-60 w-full" alt="">
            <img src="'.$img2.'" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
            <img src="'.$img3.'" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
            <img src="'.$img4.'" class="object-cover h-full max-h-60 w-full" alt="">
        ';
        ?>
    </div>
    <div class="bg-modal modal-2" id="modal-2">
        <div class="modal-content">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
            <form method='POST' action='./gallery.php' enctype='multipart/form-data'>
                <input hidden name='img_ID1' value='<?php echo $img1_id ?>' />
                <input hidden name='img_ID2' value='<?php echo $img2_id ?>' />
                <input hidden name='img_ID3' value='<?php echo $img3_id ?>' />
                <input hidden name='img_ID4' value='<?php echo $img4_id ?>' />
                <div class="flex flex-col gap-5 bg-black p-10">
                    <h1 class="text-white">Image displayed:</h1>
                    <div class="flex gap-4">
                        <label class="text-white custom-file-upload text-center text-white custom-file-upload border border-white p-1"><?php echo $img1 ?></label>
                        <input type="file" class="inputfile text-white" id="image2" name="file-img1">
                    </div>
                    <div class="flex gap-4">
                        <label class="text-white custom-file-upload text-center text-white custom-file-upload border border-white p-1"><?php echo $img2 ?></label>
                        <input type="file" class="inputfile text-white" id="image3" name="file-img2">
                    </div>
                    <div class="flex gap-4">
                        <label class="text-white custom-file-upload text-center text-white custom-file-upload border border-white p-1"><?php echo $img3 ?></label>
                        <input type="file" class="inputfile text-white" id="image4" name="file-img3">
                    </div>
                    <div class="flex gap-4">
                        <label class="text-white custom-file-upload text-center text-white custom-file-upload border border-white p-1"><?php echo $img4 ?></label>
                        <input type="file" class="inputfile text-white" id="image5" name="file-img4">
                    </div>
                    <div class="">
                        <button type='submit' class="bg-white px-3 py-1">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnWhite edit-open" data-modal="modal-3" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-white w-full flex items-center justify-center py-40">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-2/4">
    <?php 

    $img5 = $contentsimages[5]["img"];
    $img6 = $contentsimages[6]["img"];
    $img7 = $contentsimages[7]["img"];
    $img8 = $contentsimages[8]["img"];

    echo '
    
        <img src="'.$img5. '" class="object-cover h-full max-h-60 w-full" alt="">
        <img src="'.$img6. '" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
        <img src="'.$img7. '" class="object-cover h-full max-h-60 md:col-span-2 w-full" alt="">
        <img src="'.$img8. '" class="object-cover h-full max-h-60 w-full" alt="">
    
    ';
    ?>
    </div>
    <div class="bg-modal modal-3" id="modal-3">
        <div class="modal-content">
            <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
            <div class="flex flex-col gap-4 p-10">
                <div class="flex gap-4">
                    <label class="text-center text-white custom-file-upload border border-white p-1" for="image5"><?php echo $img5 ?></label>
                    <input type="file" class="inputfile" id="image5" name="image5">
                </div>
                <div class="flex gap-4">
                    <label class="text-center text-white custom-file-upload border border-white p-1" for="image6"><?php echo $img6 ?></label>
                    <input type="file" class="inputfile" id="image6" name="image6">
                </div>
                <div class="flex gap-4">
                    <label class="text-center text-white custom-file-upload border border-white p-1" for="image7"><?php echo $img7 ?></label>
                    <input type="file" class="inputfile" id="image7" name="image7">
                </div>
                <div class="flex gap-4">
                    <label class="text-center text-white custom-file-upload border border-white p-1" for="image8"><?php echo $img8 ?></label>
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
        <div><button class="edit-btnBlack edit-open" data-modal="modal-4" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-black w-full flex items-center justify-center py-40">
    <div class="flex flex-col items-center justify-center md:flex-row">
        <div class="flex hidden items-center justify-center p-10 md:block">
        <?php

            $vid1 = $contentsvideos1[0]["video"];
            $vid0_id = $contentsvideos1[0]["vidID"];
            $section1_ID = $contentssection[1]["sectionID"];

            echo '
                <video src="'.$vid1.'" muted controls></video>
            ';

        ?>
        </div>
        <div class="flex flex-col items-center justify-center p-10">
            <div class="px-24">
            <h1 class="text-white text-center text-2xl py-3">
                <?php
                    echo $contentssection[1]["title"];
                ?>
            </h1>
            </div>
            <h3 class="text-white text-justify font-light">
                <?php
                    echo $contentssection[1]["description"];
                ?>
            </h3>
        </div>
        <div class="flex block items-center justify-center p-10 md:hidden">
            <?php

            echo '
                <video src="'.$vid1.'" muted controls></video>
            ';

            ?>
        </div>
    </div>
    <div class="bg-modal modal-4" id="modal-4">
        <div class="modal-content">
            <form method='POST' action='./gallery.php' enctype='multipart/form-data'>
                <input hidden name='vid_ID' value='<?php echo $vid0_id ?>' />
                <input hidden name='sectionID' value='<?php echo $section1_ID ?>' />
                <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
                <div class="flex flex-col gap-4 p-10">
                    <div class="flex gap-4">
                        <label class="text-white custom-file-upload" for="section1title">Title</label>
                        <input type="text" id="section2title" name="section1title" value="<?php echo $contentssection[1]["title"]; ?>">
                    </div>
                    <div class="flex gap-4">
                        <label class="text-white custom-file-upload" for="section1description">Description</label>
                        <textarea id="section2description" name="section1description"><?php echo $contentssection[1]["description"]; ?></textarea>
                    </div>
                    <div class="flex gap-4 flex-col">
                        <label class="text-center text-white custom-file-upload border border-white p-1"><?php echo $vid1 ?></label>
                        <input type="file" class="inputfile text-white" id="video1" name="file-vid">
                    </div>
                    <div class="">
                        <button type='submit' class="bg-white px-3 py-1">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnWhite edit-open" data-modal="modal-5" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>
<section class="bg-white w-full flex items-center justify-center py-20">
    <div class="flex flex-col items-center justify-center gap-10 px-20">
        <div class="">
            <h1 class="text-black text-center text-2xl pb-3">
                <?php
                    echo $contentssection[2]["title"];
                ?>
            </h1>
            <h3 class="text-black text-center font-light pb-3">
                <?php
                    echo $contentssection[2]["description"];
                ?>
            </h3>
        </div>
        <div class="grid grid-cols-1 auto-rows-auto grid-flow-cols gap-5 md:grid-cols-3 md:grid-row-2 grid-flow-cols md:gap-4">
            <?php
                $vid2 = $contentsvideos1[1]["video"];
                $vid1_id = $contentsvideos1[1]["vidID"];
                $vid3 = $contentsvideos1[2]["video"];
                $vid2_id = $contentsvideos1[2]["vidID"];
                $vid4 = $contentsvideos1[3]["video"];
                $vid3_id = $contentsvideos1[3]["vidID"];
                $vid5 = $contentsvideos1[4]["video"];
                $vid4_id = $contentsvideos1[4]["vidID"];
                $vid6 = $contentsvideos1[5]["video"];
                $vid5_id = $contentsvideos1[5]["vidID"];
                $vid7 = $contentsvideos1[6]["video"];
                $vid6_id = $contentsvideos1[6]["vidID"];
                $section2_ID = $contentssection[2]["sectionID"];

                echo '
                <div class="w-56">
                    <video src="'.$vid2.'" loop autoplay muted controls></video>
                </div>
                <div class="w-56">
                    <video src="'.$vid3.'" loop autoplay muted controls></video>
                </div>
                <div class="w-56">
                    <video src="'.$vid4.'" loop autoplay muted controls></video>
                </div>
                <div class="w-56">
                    <video src="'.$vid5.'" loop autoplay muted controls></video>
                </div>
                <div class="w-56">
                    <video src="'.$vid6.'" loop autoplay muted controls></video>
                </div>
                <div class="w-56">
                    <video src="'.$vid7.'" loop autoplay muted controls></video>
                </div>
                ';
            ?>
        </div>
    </div>
    <div class="bg-modal modal-5" id="modal-5">
        <div class="modal-content">
            <form method='POST' action='./gallery.php' enctype='multipart/form-data'>
                <input hidden name='sectionID' value='<?php echo $section2_ID ?>' />
                <input hidden name='vid_ID1' value='<?php echo $vid1_id ?>' />
                <input hidden name='vid_ID2' value='<?php echo $vid2_id ?>' />
                <input hidden name='vid_ID3' value='<?php echo $vid3_id ?>' />
                <input hidden name='vid_ID4' value='<?php echo $vid4_id ?>' />
                <input hidden name='vid_ID5' value='<?php echo $vid5_id ?>' />
                <input hidden name='vid_ID6' value='<?php echo $vid6_id ?>' />
                <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
                <div class="flex flex-col gap-4 p-10">
                    <div class="flex gap-2">
                        <label class="text-white custom-file-upload text-xs" for="section1title">Title</label>
                        <input type="text" id="section1title text-xs" name="section1title" value="<?php echo $contentssection[2]["title"]; ?>">
                    </div>
                    <div class="flex gap-2">
                        <label class="text-white custom-file-upload text-xs" for="section1description">Description</label>
                        <textarea id="section1description text-xs" name="section1description"><?php echo $contentssection[2]["description"]; ?></textarea>
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="text-center text-white custom-file-upload border border-white p-1 text-xs" for="vid1"><?php echo $vid2 ?></label>
                        <input type="file" class="inputfile text-white text-xs" id="vid2" name="file-vid1">
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="text-center text-white custom-file-upload border border-white p-1 text-xs" for="vid1"><?php echo $vid3 ?></label>
                        <input type="file" class="inputfile text-white text-xs" id="vid3" name="file-vid2">
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="text-center text-white custom-file-upload border border-white p-1 text-xs" for="vid1"><?php echo $vid4 ?></label>
                        <input type="file" class="inputfile text-white text-xs" id="vid4" name="file-vid3">
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="text-center text-white custom-file-upload border border-white p-1 text-xs" for="vid1"><?php echo $vid5 ?></label>
                        <input type="file" class="inputfile text-white text-xs" id="vid5" name="file-vid4">
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="text-center text-white custom-file-upload border border-white p-1 text-xs" for="vid1"><?php echo $vid6 ?></label>
                        <input type="file" class="inputfile text-white text-xs" id="vid6" name="file-vid5">
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="text-center text-white custom-file-upload border border-white p-1 text-xs" for="vid1"><?php echo $vid7 ?></label>
                        <input type="file" class="inputfile text-white text-xs" id="vid7" name="file-vid6">
                    </div>
                    <div class="">
                        <button type='submit' class="bg-white px-3 py-1">Submit</button>
                    </div>
                </div>
            </form>
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
