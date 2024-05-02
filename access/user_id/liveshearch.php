
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    /* Custom CSS for img-fluid */
.img-fluid {
    width: 100%; /* Ensures the image does not exceed the width of its parent container */
    height: 100px; /* Allows the image to maintain its aspect ratio */
    display: block; /* Ensures the image is displayed as a block element */
    margin-left: auto; /* Centers the image horizontally within its parent container */
    margin-right: auto; /* Centers the image horizontally within its parent container */
}

</style>
</head>
<body>

<div class="container mt-5">
  <h2>Search</h2>
  <a href="/access/user_id/index.php?user_id=<?php echo $_GET['user_id']; ?>">Return Home</a>
  <div class="form-group">
    <input type="text" class="form-control" id="search" placeholder="Search...">
  </div>
  <div id="result"></div>
</div>

<script>
$(document).ready(function(){
    $('#search').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            $.post("live.php?userid=<?php echo $_GET['user_id']; ?>", { query: query }, function(data){
                $('#result').html(data);
            });
        }
    });
});
</script>

</body>
</html>
