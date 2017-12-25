<body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header" style="width:100px;">
                    <a class="navbar-brand" href="#"></a>
                    <img src="../image/school3.png" style="width: 66%; height: 6%; padding-top: 3px;">
                </div>

                <ul class="nav navbar-nav">
                        <button class="btn btn-info navbar-btn" name="school" onclick="loadSchool();">School</button>
                    <?php if( $_SESSION["role"] === "owner"  || $_SESSION["role"] === "manager"){ ?> 
                        <button class='btn btn-primary navbar-btn' name='administration' onclick="loadAdmins();">Administration</button>;
                    <?php } ?>
                </ul>
                <form action="/api.php" method="post">
                    <ul class="nav navbar-nav navbar-right">
                        <img src=""></img>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'] . "  " . $_SESSION["role"] ?></a></li>
                        <button class="btn btn-danger navbar-btn" name="action" value="logout">Logout</button>   
                    </ul>
                </form>
            </div>
        </nav>
  
        <div class="container">
            <div class="row">
                <div id="menu-left" class="col-sm-3"></div>
                <div id="main-container" class="col-sm-9"></div>
            </div>
        </div>
        <script src="views/js/dashboard.js"></script>
        

    </body>
</html>