

<a href="https://api.whatsapp.com/send/?phone=+44-7466628222&amp;text=hello&amp;type=phone_number&amp;app_absent=0" class="watkey" target="_blank">
        <img src="images/whatsapp.png" alt="" style="width: 50px;">

</a>

<div id="notification" style="height: 150px; width: 300px; 
background-color: aliceblue; 
position: fixed;
z-index: 1;
display: none;



bottom: 100px;" 
class="card shadow ">
<div  style=" width: 100%;display: flex; align-items: center; height: 140px; margin: 5px; ">
    <div style="width: 20%;">
        <img src="images/favicon.png" style="width: 60%;" />
       
    </div>
    <div style="width: 70%; ">
       <u> <b>Earnings</b></u>
        
        <p>
            <b id="nameTag"></b> from <b id="countryTag"></b> has just earned $<b id="amountTag"></b>
        </p>

    </div>
        
    </div>
</div>

</div>
<!-- Footer Starts -->
<footer class="footer" >
            <!-- Footer Top Area Starts -->
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-2">
                            <h4>Our Company</h4>
                            <div class="menu">
                                <ul>
                                    <li><a href="index">Home</a></li>
                                    <li><a href="about">About</a></li>
                                    <li><a href="services">Services</a></li>
                                    <li><a href="plans">Plans</a></li>
                                    <!-- <li><a href="blog-right-sidebar.html">Blog</a></li>
                                    <li><a href="contact.html">Contact</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Widget Ends -->
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-2">
                            <h4>Help & Support</h4>
                            <div class="menu">
                                <ul>
                                    <!-- <li><a href="faq.html">FAQ</a></li> -->
                                    <li><a href="terms-of-services">Terms of Services</a></li>
                                    <!-- <li><a href="404.html">404</a></li> -->
                                    <li><a href="register">Register</a></li>
                                    <li><a href="login">Login</a></li>
                                    <!-- <li><a href="coming-soon.html">Coming Soon</a></li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- Footer Widget Ends -->
                        <!-- Footer Widget Starts -->
                        <div class="col-sm-4 col-md-3">
                            <h4>Contact Us </h4>
                            <div class="contacts">
                                <div>
                                    <span><?= $company_email ?></span>
                                </div>
                                
                                <div>
                                <span><?= $company_address ?></span>
                                </div>
                                
                            </div>
							<!-- Social Media Profiles Starts -->
                            <!-- <div class="social-footer">
                                <ul>
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div> -->
							<!-- Social Media Profiles Ends -->
                        </div>
                        <!-- Footer Widget Ends -->
						<!-- Footer Widget Starts -->
                        <div class="col-sm-12 col-md-5">
							<!-- Facts Starts -->
							<div class="facts-footer">
								<div>
									<h5>$198.76B</h5>
									<span>Market cap</span>
								</div>
								<div>
									<h5>243K</h5>
									<span>daily transactions</span>
								</div>
								<div>
									<h5>369K</h5>
									<span>active accounts</span>
								</div>
								<div>
									<h5>127</h5>
									<span>supported countries</span>
								</div>
							</div>
							<!-- Facts Ends -->
							<hr>
							<!-- Supported Payment Cards Logo Starts -->
							<!-- <div class="payment-logos">
								<h4 class="payment-title"> payment methods</h4>
								<img src="images/icons/payment/american-express.png" alt="american-express">
								<img src="images/icons/payment/mastercard.png" alt="mastercard">
								<img src="images/icons/payment/visa.png" alt="visa">
								<img src="images/icons/payment/paypal.png" alt="paypal">
								<img class="last" src="images/icons/payment/maestro.png" alt="maestro">
							</div> -->
							<!-- Supported Payment Cards Logo Ends -->
                        </div>
                        <!-- Footer Widget Ends -->
                    </div>
                </div>
            </div>
            <!-- Footer Top Area Ends -->
            <!-- Footer Bottom Area Starts -->
            <div class="bottom-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Copyright Text Starts -->
                            <p class="text-center">Copyright © 2018 <?= $company_name ?> All Rights Reserved </p>
                            <!-- Copyright Text Ends -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom Area Ends -->
        </footer>
        <!-- Footer Ends -->
		<!-- Back To Top Starts  -->
        <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
		<!-- Back To Top Ends  -->
		
        <!-- Template JS Files -->
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/custom.js"></script>
		
		<!-- Live Style Switcher JS File - only demo -->
		<script src="js/styleswitcher.js"></script>

    </div>
    <!-- Wrapper Ends -->
     <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container" style="position:fixed;bottom:0px">
  <div class="tradingview-widget-container__widget"></div>

  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500 Index"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100 Cash CFD"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR to USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "Bitcoin"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "Ethereum"
    }
  ],
  "showSymbolLogo": true,
  "isTransparent": false,
  "displayMode": "adaptive",
  "colorTheme": "dark",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
 <script>
    

let names = [
    "Liam", "Olivia", "Noah", "Emma", "Oliver", "Ava", "Elijah", "Sophia", "James", "Isabella",
    "William", "Mia", "Benjamin", "Amelia", "Lucas", "Harper", "Henry", "Evelyn", "Alexander", "Abigail",
    "Mason", "Emily", "Michael", "Ella", "Ethan", "Elizabeth", "Daniel", "Camila", "Jacob", "Luna",
    "Logan", "Sofia", "Jackson", "Avery", "Sebastian", "Mila", "Jack", "Aria", "Aiden", "Scarlett",
    "Owen", "Penelope", "Samuel", "Layla", "Matthew", "Chloe", "Joseph", "Victoria", "Levi", "Madison",
    "Mateo", "Eleanor", "David", "Grace", "John", "Nora", "Wyatt", "Riley", "Carter", "Zoey",
    "Julian", "Hannah", "Luke", "Hazel", "Grayson", "Lily", "Isaac", "Ellie", "Jayden", "Violet",
    "Theodore", "Lillian", "Gabriel", "Aurora", "Anthony", "Natalie", "Dylan", "Isla", "Leo", "Skylar",
    "Lincoln", "Addison", "Jaxon", "Lucy", "Asher", "Paisley", "Christopher", "Savannah", "Josiah", "Serenity",
    "Andrew", "Aubrey", "Thomas", "Brooklyn", "Joshua", "Bella", "Ezra", "Claire", "Hudson", "Aaliyah",
    "Charles", "Everly", "Caleb", "Lydia", "Isaiah", "Emilia", "Ryan", "Kennedy", "Nathan", "Maya",
    "Adrian", "Willow", "Christian", "Kinsley", "Maverick", "Naomi", "Colton", "Elena", "Elias", "Sarah",
    "Aaron", "Ariana", "Eli", "Allison", "Landon", "Gabriella", "Jonathan", "Alice", "Nolan", "Madelyn",
    "Hunter", "Cora", "Cameron", "Ruby", "Connor", "Eva", "Santiago", "Serena", "Jeremiah", "Jade",
    "Ezekiel", "Autumn", "Angel", "Aurora", "Roman", "Stella", "Easton", "Quinn", "Miles", "Piper",
    "Robert", "Rylee", "Jameson", "Sophie", "Nicholas", "Peyton", "Greyson", "Josephine", "Cooper", "Athena",
    "Ian", "Eliana", "Carson", "Parker", "Axel", "Rose", "Jace", "Samantha", "Dominic", "Lyla",
    "Leonardo", "Genesis", "Luca", "Ayla", "Austin", "Eliza", "Jordan", "Margaret", "Adam", "Ivy",
    "Xavier", "Emerson", "Jose", "Adeline", "Jaxson", "Arya", "Everett", "Charlie", "Declan", "Reagan",
    "Evan", "Brielle", "Kayden", "Cecilia", "Parker", "Mary", "Wesley", "Jane", "Braxton", "Hadley",
    "Harrison", "Harmony", "Bryson", "Elliana", "Sawyer", "Lola", "Jason", "Isabelle", "Zachary", "Ember"
];
   
    let amounts = [
    200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 950, 1000, 1050, 1100, 1150,
    1200, 1250, 1300, 1350, 1400, 1450, 1500, 1550, 1600, 1650, 1700, 1750, 1800, 1850, 1900, 1950, 2000, 2050, 
    2100, 2150, 2200, 2250, 2300, 2350, 2400, 2450, 2500, 2550, 2600, 2650, 2700, 2750, 2800, 2850, 2900, 2950,
    3000, 3050, 3100, 3150, 3200, 3250, 3300, 3350, 3400, 3450, 3500, 3550, 3600, 3650, 3700, 3750, 3800, 3850,
    3900, 3950, 4000, 4050, 4100, 4150, 4200, 4250, 4300, 4350, 4400, 4450, 4500, 4550, 4600, 4650, 4700, 4750,
    4800, 4850, 4900, 4950, 5000, 5050, 5100, 5150, 5200, 5250, 5300, 5350, 5400, 5450, 5500, 5550, 5600, 5650,
    5700, 5750, 5800, 5850, 5900, 5950, 6000, 6050, 6100, 6150, 6200, 6250, 6300, 6350, 6400, 6450, 6500, 6550,
    6600, 6650, 6700, 6750, 6800, 6850, 6900, 6950, 7000, 7050, 7100, 7150, 7200, 7250, 7300, 7350, 7400, 7450,
    7500, 7550, 7600, 7650, 7700, 7750, 7800, 7850, 7900, 7950, 8000, 8050, 8100, 8150, 8200, 8250, 8300, 8350,
    8400, 8450, 8500, 8550, 8600, 8650, 8700, 8750, 8800, 8850, 8900, 8950, 9000, 9050, 9100, 9150, 9200, 9250,
    9300, 9350, 9400, 9450, 9500, 9550, 9600, 9650, 9700, 9750, 9800, 9850, 9900, 9950, 10000
];
let countries = [
    "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
    "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan",
    "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
    "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)", "Costa Rica",
    "Croatia", "Cuba", "Cyprus", "Czech Republic", "Democratic Republic of the Congo", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador",
    "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France",
    "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau",
    "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland",
    "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan",
    "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar",
    "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
    "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar (Burma)", "Namibia", "Nauru", "Nepal",
    "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan",
    "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania",
    "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal",
    "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea",
    "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan",
    "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu",
    "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela",
    "Vietnam", "Yemen", "Zambia", "Zimbabwe"
];

    var notification = document.getElementById("notification");
    var nameTag = document.getElementById("nameTag");
    var amountTag = document.getElementById("amountTag");
    var countryTag = document.getElementById("countryTag");

    setInterval(()=>{
        let randomNumber1 = Math.floor(Math.random() * 200) + 0;
        let randomNumber2 = Math.floor(Math.random() * 200) + 0;
        let randomNumber3 = Math.floor(Math.random() * 200) + 0;
        nameTag.innerHTML = names[randomNumber1];
        amountTag.innerHTML = amounts[randomNumber2];
        countryTag.innerHTML = countries[randomNumber3];

       
        notification.style.display = "block";

         setTimeout(()=>{
    notification.style.display = "none";

   }, 3000);

    },8000);

   
  

 </script>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>


</html>