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

include('partials/header.php'); 
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<section class="flex flex-col gap-10">
    <div class="bg-white text-center">
        <h1 class="text-3xl mb-1">
            Cafe Packages
        </h1>
        <h3 class="font-light">
            Please note that there is a corkage fee of PHP 500 for each item brought into the venue. VAT inclusive.
        </h3>
    </div>
    <div class="flex flex-col text-center gap-3">
        <div class="flex item-center justify-center">
            <table class="w-4/5">
                <thead>
                    <tr class="text-center">
                        <th colspan="4" class="border-black border-2 p-10 text-3xl font-normal text-center">CAFE BARKADA PACKAGE</th>
                    </tr>
                    <tr>
                        <th class='border-black border-2 p-10'>PAX</th>
                        <th class='border-black border-2 p-10'>RATE</th>
                        <th class='border-black border-2 p-10'>INCLUSION</th>
                        <?php 
                        if($user_type == 'admin'){
                            echo "<th class='border-black border-2 p-10'>EDIT CONTENT</th>";
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
                            echo "<td contenteditable='true' class='editable border-black border-2 p-8' data-id='".$row['id']."' data-field='pax'>".$row['pax']."</td>";
                            echo "<td contenteditable='true' class='editable border-black border-2 p-8' data-id='".$row['id']."' data-field='rate'>".$row['rate']."</td>";
                            echo "<td contenteditable='true' class='editable border-black border-2 p-8' data-id='".$row['id']."' data-field='inclusion'>".$row['inclusion']."</td>";
                            if($user_type == 'admin'){
                                echo "<td class='border-black border-2 p-8'><button class='savePackage bg-black text-white px-8 py-3 rounded-lg' data-id='".$row['id']."'>Save</button></td>";
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
    <div class="flex gap-10 flex-col">
        <?php foreach ($cafepackagecontent as $index => $content) { ?>
            <div class="flex flex-row justify-center items-center gap-10">
                <?php if ($index % 2 == 0) { ?>
                    <div class="w-2/5 flex flex-col justify-center items-center">
                        <h1 contenteditable='true' class="editable text-center text-3xl font-normal m-3" data-id="<?php echo $content['id']; ?>" data-field='title'>
                            <?php echo $content['title']; ?>
                        </h1>
                        <h3 contenteditable='true' class="editable text-justify" data-id="<?php echo $content['id']; ?>" data-field='description'>
                            <?php echo $content['description']; ?>
                        </h3>
                        <?php 
                        if($user_type == 'admin'){
                            echo "<button class='saveContent bg-black text-white px-8 py-3 rounded-lg' data-id='".$content['id']."'>Save</button>";
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
                                    <td contenteditable='true' class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="pax"><?php echo $cafepackagepaxandprice[$i]["pax"]; ?></td>
                                    <td contenteditable='true' class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="rate"><?php echo $cafepackagepaxandprice[$i]["rate"]; ?></td>
                                </tr>
                                <?php if ($user_type == 'admin' && $i % 5 == 4) { ?>
                                    <div class="">
                                        <td colspan="2" class="border-black border-2 p-8">
                                            <div class="flex justify-center items-center">
                                                <button class='savePaxAndRate bg-black text-white px-8 py-3 rounded-lg' data-id='<?php echo $cafepackagepaxandprice[$i]["id"]; ?>'>Save</button>
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
                                    <td contenteditable='true' class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="pax"><?php echo $cafepackagepaxandprice[$i]["pax"]; ?></td>
                                    <td contenteditable='true' class='editable border-black border-2 px-8 py-5' data-id="<?php echo $cafepackagepaxandprice[$i]['id']; ?>" data-field="rate"><?php echo $cafepackagepaxandprice[$i]["rate"]; ?></td>
                                </tr>
                                <?php if ($user_type == 'admin' && $i % 5 == 4) { ?>
                                    <div class="">
                                        <td colspan="2" class="border-black border-2 p-8">
                                            <div class="flex justify-center items-center">
                                                <button class='savePaxAndRate bg-black text-white px-8 py-3 rounded-lg' data-id='<?php echo $cafepackagepaxandprice[$i]["id"]; ?>'>Save</button>
                                            </div>
                                        </td>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="w-2/5 flex flex-col justify-center items-center">
                        <h1 contenteditable='true' class="editable text-center text-3xl font-normal m-3" data-id="<?php echo $content['id']; ?>" data-field='title'>
                            <?php echo $content['title']; ?>
                        </h1>
                        <h3 contenteditable='true' class="editable text-justify" data-id="<?php echo $content['id']; ?>" data-field='description'>
                            <?php echo $content['description']; ?>
                        </h3>
                        <?php 
                        if($user_type == 'admin'){
                            echo "<button class='saveContent bg-black text-white px-8 py-3 rounded-lg' data-id='".$content['id']."'>Save</button>";
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php include('partials/footer.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['field']) && isset($_POST['value'])) {
        $id = $_POST['id'];
        $field = $_POST['field'];
        $value = $_POST['value'];
        $type = $_POST['type'];

        if ($type == 'package') {
            $sql = "UPDATE cafebarkadapackage SET $field='$value' WHERE id=$id";
        } elseif ($type == 'content') {
            $sql = "UPDATE cafepackagescontents SET $field='$value' WHERE id=$id";
        } elseif ($type == 'paxrate') {
            $sql = "UPDATE cafepackagepaxandprice SET $field='$value' WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    exit();
}
?>

<script>
    document.querySelectorAll('.savePackage').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const pax = document.querySelector(`[data-id='${id}'][data-field='pax']`).innerText;
            const rate = document.querySelector(`[data-id='${id}'][data-field='rate']`).innerText;
            const inclusion = document.querySelector(`[data-id='${id}'][data-field='inclusion']`).innerText;

            updatePackage(id, 'pax', pax);
            updatePackage(id, 'rate', rate);
            updatePackage(id, 'inclusion', inclusion);
        });
    });

    document.querySelectorAll('.saveContent').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const title = document.querySelector(`[data-id='${id}'][data-field='title']`).innerText;
            const description = document.querySelector(`[data-id='${id}'][data-field='description']`).innerText;

            updateContent(id, 'title', title);
            updateContent(id, 'description', description);
        });
    });

    document.querySelectorAll('.savePaxAndRate').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            const pax = document.querySelector(`[data-id='${id}'][data-field='pax']`).innerText;
            const rate = document.querySelector(`[data-id='${id}'][data-field='rate']`).innerText;

            updatePaxAndRate(id, 'pax', pax);
            updatePaxAndRate(id, 'rate', rate);
        });
    });

    function updatePackage(id, field, value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", window.location.href, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Package updated successfully');
            }
        };
        xhr.send("id=" + id + "&field=" + field + "&value=" + value + "&type=package");
    }

    function updateContent(id, field, value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", window.location.href, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Content updated successfully');
            }
        };
        xhr.send("id=" + id + "&field=" + field + "&value=" + value + "&type=content");
    }

    function updatePaxAndRate(id, field, value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", window.location.href, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Pax and Rate updated successfully');
            }
        };
        xhr.send("id=" + id + "&field=" + field + "&value=" + value + "&type=paxrate");
    }
</script>
