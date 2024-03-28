<!DOCTYPE html>
<html>
<head>
  <title>Sample Project</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
}

ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:  #4b16ad;
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
#loggedInUser{
    background-color:red;
    padding:4px;
    border-radius:2px;
}
.topnav img{
    border-radius:20px;
    height:50px;
    width:50px;
    
}
ul.topnav li a:hover:not(.active) {background-color: #111;}


.dropdown-content {
  display: none;
  position: fixed;
  background-color:#4b16ad;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #ddd;}


.dropdown:hover .dropdown-content {
  opacity: 1;
  display: block;
}

ul.topnav li.right {
  margin-left: 15px;
  float: right;
}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
</style>
</head>
<body>

<ul class="topnav">
  <li><a href=""><img src="logo.jpg" alt="img"></a></li>
  <li><a href="/home">Home</a></li>
  <li><a href="{{ route('categories') }}">Categories</a></li>
  <li><a href="{{ route('products') }}">Products</a></li>
  <li><a href="{{ route('contactus') }}">Contact us</a></li>
  
  <li class="right"><a href="{{ route('cart') }}"><span class="material-symbols-outlined">shopping_cart</span> </a></li>
  <li class="right dropdown" id="settingsDropdown"> <!-- Added id to the dropdown content -->
    <a href="#" class="material-symbols-outlined" id="settingsBtn">settings</a> <!-- Added id to the settings link -->
    <div class="dropdown-content">
      <a href="">Profile</a>
      <a href="">Orders</a>
      <a href="">Logout</a>
    </div>
  </li>
</ul>

@yield("section")

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function initializeDropdown() {
  var settingsBtn = document.getElementById("settingsBtn");
  var settingsDropdown = document.getElementById("settingsDropdown");

  settingsBtn.addEventListener("click", function() {
    settingsDropdown.classList.toggle("open");
  });
}

initializeDropdown(); 
</script>

</body>
</html>
