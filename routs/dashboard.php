<?php
    session_start();

    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color: red">Not Voted</b>';
    }
    else{
        $status = '<b style="color: green">Voted</b>';
    }

?>


<html>
    <head>
        <title>Online voting system dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">

    </head>
    <body>
        <style>
            #profile{
                background-color:white;
                width: 30%;
                padding: 20px;
                color: black;
                float: left;
            }
            #groups{
                background-color:white;
                width: 60%;
                padding: 20px;
                color: black;
                float: right;

            }
            #votebtn{
                margin-right: 20px;
                margin-top: 20px;
                padding: 5px;
                font-size: 15px;
                background-color: #3498db;
                color: white;
                border-radius: 5px;
            }
            #bodysec{
                padding: 10px;
            }
            #voted{
                margin-right: 20px;
                margin-top: 20px;
                padding: 5px;
                font-size: 15px;
                background-color: green;
                color: white;
                border-radius: 5px;
            }
        </style>
        <div id="mainsection">
            <center>
            <div id="headersection">
            <a href="../"> <button id="back"> Back</button></a>
            <a href="logout.php"><button id="logout">   Logout</button></a>

                <h1>ONLINE VOTING SYSTEM FOR COLLEGES AND UNIVERSITIES</h1>

                <hr>
            </div>

            </center>

            <div id="bodysec">
                <div id="profile">
                    <center><img src="../uploads/<?php echo $userdata['photo'] ?>" height="180" width="150"><br><br></center>
                    <b>Name : </b><?php echo $userdata['name'] ?><br><br>
                    <b>VoterID : </b><?php echo $userdata['voterID'] ?><br><br>
                    <b>CollegeID : </b><?php echo $userdata['clgID']?><br><br>
                    <b>Address : </b><?php echo $userdata['address'] ?><br><br>
                    <b>Status : </b><?php echo $status?><br><br>
                </div>
                <div id="groups">
                    <?php
                      if($_SESSION['groupsdata']){
                          for($i=0;$i<count($groupsdata);$i++){
                              ?>
                                <div>
                                   <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>"height="180" width="150">
                                   <b>Group Name : </b> <?php echo $groupsdata[$i]['name'] ?><br><br>
                                   <b>CollegeID : </b><?php echo $groupsdata[$i]['clgID']?><br><br>
                                   <b>Votes : </b> <?php echo $groupsdata[$i]['votes'] ?><br><br>
                                   <form action="../api/vote.php" method="post">
                                       <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                       <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                        <?php
                                        if($_SESSION['userdata']['status']==0)
                                        {
                                            ?>
                                                <input type="submit" name="votebtn" value="vote" id="votebtn">
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <button  disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                            <?php
                                        }

                                        ?>

                                      
                                   </form><br><br>
                                </div>
                                <hr>

                                <?php

                          }
                      }
                        

                    ?>
                </div>
            </div>

        </div>

    </body>
    
</html>