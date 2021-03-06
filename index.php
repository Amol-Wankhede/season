<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <title>Jumbotron Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="jumbotron.css" rel="stylesheet">
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
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
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                    </div><!--/.navbar-collapse -->
                </div>
            </nav>
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                    <h1>Hello, world!</h1>
                    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more .</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
                </div>
            </div>
            <div class="container">
                <!-- Example row of columns -->
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        // include 'connect.inc.php';
                        // $sql = "SELECT * FROM season_city";
                        // $stmt = $pdo->prepare($sql);
                        //  $stmt->execute();
                        // var_dump($result);
                        ?>
                        <?php
                        include 'connect.inc.php';
                        try {
                            $sql = "SELECT * FROM season_activity where cityId is NULL LIMIT 10";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                        } catch(PDOException $e) {
                            echo "<div class='alert alert-error'> ";
                                echo "ERROR FETCHING DATABASE: " . $e->getMessage();
                            echo "</div> ";
                            exit();
                        }
                        $results = $stmt->fetchAll();
                        // var_dump($results);
                        ?>
                        <form method="POST" action="process.php">
                            <table class="table">
                                <?php

                                foreach ($results as $row) {

                                echo "<tr>";
                                    echo "<td><input type='checkbox' name='id[]' value='$row[activityId]' checked> $row[activityName]  <strong>$row[price]</strong></td>";
                                    echo "<td>  </td>";
                                echo "</tr>";
                                }
                                ?>
                            </table>
                            <select name="city">
                                <?php
                                $sql1 = "SELECT * FROM season_city ";
                                $stmt1 = $pdo->prepare($sql1);
                                $stmt1->execute();
                                $results1 = $stmt1->fetchAll();
                                $count = 0;
                                foreach ($results1 as $row) {
                                    if($count == 13) {
                                        echo "<option value='$row[cityId]'>$row[cityName]</option>"; 
                                    } 
                                    $count++;
                                }
                                ?>
                                </select>
                            <input type="submit"></input>
                        </form>
                        
                    </div>
                </div>
                <hr>
                <footer>
                    <p>&copy; 2015 Company, Inc.</p>
                </footer>
                </div> <!-- /container -->
                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
            </body>
        </html>