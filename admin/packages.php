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
$packagesection = get_packagesection($conn);

update_section_and_image_of_package($conn);

include_once('partials/header.php');
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../admin/css/gallery.css">
<script src="https://cdn.tailwindcss.com"></script>

<?php
if($user_type == 'admin'){
    echo '
        <div><button class="edit-btnWhite edit-open" data-modal="modal-1" name="edit-btn">Edit Content <i class="fa-regular fa-pen-to-square"></i></button></div>
    ';
}
?>

<section class="bg-white w-full h-full flex flex-col pb-24">
    <div class="flex flex-col gap-7 text-center">
        <div class="w-full h-96">
            <?php 
                $img0 = $packagesection[0]["packageimage"];
                $title0 = $packagesection[0]["packagetitle"];
                $desc0 = $packagesection[0]["packagedescription"];
                $id0 = $packagesection[0]["packageid"];
                

                echo '<img src="' . $img0 . '" alt="Home image" class="w-full h-96 object-cover">';
            ?>
        </div>
        <div class="px-40 flex flex-col gap-3">
            <h1 class="text-3xl">
            <?php echo $title0; ?>
            </h1>
            <h3 class="font-light">
            <?php echo $desc0; ?> 
            </h3>
        </div>
    </div>
    <form method='POST' action='./packages.php' enctype='multipart/form-data'>
        <input hidden name='sectionID' value='<?php echo $id0 ?>' />
        <div class="bg-modal modal-1" id="modal-1">
            <div class="modal-content">
                <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
                <div class="flex flex-col gap-4 bg-black py-10 px-60">
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1title">Title</label>
                        <textarea id="section1title" name="section1title"><?php echo $packagesection[0]["packagetitle"]; ?></textarea>
                    </div>
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1description">Description</label>
                        <textarea id="section1description" name="section1description"><?php echo $packagesection[0]["packagedescription"]; ?></textarea>
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

<section class="flex justify-center w-full h-full flex pb-24">
    <div class="flex justify-center">
        <div class="flex flex-row w-4/5 gap-5 pt-24">
            <div class="relative flex flex-col w-auto h-auto border-black border-2 rounded-lg text-center items-center p-5">
                <?php 
                    $img1 = $packagesection[1]["packageimage"];
                    $title1 = $packagesection[1]["packagetitle"];
                    $desc1 = $packagesection[1]["packagedescription"];
                    $id1 = $packagesection[1]["packageid"];
                    echo '<img src="' . $img1 . '" alt="Home image" class="w-1/5 mb-5">'; 
                ?>
                <h1 class="text-3xl mb-4">
                    <?php echo $title1; ?>
                </h1>
                <h3 class="font-light px-11">
                    <?php echo $desc1; ?>
                </h3>
                <a href="cafePackages.php" class="w-1/5 bg-white text-black border-black border-2 rounded p-3 mt-3 hover:bg-black hover:text-white">More</a>
                <?php
                if($user_type == 'admin'){
                    echo '
                    <button data-modal="modal-2" name="edit-btn" class="edit-open px-5 border-white border-2 absolute top-2 right-2 bg-black text-white rounded p-2 hover:bg-white hover:text-black hover:border-2 hover:border-black">Edit</button>
                    ';
                }
                ?>
            </div>

            <div class="relative flex flex-col w-auto h-auto border-black border-2 rounded-lg text-center items-center p-5">
                <?php 
                    $img2 = $packagesection[2]["packageimage"];
                    $title2 = $packagesection[2]["packagetitle"];
                    $desc2 = $packagesection[2]["packagedescription"];
                    $id2 = $packagesection[2]["packageid"];
                    echo '<img src="' . $img2 . '" alt="Home image" class="w-1/5 mb-5">'; 
                ?>
                <h1 class="text-3xl mb-4">
                    <?php echo $title2; ?>
                </h1>
                <h3 class="font-light px-11">
                    <?php echo $desc2; ?>
                </h3>
                <a href="cateringServices.php" class="w-1/5 bg-white text-black border-black border-2 rounded p-3 mt-3 hover:bg-black hover:text-white">More</a>
                <?php
                if($user_type == 'admin'){
                    echo '
                    <button data-modal="modal-3" name="edit-btn" class="edit-open px-5 border-white border-2 absolute top-2 right-2 bg-black text-white rounded p-2 hover:bg-white hover:text-black hover:border-2 hover:border-black">Edit</button>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<div class="">
    <form method='POST' action='./packages.php' enctype='multipart/form-data'>
        <input hidden name='sectionID' value='<?php echo $id1 ?>' />
        <div class="bg-modal modal-2" id="modal-2">
            <div class="modal-content">
                <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
                <div class="flex flex-col gap-4 bg-black py-10 px-60">
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1title">Title</label>
                        <textarea id="section2title" name="section1title"><?php echo $packagesection[1]["packagetitle"]; ?></textarea>
                    </div>
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1description">Description</label>
                        <textarea id="section2description" name="section1description"><?php echo $packagesection[1]["packagedescription"]; ?></textarea>
                    </div>
                    <div class="flex gap-4 flex-col">
                        <h1 class="text-white">Image displayed:</h1>
                        <label class="text-center text-white custom-file-upload border border-white p-1">
                            <?php echo $img1 ?>
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

    <form method='POST' action='./packages.php' enctype='multipart/form-data'>
        <input hidden name='sectionID' value='<?php echo $id2 ?>' />
        <div class="bg-modal modal-3" id="modal-3">
            <div class="modal-content">
                <div class="close"><i class="fa-solid fa-square-xmark" style="color: #ffffff;"></i></div>
                <div class="flex flex-col gap-4 bg-black py-10 px-60">
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1title">Title</label>
                        <textarea id="section3title" name="section1title"><?php echo $packagesection[2]["packagetitle"]; ?></textarea>
                    </div>
                    <div class="flex flex-col gap-4">
                        <label class="text-white custom-file-upload" for="section1description">Description</label>
                        <textarea id="section3description" name="section1description"><?php echo $packagesection[2]["packagedescription"]; ?></textarea>
                    </div>
                    <div class="flex gap-4 flex-col">
                        <h1 class="text-white">Image displayed:</h1>
                        <label class="text-center text-white custom-file-upload border border-white p-1">
                            <?php echo $img2 ?>
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
</div>

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
