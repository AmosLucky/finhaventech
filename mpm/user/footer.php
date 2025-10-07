<script>
        const ref = document.getElementById("reflink");
        const copied = document.getElementById('copied');

        function myFunction() {
            ref.select();
            document.execCommand("copy")
            copied.innerText = "Copied!"

            setTimeout(()=>{
                copied.innerText = ""
            }, 2000)
        }
</script>
            </div>
            <!-- Footer -->
            <div class="pt-5 pb-4 footer footer-light sticky-bottom" id="footer-main">
                <div class="text-center row text-sm-left align-items-sm-center">
                    <div class="col-sm-6">
                        <p class="mb-0 text-sm">All Rights Reserved &copy; <?= $company_name ?>
                            2022</p>
                    </div>
                                            <div class="text-right col-sm-6 text-md-center">
                            <div id="google_translate_element"></div>
                        </div>
                                    </div>
            </div>
        </div>
    </div>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/68385ba2a619cc1909c8ea82/1ise2bt35';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

            <!-- Scripts -->
        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <script src="themes/purposeTheme/assets/js/purpose.core.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <!-- Bootstrap Notify -->
        <script src="themes/purposeTheme/assets/libs/bootstrap-notify/bootstrap-notify.min.js "></script>
        <!-- Page JS -->
        <script src="themes/purposeTheme/assets/libs/progressbar.js/dist/progressbar.min.js"></script>
        <script src="themes/purposeTheme/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="themes/purposeTheme/assets/libs/moment/min/moment.min.js"></script>
        <script src="themes/purposeTheme/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="themes/purposeTheme/assets/libs/sweetalert/sweetalert.min.js "></script>
        <!-- Purpose JS -->
        <script src="themes/purposeTheme/assets/js/purpose.js"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js">
        </script>
        
        <script src="themes/purposeTheme/assets/libs/flatpickr/dist/flatpickr.min.js"></script>

    
    <script src="themes/purposeTheme/assets/js/scriptfile.js"></script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <!-- Livewire Scripts -->

   

</script>
</body>

</html>
