
<!-- Footer Area Start -->
	<div class="footer__two" data-background="assets/img/shape/footer-bg-1.png">
		<!-- Subscribe Area Start -->
		<div class="subscribe__area">
			<div class="container">
				<div class="row align-items-center subscribe__area-bg" data-background="assets/img/pages/subscribe.jpg">
					<div class="col-xl-5 col-lg-5 lg-mb-40">
						<div class="subscribe__area-left">
							<h2>Stay Connected</h2>
							<div class="subscribe__area-left-notification">
								<h6>get all notifications</h6>
								<div class="subscribe__area-left-notification-icon icon-animation video-pulse">
									<i class="far fa-bell"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-7 col-lg-7">
						<div class="subscribe__area-form">
							<form>
								<input type="email" name="email" placeholder="Email address">
								<button type="submit">Subscribe Now</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Subscribe Area End -->
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6 lg-mb-30">
					<div class="footer__two-widget">
						<div class="footer__two-widget-about">
							<a href="about.php?a=home"><img src="assets/img/logo-2.png" alt=""></a>
							<p>
                                In the expansive domain of financial markets, <?= $company_name ?> has 
                                distinguished itself as a leading force since its inception in February 
                                2018,<?= $company_name ?> is a New York based copy trading company 
                                providing discerning investors with unparalleled opportunities within 
                                the dynamic realm of forex....
                                
                            
                            </p>

						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 md-mb-30">
					<div class="footer__two-widget footer-border">
						<h4>Head Office</h4>
						<div class="footer__two-widget-location">
							<div class="footer__two-widget-location-item">
								<div class="footer__two-widget-location-item-icon">
									<i class="far fa-map-marker-alt"></i>
								</div>
								<div class="footer__two-widget-location-item-info">
									<a href="#"> <?= $company_address  ?></a>
								</div>
							</div>
							<h6>Email</h6>
							<div class="footer__two-widget-location-item">
								<div class="footer__two-widget-location-item-icon">
									<i class="far fa-envelope"></i>
								</div>
								<div class="footer__two-widget-location-item-info">
									<a style="text-transform: lowercase;" href="mailto: <?= $company_email  ?>">
								     <?= $company_email  ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-xl-4 col-lg-4 col-md-6 md-mb-30">
					<div class="footer__two-widget footer-border">
						
						


<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="contact.php">Contact</a></li>
<li><a href="login.php">Login</a></li>
        <li><a href="register.php">Signup</a></li>
<li><a href="terms.php">Terms & Conditions</a></li>


</li>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright__two">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<p>Copyright © 2018 <a href="index.php?a=home"><?= $company_name  ?></a>. All Right Reserved. <span><a href="terms.php">Terms and services</a></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer Area End -->
	<!-- Scroll Btn Start -->
	<div class="scroll-up scroll-two">
		<svg class="scroll-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
		</svg>
	</div>
	<!-- Scroll Btn End -->


    <!-- WhatsApp Floating Button -->
<a
  href="https://wa.me/12727661804"
  target="_blank"
  rel="noopener noreferrer"
  class="whatsapp-button"
  aria-label="Chat with us on WhatsApp"
>
  <img src="uploads/whatsapp.png" alt="WhatsApp">
</a>

<style>
  .whatsapp-button {
    position: fixed;
    left: 20px;
    bottom: 20px;
    width: 60px;
    height: 60px;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #25d366;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    transition: transform 0.2s ease;
  }

  .whatsapp-button img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 50%;
  }

  .whatsapp-button:hover {
    transform: scale(1.1);
  }

  @media (max-width: 600px) {
    .whatsapp-button {
      left: 15px;
      bottom: 15px;
      width: 55px;
      height: 55px;
    }
  }
</style>
	 
<!-- <div id="live-withdrawals"></div> -->

<style>
#live-withdrawals{
    position:fixed;
    bottom:25px;
    left:25px;
    z-index:99999;
}

.withdrawal-popup{
    width:320px;
    background:linear-gradient(135deg,#0f172a,#1e40af);
    color:#fff;
    border-radius:18px;
    padding:16px;
    box-shadow:
        0 10px 30px rgba(30,64,175,.4),
        0 0 0 1px rgba(255,255,255,.08);
    backdrop-filter:blur(12px);
    animation:slideIn .6s ease;
    overflow:hidden;
    position:relative;
}

.withdrawal-popup::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(
        90deg,
        #38bdf8,
        #60a5fa,
        #2563eb
    );
}

.withdrawal-header{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:10px;
}

.withdrawal-icon{
    width:42px;
    height:42px;
    border-radius:50%;
    background:rgba(255,255,255,.12);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
}

.withdrawal-title{
    font-weight:700;
    font-size:15px;
}

.withdrawal-subtitle{
    color:#bfdbfe;
    font-size:12px;
}

.withdrawal-message{
    font-size:14px;
    line-height:1.6;
}

.withdrawal-message strong{
    color:#60a5fa;
    font-size:17px;
}

.online-dot{
    display:inline-block;
    width:10px;
    height:10px;
    border-radius:50%;
    background:#22c55e;
    box-shadow:0 0 10px #22c55e;
    margin-right:6px;
}

@keyframes slideIn{
    from{
        opacity:0;
        transform:translateY(40px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.fade-out{
    animation:fadeOut .5s forwards;
}

@keyframes fadeOut{
    from{
        opacity:1;
        transform:translateY(0);
    }
    to{
        opacity:0;
        transform:translateY(20px);
    }
}
</style>

<script>
const names = [
    "John Ali","Michael James","David Mark","Sarah Johnson",
    "Daniel Lee","Chris Brown","Amina Yusuf","James Wilson",
    "Sophia Carter","Emma Smith","Samuel Green","Grace Adams",
    "Henry Cole","Mia Scott","Olivia Walker","Noah Davis"
];

const countries = [
    "Peru","Nigeria","Canada","Brazil","Germany",
    "France","South Africa","India","Mexico",
    "Spain","Argentina","Kenya","Italy","USA"
];

function randomItem(arr){
    return arr[Math.floor(Math.random() * arr.length)];
}

function randomAmount() {
    return Math.floor(Math.random() * (1500 - 80 + 1)) + 80;
}

function showWithdrawal() {

    const container = document.getElementById('live-withdrawals');

    const name = randomItem(names);
    const country = randomItem(countries);
    const amount = randomAmount();

    const type = randomItem(["Withdrawal", "Deposit"]);
    const icon = type === "Deposit" ? "💰" : "💸";
    const action = type === "Deposit" ? "deposited" : "withdrew";

    container.innerHTML = `
        <div class="withdrawal-popup">
            <div class="withdrawal-header">
                <div class="withdrawal-icon">${icon}</div>
                <div>
                    <div class="withdrawal-title">
                        <span class="online-dot"></span>
                        Live ${type}
                    </div>
                    <div class="withdrawal-subtitle">
                        Verified transaction
                    </div>
                </div>
            </div>

            <div class="withdrawal-message">
                <strong>${name}</strong> from
                <strong>${country}</strong>
                successfully ${action}
                <strong>$${amount}</strong>
            </div>
        </div>
    `;

    setTimeout(() => {
        const popup = document.querySelector('.withdrawal-popup');
        if (popup) {
            popup.classList.add('fade-out');
        }
    }, 4500);

    setTimeout(() => {
        container.innerHTML = '';
    }, 5000);
}
showWithdrawal();
setInterval(showWithdrawal, 7000);
</script>

<!-- Smartsupp Live Chat script -->
<!-- <script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'a76efa8eee481ade7764462b8950dc93179a88e1';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script> -->




	<!-- Main JS -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Counter Up JS -->
	<script src="assets/js/jquery.counterup.min.js"></script>
	<!-- Popper JS -->
	<script src="assets/js/popper.min.js"></script>
	<!-- Progressbar JS -->
	<script src="assets/js/progressbar.min.js"></script>
	<!-- Magnific Popup JS -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Swiper Bundle JS -->
	<script src="assets/js/swiper-bundle.min.js"></script>
	<!-- Isotope JS -->
	<script src="assets/js/isotope.pkgd.min.js"></script>
	<!-- Waypoints JS -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Mean Menu JS -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/custom.js"></script>

    <script src="widget/JoJyaJKSuY" async=""></script>

</body>
<!-- Smartsupp Live Chat script -->



</html>

