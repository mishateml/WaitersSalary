<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">



    <?=$this->section('style')?>
</head>

<div class="mt-4">
    <?=$this->section('content')?>

</div>


    <?=$this->section('script')?>


<style>  body {
        background: linear-gradient(132deg, #ec5218, #1665c1);
        background-size: 400% 400%;
        animation: BackgroundGradient 30s ease infinite;
    }

    @keyframes BackgroundGradient {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }
    h1 {
        /*position: absolute;*/
        /*left: 50%;*/
        /*top: 50%;*/
        /*transform: translateX(-50%) translateY(-50%);*/
        font-family: Open Sans, sans-serif;
        color: #fff;
        font-weight: 400;
        text-transform: uppercase;
        text-align: center;
        font-size: 2em;
        background-color: #000;
        /*padding: 5px;*/
    }</style>
    <!-- Bootstrap core JavaScript -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    </body>
</html>