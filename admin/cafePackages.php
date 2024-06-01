<?php
include_once './config/connect.php';
include_once './config/functions.php';
include_once './config/content-manage.php';

session_start();
$conn = get_connection();
$user_data = check_login($conn);
$user_type = check_usertype($conn);

$cafepackagecontent = get_cafepackagecontent($conn);
$cafepackagepaxandprice = get_cafepackagepaxandprice($conn);
$cafepackageshomecontent = get_cafepackageshomecontent($conn);
$packagecontactcontent = get_packagecontactcontent($conn);

$editable = ($user_type == 'admin') ? "contenteditable='true'" : "";
include('partials/header.php');
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<section class="flex flex-col gap-10">
    <div class="flex flex-col items-center bg-white text-center gap-2">
        <h1 class="text-3xl mb-1 my-14 font-bold editable" <?php echo $editable; ?> data-id="<?php echo $cafepackageshomecontent[0]['id']; ?>" data-field="title">
            <?php echo $cafepackageshomecontent[0]["title"]; ?>
        </h1>
        <h3 class="font-light editable" <?php echo $editable; ?> data-id="<?php echo $cafepackageshomecontent[0]['id']; ?>" data-field="description">
            <?php echo $cafepackageshomecontent[0]["description"]; ?>
        </h3>
        <?php if ($user_type == 'admin') { ?>
            <button class="saveHomeContent bg-black text-white px-4 py-2 rounded-lg m-5" data-id="<?php echo $cafepackageshomecontent[0]['id']; ?>">Save</button>
        <?php } ?>
    </div>
    <div class="flex flex-col gap-20">
        <div class="flex flex-col text-center gap-3">
            <div class="flex item-center justify-center">
                <div class="border-black  rounded-lg w-3/4 mx-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-center">
                                <th colspan="4" class="border-black border-2 p-6 text-center font-normal">
                                    <div class="text-3xl editable" <?php echo $editable; ?> data-id="<?php echo $cafepackageshomecontent[1]['id']; ?>" data-field="title">
                                        <?php echo $cafepackageshomecontent[1]["title"]; ?>
                                    </div>
                                    <?php if ($user_type == 'admin') { ?>
                                    <div class="mt-2">
                                        <button class="saveHomeContent bg-black text-white px-4 py-2 rounded-lg m-3" data-id="<?php echo $cafepackageshomecontent[1]['id']; ?>">Save</button>
                                    </div>
                                    <?php } ?>
                                </th>
                            </tr>
                            <tr>
                                <th class='border-black border-2 p-6'>PAX</th>
                                <th class='border-black border-2 p-6'>RATE</th>
                                <th class='border-black border-2 p-6'>INCLUSION</th>
                                <?php 
                                if($user_type == 'admin'){
                                    echo "<th class='border-black border-2 p-6'>EDIT CONTENT</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM cafebarkadapackage";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td $editable class='editable border-black border-2 p-8' data-id='".$row['id']."' data-field='pax'>".$row['pax']."</td>";
                                    echo "<td $editable class='editable border-black border-2 p-8' data-id='".$row['id']."' data-field='rate'>".$row['rate']."</td>";
                                    echo "<td $editable class='editable border-black border-2 p-8 text-left' data-id='".$row['id']."' data-field='inclusion'>".$row['inclusion']."</td>";
                                    if($user_type == 'admin'){
                                        echo "<td class='border-black border-2 p-8'><button class='savePackage bg-black text-white px-4 py-2 rounded-lg' data-id='".$row['id']."'>Save</button></td>";
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex gap-20 flex-col">
            <?php foreach ($cafepackagecontent as $index => $content) { ?>
                <div class="flex items-center justify-center">
                    <div class="flex flex-row justify-center items-center gap-16 border-black border-2 rounded-lg p-10 w-3/4">
                        <?php if ($index % 2 == 0) { ?>
                            <div class="w-2/5 flex flex-col justify-center gap-3">
                                <h1 <?php echo $editable; ?> class="editable text-left font-bold text-3xl " data-id="<?php echo $content['id']; ?>" data-field='title'>
                                    <?php echo $content['title']; ?>
                                </h1>
                                <h3 <?php echo $editable; ?> class="editable text-justify" data-id="<?php echo $content['id']; ?>" data-field='description'>
                                    <?php echo $content['description']; ?>
                                </h3>
                                <?php 
                                if($user_type == 'admin'){
                                    echo "<button class='saveContent bg-black text-white px-4 py-2 rounded-lg m-5' data-id='".$content['id']."'>Save</button>";
                                }
                                ?>
                            </div>
                            <div class="">
                                <table>
                                    <tr>
                                        <th class="border-black border-2 px-8 py-5">PAX</th>
                                        <th class="border-black border-2 px-8 py-5">RATE</th>
                                    </tr>
                                    <?php for ($i = $index * 5; $i < ($index + 1) * 5 && isset($cafepackagepaxandprice[$i]); $i++) { ?>
                                        <tr>
                                            <td <?php echo $editable; ?> class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="pax"><?php echo $cafepackagepaxandprice[$i]["pax"]; ?></td>
                                            <td <?php echo $editable; ?> class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="rate"><?php echo $cafepackagepaxandprice[$i]["rate"]; ?></td>
                                        </tr>
                                        <?php if ($user_type == 'admin' && $i % 5 == 4) { ?>
                                            <div class="">
                                                <td colspan="2" class="border-black border-2 p-8">
                                                    <div class="flex justify-center items-center">
                                                        <button class='savePaxAndRate bg-black text-white px-4 py-2 rounded-lg ' data-id='<?php echo $cafepackagepaxandprice[$i]["id"]; ?>'>Save</button>
                                                    </div>
                                                </td>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="">
                                <table>
                                    <tr>
                                        <th class="border-black border-2 px-8 py-5">PAX</th>
                                        <th class="border-black border-2 px-8 py-5">RATE</th>
                                    </tr>
                                    <?php for ($i = $index * 5; $i < ($index + 1) * 5 && isset($cafepackagepaxandprice[$i]); $i++) { ?>
                                        <tr>
                                            <td <?php echo $editable; ?> class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="pax"><?php echo $cafepackagepaxandprice[$i]["pax"]; ?></td>
                                            <td <?php echo $editable; ?> class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="rate"><?php echo $cafepackagepaxandprice[$i]["rate"]; ?></td>
                                        </tr>
                                        <?php if ($user_type == 'admin' && $i % 5 == 4) { ?>
                                            <div class="">
                                                <td colspan="2" class="border-black border-2 p-8">
                                                    <div class="flex justify-center items-center">
                                                        <button class='savePaxAndRate bg-black text-white px-4 py-2 rounded-lg ' data-id='<?php echo $cafepackagepaxandprice[$i]["id"]; ?>'>Save</button>
                                                    </div>
                                                </td>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </table>
                            </div>
                            <div class="w-2/5 flex flex-col justify-center gap-3">
                                <h1 <?php echo $editable; ?> class="editable text-left font-bold text-3xl" data-id="<?php echo $content['id']; ?>" data-field='title'>
                                    <?php echo $content['title']; ?>
                                </h1>
                                <h3 <?php echo $editable; ?> class="editable text-justify" data-id="<?php echo $content['id']; ?>" data-field='description'>
                                    <?php echo $content['description']; ?>
                                </h3>
                                <?php 
                                if($user_type == 'admin'){
                                    echo "<button class='saveContent bg-black text-white px-4 py-2 rounded-lg m-5' data-id='".$content['id']."'>Save</button>";
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="flex flex-col justify-center items-center">
        <div class="flex items-center justify-center">
            <h1 class="text-4xl font-bold">
                <?php echo $packagecontactcontent[3]["title"]; ?>
            </h1>
        </div>
        <div class="flex flex-row justify-center items-center gap-1 w-2/4">
            <div class="flex flex-col justify-center items-center p-8">
                <?php 
                $img1 = $packagecontactcontent[0]["img"];
                $title1 = $packagecontactcontent[0]["title"];
                $desc1 = $packagecontactcontent[0]["description"];
                ?>
                <div class="flex flex-row justify-center items-center">
                    <img src="<?php echo $img1?>" alt="" class="w-2/5 mb-5">
                </div>
                <div class="">
                    <h1 class="text-3xl font-bold text-center">
                        <?php echo $title1 ?>
                    </h1>
                </div>
                <div class="">
                    <h3 class="text-center">
                        <?php echo $desc1 ?>
                    </h3>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center p-8">
                <?php 
                $img2 = $packagecontactcontent[1]["img"];
                $title2 = $packagecontactcontent[1]["title"];
                $desc2 = $packagecontactcontent[1]["description"];
                ?>
                <div class="flex flex-row justify-center items-center">
                    <img src="<?php echo $img2?>" alt="" class="w-2/5 mb-5">
                </div>
                <div class="">
                    <h1 class="text-3xl font-bold text-center">
                        <?php echo $title2 ?>
                    </h1>
                </div>
                <div class="">
                    <h3 class=" text-center">
                        <?php echo $desc2 ?>
                    </h3>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center p-8">
                <?php 
                $img3 = $packagecontactcontent[2]["img"];
                $title3 = $packagecontactcontent[2]["title"];
                $desc3 = $packagecontactcontent[2]["description"];
                ?>
                <div class="flex flex-row justify-center items-center">
                    <img src="<?php echo $img3 ?>" alt="" class="w-2/5 mb-5">
                </div>
                <div class="">
                    <h1 class="text-3xl font-bold text-center">
                        <?php echo $title3 ?>
                    </h1>
                </div>
                <div class="">
                    <h3 class=" text-center">
                        <?php echo $desc3 ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/jQuery.js"></script>
<script>
$(document).ready(function(){
    function ajaxCall(url, method, data) {
        return $.ajax({
            url: url,
            method: method,
            data: data
        });
    }

    function showAlert(message) {
        alert(message);
    }

    function saveEditableContent(selector, url, dataKey) {
        $(document).on('click', selector, function() {
            var id = $(this).data('id');
            var value = $("[data-id='" + id + "']").text();
            var data = {
                id: id
            };
            data[dataKey] = value;
            ajaxCall(url, 'POST', data)
            .done(function(data) {
                showAlert('Changes saved!');
            });
        });
    }

    saveEditableContent('.saveHomeContent', './config/content-manage.php', 'value');
    saveEditableContent('.saveContent', './config/content-manage.php', 'value');
    saveEditableContent('.savePackage', './config/content-manage.php', 'value');
    saveEditableContent('.savePaxAndRate', './config/content-manage.php', 'value');
});
</script>

<?php include('partials/footer.php'); ?>
