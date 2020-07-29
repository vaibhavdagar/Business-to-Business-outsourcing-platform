
<head>
<title>Vyaapaar</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<style>



  /* Sidebar (Left Menu) */


#sidebar-wrapper{
    z-index: 1;
    position: fixed;
    width:0;
    height:100%; 
    overflow-y: hidden;
    background: #2b2d2f;
    transition: 0.09s;
  }

  /* Main content (Inside) */

#page-content-wrapper{
    min-width:100%;
    max-width:100%;
    position: absolute;
    padding: 15px;
    transition: 0.09s;

  }

  /* Change the width of the sidebar to display it */

#wrapper.menuDisplayed #sidebar-wrapper {
    width:250px;
    opacity:100%;
    
  }

  /* Push main content to right by left padding */
#wrapper.menuDisplayed #page-content-wrapper{
    padding-left:250px;
   
  }

#wrapper.menuDisplayed .toggle-btn{
  margin-left:-25px;
  
}

/* Box radius margin fix */
#wrapper.menuDisplayed #box1{
  margin-left:15px;
  
}
#wrapper.menuDisplayed #box2{
  margin-left:15px;
  
}
#wrapper.menuDisplayed #box3{
  margin-left:15px;
  
}


/* Box radius margin fix */


  /* Sidebar Styling */

.sidebar-nav{
    padding: 0;
    list-style: none;

  }

.sidebar-nav li{
    text-indent:20px;
    line-height:20px;
  }

.sidebar-nav li a{
    display: block;
    text-decoration: none;
    color: #fff;
    padding-left:15px;
    margin-top: 25px;
    margin-bottom: 25px;
    border-radius: 15px;
    margin-right:15px;
    margin-left:15px;
  }
.sidebar-nav li a:hover{
  background: #70b5ff; /* #005cbf; */
}

.sidebar-title{
  padding-top:15px;
  align:center;
  padding-bottom:15px;
}

.sidebar-title li a:hover{
background: none;
}

strong {
  color: #fff;
  display:block;
  border-radius: 10px 10px 0px 10px;
}


.toggle-btn{
  color:#fff;
  background:#2b2d2f;
  margin-left:-35px;
  padding-right:15px;
  border-radius: 0px 10px 10px 0px;
  margin-top:95px;
 
}
  
  
}


#nav-icon-profile{
  padding-left:62px;
  padding-top:15px;
}

#nav-icon-settings{
  padding-left:45px;
  padding-top:15px;
}

#nav-icon-logout{
  padding-left:55px;
  padding-top:15px;
}

#nav-icon-home{
  padding-left:62px;
  padding-top:15px;
}

.navbar-dark{
  background:#2b2d2f;
  color:#2b2d2f;
}
/* Converting box to outer radius of menu-toggler */


#box1{
  content: "";
  position: absolute;
  background-color: transparent;
  bottom: -70px;
  height: 70px;
  left:-15px;
  width: 35px;
  border-top-left-radius: 25px;
  box-shadow: 0 -35px 0 0 #2b2d2f; /* inverted border radius */
  z-index:-1;
  transition: 0.5s;
}

#box2{
  content: "";
  position: absolute;
  background-color: transparent;
  bottom: 45px;
  height: 70px;
  left:-15px;
  width: 35px;
  border-top-left-radius: 25px;
  box-shadow: 0 -35px 0 0px #2b2d2f; /* inverted border radius */
  z-index:-1;
  -moz-transform: scale(1, -1);
    -o-transform: scale(1, -1);
    -webkit-transform: scale(1, -1);
    transform: scale(1, -1); /* flip box1 contents */
    transition: 0.5s;
}


}

/* Converting box to outer radius of menu-toggler */

/* logo */

.sidebar-logo{
  
}

/* logo */

.line{
  background:#fff;
 
}
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
	color: white;
}

</style>


<nav class="navbar fixed-top navbar-dark">
    <a id="menu-toggle" class="navbar-brand" style="color:#fff;"><span class="icon-bars"></span></a>
  <a  href="dashboard.php"><img src="darklogo.png" height="65px" width="135px"></a>
  <a href="logout.php"><img src="https://img.icons8.com/nolan/30/exit.png"/></a>

</nav>



<div id="wrapper">

<!-- Sidebar -->
  <div id="sidebar-wrapper">
    
      <ul class="sidebar-nav">
        <br><br><br>
        <li><a href="dashboard.php">Dashboard</a></li>
        <hr class="line">
        <li><a href="my-projects.php">My Projects</a></li>
        <hr class="line">
        <li><a href="awarded_projects.php">Awarded Projects</a></li>
        <hr class="line">
        <li><a href="bid-project.php">Bid On Projects</a></li>
        <hr class="line">
        <li><a href="make-project.php">Post A Project</a></li>
        <hr class="line">
        <li><a href="edit-profile.php">My Profile</a></li>
        
      </ul> 
   </div>

   <!-- Main content -->
   <div id="page-content-wrapper">
    <div class="container-fluid">


      </div>
    </div>
 
 <!-- page div -->
<br><br><br><br><br>

<!-- Menu toggle script -->

<script>
  $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("menuDisplayed");
  });
  
  
</script>