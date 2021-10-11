 <!-- Footer -->
 <footer class="container-fluid text-dark" style="background-color: #FF8D27;">
     <hr class="my-4 bg-dark">
     <div class="container">
         <div class="row">
             <div class="col-md-3">
                 <h4>AKUN SAYA</h4>
                 <ul>
                     <li><a href="account" class="text-dark">Pengaturan Akun</a></li>
                     <li><a href="<?= base_url('daftar/pesanan') ?>" class="text-dark">Daftar Pemesanan</a></li>
                     <li><a href="<?= base_url('daftar') ?>" class="text-dark">Daftar Transaksi</a></li>
                 </ul>
             </div>
             <div class="col-md-3">
                 <h4>INFORMASI</h4>
                 <ul>
                     <li><a href="account/SS" class="text-dark">Persyaratan Penggunaan</a></li>
                     <li><a href="account/SS" class="text-dark">Kebijakan Privasi</a></li>
                     <li><a href="account/SS" class="text-dark">FAQ</a></li>
                 </ul>
             </div>
             <div class="col-md-3">
                 <h4>LAINYA</h4>
                 <ul>
                     <li><a href="account/SS" class="text-dark">Tentang</a></li>
                     <li><a href="account/SS" class="text-dark">Hubungi</a></li>
                     <li><a href="account/SS" class="text-dark">Blog</a></li>
                 </ul>
             </div>

             <div class="col-md-3">
                 <h4>HUBUNGI KAMI</h4>
                 <ul>
                     <li><a href="http://www.instagram.com" class="text-dark">Instagram</a></li>
                     <li><a href="http://www.facebook.com" class="text-dark">Facebook</a></li>
                 </ul>
             </div>
         </div>
         <section class="clearfix">
             <div id="payments">
                 <h4>CARA PEMBAYARAN KAMI</h4>
                 <img src="<?= base_url('asseets/payment-methods.gif') ?>" alt="Supported Payment Methods">
             </div>
         </section>
     </div>
     <div class=" text-center pt-3 pb-3">
         <b>Author @Ari.arf 2020</b>
     </div>
 </footer>
 <!-- End Footer -->
 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="<?= base_url('bootstrap-4.0.0/dist/js/jquery-3.3.1.slim.min.js') ?>"></script>
 <script src="<?= base_url('bootstrap-4.0.0/dist/js/popper.min.js') ?>"></script>
 <script src="<?= base_url('bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script>

 <script>
     function previewA() {
         const sampulA = document.querySelector('#gambarA');
         const gambarA = document.querySelector('.img-preview');

         const fileGambarA = new FileReader();
         fileGambarA.readAsDataURL(sampulA.files[0]);

         fileGambarA.onload = function(e) {
             gambarA.src = e.target.result;
         }
     }

     function previewB() {
         const sampulB = document.querySelector('#gambarB');
         const gambarB = document.querySelector('.img-preview2');

         const fileGambarA = new FileReader();
         fileGambarA.readAsDataURL(sampulB.files[0]);

         fileGambarA.onload = function(e) {
             gambarB.src = e.target.result;
         }
     }
 </script>
 <script>
     function format_number(){
        var phone_number = document.getElementById('telepon');
        var telepon = document.myform.telepon.value;
         var regex_cell = /(\d{1})(\d{3})(\d{4})(\d{4})/g;
        var new_value = phone_number.value.replace(regex_cell, "(+62)$2-$3-$4");
        phone_number.value = new_value;
      }
 </script>
 </body>

 </html>