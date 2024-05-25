<?php 
  include_once './config/connect.php';
  $conn = get_connection();
  
  function get_content($conn, $categories){
    $placeholders = str_repeat('?,', count($categories) - 1) . '?';
    $query = "SELECT * FROM menucontent WHERE product_name IN ($placeholders)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, str_repeat('s', count($categories)), ...$categories);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $all_content = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_stmt_close($stmt);
        return $all_content;
    } else {
        return [];
    }
}

function get_items($conn, $items){
  $placeholders = str_repeat('?,', count($items) - 1) . '?';
  $query = "SELECT * FROM menuitems WHERE item_name IN ($placeholders)";

  if ($stmt = mysqli_prepare($conn, $query)) {
      mysqli_stmt_bind_param($stmt, str_repeat('s', count($items)), ...$items);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $all_content = mysqli_fetch_all($result, MYSQLI_ASSOC);
      mysqli_free_result($result);
      mysqli_stmt_close($stmt);
      return $all_content;
  } else {
      return [];
  }
}
// Specify categories for drinks and foods
$drink_categories = ['Espresso', 'Brew', 'Non Coffee And Tea', 'Matcha', 'Beverages'];
$food_categories = ['All Day Breakfast', 'Silog', 'Pasta', 'Block 69 Bargain Bites', 'Sides And Nibbles', 'Carbs And Caffeine'];
$espresso = ['Spanish Latte', 'White Choco Latte', 'Mocha Latte', 'Cinnamon Brown Latte', 'Caramel Vanilla Macchiato', 'Cafe Latte', 'Vanilla Cafe Latte', 'Hazelnut Cafe Latte', 'Salted Caramel Latte', 'Americano', 'Midnight Cherry', 'Espresso Cloud'];
$brew = ['Hot Brewed Coffee', 'Cold Brew', 'Iced Coffee'];
$brewsweetcream = ['Vanilla', 'Hazelnut', 'Caramel'];
$noncoffeeandtea = ['Hot Chocolate', 'Triple Chocolate', 'Pink Paradise', 'Tropical Cloud', 'Caramel Candy', 'Dark Berry', 'Vanilla McDreamy', 'Chamomile Tea', 'Purple Bloom', 'Lavender Tea', 'Pure Green Tea', 'English Breakfast Tea', 'Wild Berry', 'Hibiscus Tea', 'Strawberry & Mango'];
$matcha = ['Matcha Mango', 'Nutty Green Tea', 'Vanilla Kissed Matcha', 'Spicy Matcha', 'Tita Maggie\'s Matcha', 'Whiteout Matcha', 'Matcha Latte', 'Dirty Matcha', 'Green & Sweet', 'Ichigo Matcha'];
$beverages = ['Mango Juice', 'Cucumber Juice', 'Iced Tea', 'Coca-Cola Zero', 'Regular Coca-Cola', 'Pepsi'];
$alldaybreakfast = ['Poffertjes', 'Fluffy Pancakes', 'French Toast', 'Classic Waffles', 'Marga\'s Fave', 'Breakfast Platter'];
$silog = ['Chicksilog', 'Tapsilog', 'Tapsilog', 'Bacsilog', 'Carrot Rice', 'Plain Rice'];
$pasta = ['Chicken Pesto','Gourmet Tuyo','Aglio Olio','Garlic Bread'];
$block69bargainbites = ['Chicken Poppers', 'Chicken Teriyaki', 'Pork Teriyaki', 'Chicken Katsudon', 'Pork Katsudon'];
$sidesandnibbles = ['Fries', 'Fries Before Guys', 'Mozzarella Balls', 'Nachos Overload', 'Chicken Balls', 'Chicken Balls Mix', 'Calamari', 'Calamari Mix', 'Hashbrown'];
$carbsandcaffeine = ['Clubhouse Sandwich', 'Pain Au Chocolat', 'Butter Croissant', 'Croissanwich'];
$carbsandcaffeinecroffle = ['Plain', 'Strawberry Field', 'Mango Tango', 'Choco Truffle'];

// Handle content deletion
if (isset($_POST['delete_content_id'])) {
    $delete_content_id = mysqli_real_escape_string($conn, $_POST['delete_content_id']);
    $query = "DELETE FROM menucontent WHERE product_id = '$delete_content_id'";
    
    if (mysqli_query($conn, $query)) {
        echo '
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            window.location.reload();
        </script>
        ';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Handle content addition/editing
if (isset($_POST['submit'])) {
    // Fetch Data
    $content_id = mysqli_real_escape_string($conn, $_POST['content_id']);
    $content_name = mysqli_real_escape_string($conn, $_POST['content_title'.$content_id]);
    $content_subname = mysqli_real_escape_string($conn, $_POST['content_caption'.$content_id]);
    $content_image_name = 'content_image';
    $file_name = '';
    $folder = '';

    // Check if a new image is uploaded
    if (!empty($_FILES[$content_image_name]['name'])) {
        $file_name = $_FILES[$content_image_name]['name'];
        $temp_name = $_FILES[$content_image_name]['tmp_name'];
        $folder = './Images/' . $file_name;
        move_uploaded_file($temp_name, $folder);
    }

    // Check Content Existence
    $check_query = "SELECT * FROM menucontent WHERE product_id = '$content_id'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Update existing content
        if ($file_name) {
            // Update with new image
            $query = "UPDATE menucontent SET product_name = '$content_name', product_subname = '$content_subname', product_image = '$folder' WHERE product_id = '$content_id'";
        } else {
            // Update without new image
            $query = "UPDATE menucontent SET product_name = '$content_name', product_subname = '$content_subname', WHERE product_id = '$content_id'";
        }
    } else {
        // Insert new content
        $drink_categories[] = $content_name;
        if ($file_name) {
            $query = "INSERT INTO menucontent (product_id, product_name, product_subname, product_image) VALUES ('$content_id', '$content_name', '$content_subname', '$folder')";
        } else {
            $query = "INSERT INTO menucontent (product_id, product_name, product_subname) VALUES ('$content_id', '$content_name', '$content_subname')";
        }
    }

    if (mysqli_query($conn, $query)) {
        echo '
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
        ';
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

?>