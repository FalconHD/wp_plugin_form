

<?php

require_once __DIR__ . '/../form.php';

$settings = new EasyForm();
$currentForm = $settings->getActiveFields();

if (isset($_POST['submit'])) {
    $settings->addMessage();
  }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Panel</title>
</head>



<body>
    <h1>EasyForm</h1>
    <form method="POST" action="">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
  <?php if ($currentForm->firstname) {?>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="firstname" name="firstname" class="form-control" />
        <label class="form-label" for="firstname">First name</label>
      </div>
    </div>
    <?php }?>
    <?php if ($currentForm->lastname) {?>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="lastname" name="lastname" class="form-control" />
        <label class="form-label" for="lastname">Last name</label>
      </div>
    </div>
  <?php }?>
  </div>
  <?php if ($currentForm->username) {?>
    <div class="form-outline mb-4">
     <input type="text" id="username" name="username" class="form-control" />
        <label class="form-label" for="username">User Name</label>
  </div>
<?php }?>
  <?php if ($currentForm->email) {?>
  <div class="form-outline mb-4">
    <input type="email" id="email" name="email" class="form-control" />
    <label class="form-label" for="email">Email</label>
  </div>
  <?php }?>
  <!-- Text input -->
  <?php if ($currentForm->subject) {?>
  <div class="form-outline mb-4">
    <input type="text" id="subject" name="subject" class="form-control" />
    <label class="form-label" for="subject">subject</label>
  </div>
  <?php }?>
  <?php if ($currentForm->message) {?>
  <div class="form-outline">
  <textarea class="form-control" name="message" id="textAreaExample" rows="4"></textarea>
  <label class="form-label" for="textAreaExample">Message</label>
</div>
<?php }?>

  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-primary btn-block mb-4 col-12">SEND</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>