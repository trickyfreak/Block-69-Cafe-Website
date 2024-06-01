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
$cateringservicestable = get_cateringservicestable($conn);
$cateringservicescontent = get_cateringservicescontent($conn);
$packagecontactcontent = get_packagecontactcontent($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_row'])) {
    $id = $_POST['id'];
    $pax = $_POST['pax'];
    $cps = $_POST['cps'];
    $ct = $_POST['ct'];
    $ck = $_POST['ck'];
    $pt = $_POST['pt'];
    $pk = $_POST['pk'];
    $silog = $_POST['silog'];
    $pasta = $_POST['pasta'];

    $query = "UPDATE cateringservicestable SET pax='$pax', cps='$cps', ct='$ct', ck='$ck', pt='$pt', pk='$pk', silog='$silog', pasta='$pasta' WHERE id='$id'";
    mysqli_query($conn, $query);
    exit;
}

if (isset($_POST['update_title_description'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE cateringservicescontent SET title='$title', description='$description' WHERE id='$id'";
    mysqli_query($conn, $query);
    exit;
}

include_once('partials/header.php');
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<section class="flex flex-col gap-16 items-center">
    <div class="flex flex-col gap-3 text-center items-center" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>>
        <h1 class="text-3xl font-bold">
            <?php echo $cateringservicescontent[0]["title"]; ?>
        </h1>
        <h3 class="font-light">
            <?php echo $cateringservicescontent[0]["description"]; ?>
        </h3>
        <?php if ($user_type == 'admin') { ?>
            <button class="saveTitleDescription bg-black text-white px-4 py-2 rounded-lg">Save Title & Description</button>
        <?php } ?>
    </div>
    <div class="flex flex-col justify-center items-center">
        <table class="w-4/5 text-center">
            <thead>
                <tr>
                    <th class="border-black border-2 p-5"><h1>Pax</h1></th>
                    <th class="border-black border-2 p-5"><h1>Chicken Poppers savor + Bottled water</h1></th>
                    <th class="border-black border-2 p-5"><h1>Chicken Teriyaki + Bottled water</h1></th>
                    <th class="border-black border-2 p-5"><h1>Chicken Katsudon + Bottled water</h1></th>
                    <th class="border-black border-2 p-5"><h1>Pork Teriyaki + Bottled water</h1></th>
                    <th class="border-black border-2 p-5"><h1>Pork Katsudon + Bottled water</h1></th>
                    <th class="border-black border-2 p-5"><h1>Silog + Bottled water</h1></th>
                    <th class="border-black border-2 p-5"><h1>Pasta + Garlic Bread + Bottled water</h1></th>
                    <?php if ($user_type == 'admin') { ?>
                        <th class="border-black border-2 p-5">Edit Content</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cateringservicestable as $row) { ?>
                    <tr data-id="<?php echo $row['id']; ?>">
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["pax"]; ?></td>
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["cps"]; ?></td>
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["ct"]; ?></td>
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["ck"]; ?></td>
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["pt"]; ?></td>
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["pk"]; ?></td>
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["silog"]; ?></td>
                        <td class="border-black border-2 p-5" <?php if ($user_type == 'admin') echo 'contenteditable="true"'; ?>><?php echo $row["pasta"]; ?></td>
                        <?php if ($user_type == 'admin') { ?>
                            <td class="border-black border-2 p-5">
                                <button class="saveRow bg-black text-white px-4 py-2 rounded-lg">Save</button>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- new added part -->
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
<?php include('partials/footer.php'); ?>

<?php if ($user_type == 'admin') { ?>
<script>
document.querySelectorAll('.saveRow').forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const id = row.getAttribute('data-id');
        const pax = row.cells[0].innerText;
        const cps = row.cells[1].innerText;
        const ct = row.cells[2].innerText;
        const ck = row.cells[3].innerText;
        const pt = row.cells[4].innerText;
        const pk = row.cells[5].innerText;
        const silog = row.cells[6].innerText;
        const pasta = row.cells[7].innerText;

        const data = new FormData();
        data.append('update_row', true);
        data.append('id', id);
        data.append('pax', pax);
        data.append('cps', cps);
        data.append('ct', ct);
        data.append('ck', ck);
        data.append('pt', pt);
        data.append('pk', pk);
        data.append('silog', silog);
        data.append('pasta', pasta);

        fetch('', {
            method: 'POST',
            body: data
        });
    });
});
document.querySelector('.saveTitleDescription').addEventListener('click', function() {
    const title = document.querySelector('.text-3xl').innerText;
    const description = document.querySelector('.font-light').innerText;
    const id = <?php echo $cateringservicescontent[0]["id"]; ?>;

    const data = new FormData();
    data.append('update_title_description', true);
    data.append('id', id);
    data.append('title', title);
    data.append('description', description);

    fetch('', {
        method: 'POST',
        body: data
    });
});
</script>
<?php } ?>
