

<?php

require_once __DIR__ . '/../form.php';

$settings = new EasyForm();

if (isset($_POST['update_Settings'])) {
    $settings->updateSettings();
}
$inbox = $settings->getMessages();

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
    <title>Panel</title>
</head>

<style>
    .label_inputs {
    color : black;
}

#formContainer{
    width:100%;
    display:flex;
    flex-direction : column;
    justify-content: center;
    align-items: center;
}
#formContainer ul{
    width:100%;
    display:flex;
    flex-direction : row;
    justify-content: center;
    align-items: center;
}
#formContainer ul .nav-link{
    border-radius: 0;
    margin : 0;
}
#formContainer ul .nav-link.active{

    background-color: rgb(86, 121, 86);
}

.all {
    display: flex;
    flex-direction : column;
    align-items : flex-start;
    justify-content:space-between;
}

.all label {
    width: 300px;
    margin: 20px;
}

.myColor {
    background-color : green;
    color : white;
}

.cont {
    display:flex;
    justify-content : center;
    align-items:center;
}

.cont2 {
    display:flex;
    flex-direction:column;
    justify-content : center;
    align-items:center;
}


.cont2 .card{
    width:500px;
}






</style>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>




<body>
   <section id="formContainer">
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a
                class="nav-link active"
                id="tab-login"
                data-mdb-toggle="pill"
                href="#pills-Setting"
                role="tab"
                aria-controls="pills-login"
                aria-selected="true"
                >SETTING</a
                >
            </li>
            <li class="nav-item" role="presentation">
                <a
                class="nav-link"
                id="tab-register"
                data-mdb-toggle="pill"
                href="#pills-inbox"
                role="tab"
                aria-controls="pills-register"
                aria-selected="false"
                >INBOX<span class="badge bg-danger ms-2"><?php print_r(count($inbox));?></span></a
                >
            </li>
        </ul>

        <div class="tab-content col-10">
            <div
                class="tab-pane fade show active"
                id="pills-Setting"
                role="tabpanel"
                aria-labelledby="tab-login"
            >
            <form action="" method="POST">
            <div class="cont">
                <div class="card">
                <div class="card-body">
                <div class="all">
                        <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off" name="username" />
                        <label class="btn btn-primary myColor" for="btn-check">USERNAME</label>

                        <input type="checkbox" class="btn-check" id="btn-check2" autocomplete="off" name="firstname" />
                        <label class="btn btn-primary myColor" for="btn-check2">FIRST NAME</label>

                        <input type="checkbox" class="btn-check" id="btn-check3" autocomplete="off" name="lastname" />
                        <label class="btn btn-primary myColor" for="btn-check3">LAST NAME</label>

                        <input type="checkbox" class="btn-check" id="btn-check4" autocomplete="off" name="email" />
                        <label class="btn btn-primary myColor" for="btn-check4">EMAIL</label>

                        <input type="checkbox" class="btn-check" id="btn-check5" autocomplete="off" name="subject" />
                        <label class="btn btn-primary myColor" for="btn-check5">SUBJECT</label>

                        <input type="checkbox" class="btn-check" id="btn-check6" autocomplete="off" name="message" />
                        <label class="btn btn-primary myColor" for="btn-check6">MESSAGE</label>
                </div>
                </div>

                <button type="submit" name="update_Settings" class="btn btn-secondary">UPDATE SETTINGS</button>
                </form>
                </div>
                </div>


            </div>
        <div
            class="tab-pane fade"
            id="pills-inbox"
            role="tabpanel"
            aria-labelledby="tab-register"
        >
        <div class="cont2">
        <?php foreach ($inbox as $message): ?>
            <div class="card">
            <div class="card-body">
                    <h5 class="card-title"><?=$message->subject?></h5>
            <?php foreach ($message as $key => $value): ?>
                <?php if($value) : ?>
                    <p class="card-text">
                        <?=$key?> : <?=$value?>
                    </p>
                <?php endif; ?>
                
            <?php endforeach;?>
                </div>
                <button type="button" class="btn btn-primary">replay</button>
                </div>

        <?php endforeach;?>

        </div>
        </div>
        </div>

   </section>

</body>
</html>
