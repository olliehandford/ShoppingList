<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping List</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.min.css">
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <input type="text" name="addItem" id="addItem" placeholder="Add an item to the list"/>
        <input type="submit" value="Add Item" id="submit">
        <p>Drag and drop items to reorder them on the list</p>
        <div class="labels">
            <div class="label">Shopping</div>
            <div class="label">Mark as Purchased</div>
        </div>
        <ul id="shoppingList">

        </ul>
    </div>
    <script src="/assets/scripts.js"></script>
</body>
</html>