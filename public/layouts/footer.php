<script>



// var header = document.getElementById("main-nav-sidebar-menu");
//    var btns = header.getElementsByClassName("sideNavBtn");

//    for (var i = 0; i < btns.length; i++) {
//     btns[i].addEventListener("click", function() {
//     alert(btns.length)
//       var current = document.getElementsByClassName("menu-active");
//       current[0].className = current[0].className.replace(" menu-active", "");
//       this.className += " menu-active";
//     });
// }



     const phoneInputField = document.querySelector(".phone");
     
     const phoneInputField2 = document.querySelector(".phone2");
     
     const phoneInputFieldKin = document.querySelector(".phone_kin");

   const phoneCountry = {
  preferredCountries: ["gh", "us", "gb", "ng"],
  utilsScript:
  "media/js/internation_tel_util.js",
}

   const phoneInput = window.intlTelInput(phoneInputField, phoneCountry);
   
   const phoneInput2 = window.intlTelInput(phoneInputField2, phoneCountry);
   
   const phoneInputKin = window.intlTelInput(phoneInputFieldKin, phoneCountry);





</script>

<footer class="footer-wrap-layout1 text-center">
    <div class="copyright">© Copyrights <a href="#">API Technologies</a> 2021. All rights reserved. <a href="#"></a>
    </div>
</footer>

        </div>
    </div>
<!-- Page Area End Here -->
</div>

<!-- Modernize js -->
<script src="media/js/modernizr-3.6.0.min.js"></script>
<!-- Plugins js -->
<script src="media/js/plugins.js"></script>
<!-- Popper js -->
<script src="media/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="media/js/bootstrap.min.js"></script>
<!-- Counterup Js -->
<script src="media/js/jquery.counterup.min.js"></script>
<!-- Moment Js -->
<script src="media/js/moment.min.js"></script>
<!-- Select 2 Js -->
<script src="media/js/select2.min.js"></script>
<!-- Date Picker Js -->
<script src="media/js/datepicker.min.js"></script>
<!-- Waypoints Js -->
<script src="media/js/jquery.waypoints.min.js"></script>
<!-- Scroll Up Js -->
<script src="media/js/jquery.scrollUp.min.js"></script>
<!-- Full Calender Js -->
<script src="media/js/fullcalendar.min.js"></script>
<!-- Chart Js -->
<script src="media/js/Chart.min.js"></script>
<!-- Custom Js -->
<script src="media/js/main.js"></script>