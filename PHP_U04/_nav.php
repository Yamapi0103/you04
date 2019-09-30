<style>
/* Global Styling */
body, header, nav, main {
  margin: 0;
  padding: 0;
  font-family:"微軟正黑體";
  font-weight:600;
}

body {
  background: #444;
  font-family: "Helvetica", sans-sarif;
  font-size: 16px;
  color: #fcfff5;
}

header {
  text-align: left;
  height: 45px;
}

header h3{
  margin:15px 50px;
  line-height: 30px;
}


main {
  position: relative;
  height: 1500px;
  text-align: center;
  margin-top: 150px;
}

/* Navbar Styling */
nav {
  background: #5b7175;
  position: relative;
  width: 100%;
  height: 50px;
  text-align: center;
  margin-bottom: -20px;
  padding: 5px 0;
  transition: box-shadow 0.5s ease;
}

nav li {
  display: inline-block;
  list-style: none;
  text-transform: uppercase;
}

nav a {
  text-decoration: none;
  color: #fcfff5;
  padding: 22px;
}

nav a:hover {
  background: #2c525a;
}
nav a.active{
  background: #2c525a;
}

/* Sticky Navigation */
.navScrolled {
  position: fixed;
  top: 0;
  z-index: 1;
  box-shadow: 0px 1px 5px #000;
}


.logout{
  position:relative;
  top:-90%;
  right:-80%;
}

.logout a{
  color:#fff;
  text-decoration:none;
}

</style>

<div class="head_logo">
  <header >
    <h3>You04</h3>
    <div class="logout">
      <?php $pname=="problem_control"?'active':''?>
      <a href="logout.php">登出</a>
    </div>
  </header>
</div>

<nav id="topNav">
<ul>
      <li><a class="<?= $pname=='index'?'active':''?>"></a></li>
      <li><a class="<?= $pname=='icmember'?'active':''?>" href="icmember.php">網紅會員</a></li>
      <li><a class="<?= $pname=='bsmember'?'active':''?>" href="bsmember.php">廠商會員</a></li>
      <li><a class="<?= $pname=='case_control'?'active':''?>" href="case_control.php">專案管理</a></li>
      <li><a class="<?= $pname=='bs_order'?'active':''?>" href="bs_order.php">訂單管理</a></li>
      <li><a class="<?= $pname=='problem_control'?'active':''?>" href="problem_control.php">問題回報</a></li>
    </ul>
</nav>


<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
var navBar = $("#topNav");
var hdrHeight = $("header").height();


$(window).scroll(function() {
  if( $(this).scrollTop() > hdrHeight + 50) {
    navBar.addClass("navScrolled");
  } else {
    navBar.removeClass("navScrolled");
  }
});

</script>
