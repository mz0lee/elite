<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="elite - backend project">
    <meta name="author" content="Zoltan Magyar - mzolee">

    <title>Elite</title>

    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        .item-params {
            text-align: right;
        }
        .input-group {
            margin-bottom: 10px;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Elite</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php echo $page=="home" ? 'class="active"' : '';?>><a href="?page=home">Home</a></li>
            <li <?php echo $page=="importXML"  ? 'class="active"' : '';?>><a href="?page=importXML">Import</a></li>
            <li <?php echo $page=="exportXML"  ? 'class="active"' : '';?>><a href="?page=exportXML">Export</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">