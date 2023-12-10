 <!-- footer section -->
 <section class="container-fluid footer_section"
     style="background-color: transparent !important; display: flex;justify-content: flex-end;">
     <a href="https://api.whatsapp.com/send/?phone=6289504043259&text&type=phone_number&app_absent=0" target="_blank">
         <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/WhatsApp_icon.png/479px-WhatsApp_icon.png"
             style="width:50px; margin-right:10px;">
     </a>
 </section>
 <section class="container-fluid mt-5">
     <center>
         <a>
             <span class="font-weight-bold">
                 Go print Cup
             </span>
             <br>
             <span>
                 Jl. Wadassari 3 No.22, Pd. Betung, Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15221
             </span>
         </a>

         <p>
             Designed Web By
             <a href="/"><b>Abednego Berly Dewa Nagari</b></a>
         </p>
     </center>
 </section>
 <!-- footer section -->

 <script type="text/javascript" src="{{ secure_asset('js/jquery-3.4.1.min.js') }}"></script>
 <script type="text/javascript" src="{{ secure_asset('js/bootstrap.js') }}"></script>

 <script>
     // This example adds a marker to indicate the position of Bondi Beach in Sydney,
     // Australia.
     function initMap() {
         var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {
                 lat: 40.645037,
                 lng: -73.880224
             },
         });

         var image = 'images/maps-and-flags.png';
         var beachMarker = new google.maps.Marker({
             position: {
                 lat: 40.645037,
                 lng: -73.880224
             },
             map: map,
             icon: image
         });
     }
 </script>
 <!-- google map js -->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
 </script>
 <!-- end google map js -->
