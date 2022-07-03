<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
        
        <title>Sidebar sub menus</title>
    </head>
    <body id="body-pd">
        <div class="l-navbar" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        <a href="#" class="nav__logo">MYS LAUNDRY</a>
                    </div>
                    <div class="nav__list">
                        <a href="index.html" class="nav__link active">
                            <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Home</span>
                        </a>
                      <div  class="nav__link collapse">
                            <ion-icon name="person-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Staff</span>

                            <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                            <ul class="collapse__menu">
                                <a href="addstaff.php" class="collapse__sublink"> Add  </a>  
                                <a href="#" class="collapse__sublink"> View </a>                               
                            </ul>
                        </div>
                <a href="#" class="nav__link">
                    <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>
        <!-- ===== IONICONS ===== -->

    <div class="section-center">
      <div class="container">
        <div class="row">
          <div class="booking-form">
            <div class="form-header">
              <h3>ADD STAFF</h3>
            </div>
         
            
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <span class="form-label">Name</span>
                    <input class="form-control" type="text" name="fullname" placeholder="Enter fullname">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <span class="form-label">Phone Number</span>
                    <input class="form-control" type="text" name="phoneNo" placeholder="Enter phone number">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <span class="form-label">Gender</span>
                <label class="container">
               <input type="radio" checked="checked" name="gen" >&nbsp; Male
                  <span class="checkmark"></span>
                </label>
                <label class="container">
                  <input type="radio" name="gen">&nbsp; Female
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="form-group">
                <span class="form-label">Username</span>
                <input class="form-control" type="text" name="username" placeholder="Enter username">
              </div>
              <div class="row">
                <div class="col-sm-5">
                  <div class="form-group">
                    <span class="form-label">Password</span>
                    <input class="form-control" type="password" name="password" placeholder="Enter password">
                  </div>
                </div>
                <div class="col-sm-7">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                      
                        <span class="select-arrow"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-btn">
                <button class="submit-btn" name="submit">Submit</button>
              </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= About Section ======= -->
</body>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        
        <!-- ===== MAIN JS ===== -->
        <script> 
          /*===== EXPANDER MENU  =====*/ 
const showMenu = (toggleId, navbarId, bodyId)=>{
  const toggle = document.getElementById(toggleId),
  navbar = document.getElementById(navbarId),
  bodypadding = document.getElementById(bodyId)

  if(toggle && navbar){
    toggle.addEventListener('click', ()=>{
      navbar.classList.toggle('expander')

      bodypadding.classList.toggle('body-pd')
    })
  }
}
showMenu('nav-toggle','navbar','body-pd')

/*===== LINK ACTIVE  =====*/ 
const linkColor = document.querySelectorAll('.nav__link')
function colorLink(){
  linkColor.forEach(l=> l.classList.remove('active'))
  this.classList.add('active')
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))


/*===== COLLAPSE MENU  =====*/ 
const linkCollapse = document.getElementsByClassName('collapse__link')
var i

for(i=0;i<linkCollapse.length;i++){
  linkCollapse[i].addEventListener('click', function(){
    const collapseMenu = this.nextElementSibling
    collapseMenu.classList.toggle('showCollapse')

    const rotate = collapseMenu.previousElementSibling
    rotate.classList.toggle('rotate')
  })
}

        </script>
    </body>
</html>

<style type="text/css">
  /*===== GOOGLE FONTS =====*/
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap");

/*===== VARIABLES CSS =====*/
.container {

  position: relative;
  padding-left: fixed;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14booopx;
  color: #fff;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
:root{  --nav-width: 92px;


  /*===== Colores =====*/
  --first-color: #0C5DF4;
  --bg-color: #12192C;
  --sub-color: #B6CEFC;
  --white-color: #FFF;
  
  /*===== Fuente y tipografia =====*/
  --body-font: 'Poppins', sans-serif;
  --normal-font-size: 1rem;
  --small-font-size: .875rem;
  
  /*===== z index =====*/
  --z-fixed: 100;
}


/*===== BASE =====*/
*,::before,::after{
  box-sizing: border-box;
}
body{
  position: relative;
  margin: 0;
  padding: 2rem 0 0 6.75rem;
  background-size:cover;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
  transition: .5s;
  background-image:url("bggs.jpg");
}
h1{
  margin: 0;
}
ul{
  margin: 0;
  padding: 0;
  list-style: none;
}
a{
  text-decoration: none;
}

/*===== l NAV =====*/
.l-navbar{
  position: fixed;
  top: 0;
  left: 0;
  width: var(--nav-width);
  height: 100vh;
  background-color: var(--bg-color);
  color: var(--white-color);
  padding: 1.5rem 1.5rem 2rem;
  transition: .5s;
  z-index: var(--z-fixed);
}

/*===== NAV =====*/
.nav{
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  overflow: hidden;
}
.nav__brand{
  display: grid;
  grid-template-columns: max-content max-content;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
}
.nav__toggle{
  font-size: 1.25rem;
  padding: .75rem;
  cursor: pointer;
}
.nav__logo{
  color: var(--white-color);
  font-weight: 600;
}

.nav__link{
  display: grid;
  grid-template-columns: max-content max-content;
  align-items: center;
  column-gap: .75rem;
  padding: .75rem;
  color: var(--white-color);
  border-radius: .5rem;
  margin-bottom: 1rem;
  transition: .3s;
  cursor: pointer;
}
.nav__link:hover{
  background-color: var(--first-color);
}
.nav__icon{
  font-size: 1.25rem;
}
.nav__name{
  font-size: var(--small-font-size);
}

/*Expander menu*/
.expander{
  width: calc(var(--nav-width) + 9.25rem);
}

/*Add padding body*/
.body-pd{
  padding: 2rem 0 0 16rem;
}

/*Active links menu*/
.active{
  background-color: var(--first-color);
}

/*===== COLLAPSE =====*/
.collapse{
  grid-template-columns: 40px max-content 4fr;
}
.collapse__link{
  justify-self: flex-end;
  transition: .5s;
}
.collapse__menu{
  display: none;
  padding: .90rem 3.45rem;
}
.collapse__sublink{
  color: var(--sub-color);
  font-size: var(--small-font-size);
   padding:        10px 20px;


}
.collapse__sublink:hover{
  color: var(--white-color);
}

/*Show collapse*/
.showCollapse{
  display: block;
}

/*Rotate icon*/
.rotate{
  transform: rotate(180deg);
}

.section {
  position: relative;
  height: 100vh;
}

.section .section-center {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#booking {
  font-family: 'Montserrat', sans-serif;
  background-size: cover;
  background-position: center;
}

.booking-form {
  max-width: 642px;
  width: 100%;
  margin: auto;
}

.booking-form .form-header {
  text-align: center;
  margin-bottom: 25px;
}

.booking-form .form-header h1 {
  font-size: 58px;
  text-transform: uppercase;
  font-weight: 700;
  color: #a1e1ed;
  margin: 0px;
}

.booking-form>form {
  background-color:#10111300;
  padding: 30px 20px;
  border-radius: 3px;
}

.booking-form .form-group {
  position: relative;
  margin-bottom: 15px;
}

.booking-form .form-control {
  background-color: #f5f5f5;
  border: none;
  height: 45px;
  width: 600px;
  border-radius: 3px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-weight: 600;
  color: #101113;
}

.booking-form .form-control::-webkit-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control::placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form select.form-control {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.booking-form select.form-control+.select-arrow {
  position: absolute;
  right: 0px;
  bottom: 6px;
  width: 32px;
  line-height: 32px;
  height: 32px;
  text-align: center;
  pointer-events: none;
  color: #a1e1ed;
  font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
  content: '\279C';
  display: block;
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.booking-form .form-label {
  color: #fff;
  font-size: 12px;
  font-weight: 400;
  margin-bottom: 5px;
  display: block;
  text-transform: uppercase;
}

.booking-form .submit-btn {
  color: #101113;
  background-color: #a1e1ed;
  font-weight: 300;
  height: 50px;
  border: none;
  width: 80;
  display: block;
  border-radius: 3px;
  text-transform: uppercase;
}.section {
  position: relative;
  height: 100vh;
}

.section .section-center {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#booking {
  font-family: 'Montserrat', sans-serif;
  background-image: url('../img/4331288.jpg');
  background-size: cover;
  background-position: center;
}

#booking::before {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background: rgba(0, 0, 0, 0.6);
}

.booking-form {
  max-width: 600px;
  width: 100%;
  margin: auto;
}

.booking-form .form-header {
  text-align: center;
  margin-bottom: 25px;
}

.booking-form .form-header h1 {
  font-size: 58px;
  text-transform: uppercase;
  font-weight: 700;
  color: #a1e1ed;
  margin: 0px;
}

.booking-form>form {
  background-color: #101113;
  padding: 30px 20px;
  border-radius: 3px;
}

.booking-form .form-group {
  position: relative;
  margin-bottom: 15px;
}

.booking-form .form-control {
  background-color: #f5f5f5;
  border: none;
  height: 45px;
  border-radius: 3px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-weight: 400;
  color: #101113;
}

.booking-form .form-control::-webkit-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control::placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form select.form-control {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.booking-form select.form-control+.select-arrow {
  position: absolute;
  right: 0px;
  bottom: 6px;
  width: 32px;
  line-height: 32px;
  height: 32px;
  text-align: center;
  pointer-events: none;
  color: #a1e1ed;
  font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
  content: '\279C';
  display: block;
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.booking-form .form-label {
  color: #fff;
  font-size: 12px;
  font-weight: 400;
  margin-bottom: 5px;
  display: block;
  text-transform: uppercase;
}

.booking-form .submit-btn {
  color: #101113;
  background-color: #a1e1ed;
  font-weight: 700;
  height: 50px;
  border: none;
  width: 100%;
  display: block;
  border-radius: 3px;
  text-transform: uppercase;
}.section {
  position: relative;
  height: 100vh;
}

.section .section-center {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
}

#booking {
  font-family: 'Montserrat', sans-serif;
 /* background-image: url('bgg.jpg');*/
  background-size: cover;
  background-position: center;
}

#booking::before {
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background: rgba(0, 0, 0, 0.6);
}

.booking-form {
  max-width: 642px;
  width: 100%;
  margin: auto;
}

.booking-form .form-header {
  text-align: center;
  margin-bottom: 25px;
}

.booking-form .form-header h3 {
  font-size: 58px;
  text-transform: uppercase;
  font-weight: 700;
  color: #a1e1ed;
  margin: 0px;
}

.booking-form>form {
  background-color: #101113;
  padding: 30px 20px;
  border-radius: 3px;
}

.booking-form .form-group {
  position: relative;
  margin-bottom: 15px;
}

.booking-form .form-control {
  background-color: #f5f5f5;
  border: none;
  height: 45px;
  border-radius: 3px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-weight: 400;
  color: #101113;
}

.booking-form .form-control::-webkit-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form .form-control::placeholder {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
  color: rgba(16, 17, 19, 0.3);
}

.booking-form select.form-control {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.booking-form select.form-control+.select-arrow {
  position: absolute;
  right: 0px;
  bottom: 6px;
  width: 32px;
  line-height: 32px;
  height: 32px;
  text-align: center;
  pointer-events: none;
  color: #a1e1ed;
  font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
  content: '\279C';
  display: block;
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.booking-form .form-label {
  color: #fff;
  font-size: 12px;
  font-weight: 400;
  margin-bottom: 5px;
  display: block;
  text-transform: uppercase;
}

.booking-form .submit-btn {
  color: #101113;
  background-color: #a1e1ed;
  font-weight: 700;
  height: 50px;
  border: none;
  width: 94%;
  display: block;
  border-radius: 3px;
  text-transform: uppercase;
}


</style>