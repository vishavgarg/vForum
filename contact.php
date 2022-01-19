<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vDiscuss - Coding Forum</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <?php include "partials/_header.php"; ?>
  <div class="container my-5">
    <h1 class="text-center">Contact Us</h1>
    <form class="row g-3 my-3 border rounded p-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email Id">
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Address">
          </div>
        <div class="col-12">
        <label for="desc" class="form-label">Comment</label>
        <textarea class="form-control" id="desc" rows="3" placeholder="Comment"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>



    <?php include "partials/_footer.php";?>
    <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>