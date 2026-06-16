<?php

require 'header.php';


?>



	<title>About Us - <?= $company_name ?></title>
	<!-- Page Banner Area Start -->
	<div class="page__banner" data-background="assets/img/pages/page-banner.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="page__banner-content">
						<span>About</span>
						<ul>
							<li><a href="index.php?a=home">Home</a><span>|</span></li>
							<li>About Company </li>
						</ul>
						<h1>About Company </h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Banner Area End -->
	<!-- About Company Area Start -->
	<div class="about__company section-padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xxl-7 col-xl-6 xl-mb-30">
					<div class="about__company-left">
						<div class="about__company-left-image dark__image">
							<img src="assets/img/about/about-7.jpg" alt="">
							<img src="assets/img/about/about-8.jpg" alt="">
						</div>
						<div class="about__company-left-experience">
							<h2><span class="counter">10</span>+</h2>
							<h6>Years of Experience</h6>
						</div>
					</div>
				</div>
				<div class="col-xxl-5 col-xl-6">
					<div class="about__company-right">
						<div class="about__company-right-title">
							<span class="subtitle-one">About Our Company</span>
							<h2>Find out more about us</h2>
							<p class="">
								<?= $company_name ?> is a pioneering organization dedicated to assisting investors in
								unlocking exceptional opportunities to maximize their capital investments. Our primary
								goal is to enable investors to achieve significant gains through a meticulous and
								well-calculated investment approach. We have curated a team of experienced professionals
								who leverage their expertise to guide your investments towards success.
								<br><br>
								Our fundamental investment strategy is grounded in prudence. We meticulously allocate
								capital across diverse sectors, thereby mitigating risk and ensuring a superior return
								on investment. By leveraging the dynamics of stock exchange markets, we have established
								ourselves as a reliable and profitable source of genuine net income.
								<br><br>
							</p>
							<a class="btn-one" href="register.php">Get Started<i class="far fa-chevron-double-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img class="about__one-shape-1" src="assets/img/shape/about-1.png" alt="">
		<img class="about__one-shape-2" src="assets/img/shape/about-2.png" alt="">
	</div>
	<!-- About Company Area End -->
	<!-- About Company Two Area Start -->
	<div class="company__two section-padding pt-0">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-7 lg-mb-30">
					<div class="company__two-left">
						<div class="company__two-left-title">
							<span class="subtitle-one">Who we are</span>
							<h2>We are <?= $company_name ?></h2>
							<p class="">
								Our commitment to innovation extends to the blockchain domain. We equip various
								industries with data-driven solutions that leverage the transformative potential of
								blockchain technology. By integrating blockchain into their operations, businesses can
								enhance transparency, security, and efficiency, thereby staying at the forefront of
								technological advancements.
								<br><br>
								For individuals and organizations seeking optimized portfolio performance and superior
								wealth management strategies, <?= $company_name ?> is the preferred partner. Our
								data-driven insights and expertise offer invaluable guidance for effectively managing
								portfolios. We assist in making informed investment decisions, minimizing risks, and
								maximizing returns.
							</p>
						</div>
						<div class="company__two-left-skill">
							<div class="company__two-left-skill-item">
								<h2><span class="counter">89</span>k</h2>
								<h6>Investments Completed</h6>
							</div>
							<div class="company__two-left-skill-item">
								<h2><span class="counter">794</span>k</h2>
								<h6>happy clients worldwide</h6>
							</div>
						</div>
						<a class="btn-two" href="indexcca3.html?a=signup">Discover more<i class="far fa-chevron-double-right"></i></a>
					</div>
				</div>
				<div class="col-xl-6 col-lg-5">
					<div class="company__two-right dark__image t-right">
						<img class="img__full" src="assets/img/about/about-9.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Company Two Area End -->

	<!-- Certification Area Start -->

<div class="certification__area section-padding pt-0">
    <div class="container">
        <div class="row align-items-center">

```
        <!-- Certificate Image -->
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="certification__image text-center">
                <img src="assets/img/cert.png" alt="Company Certification" class="img-fluid cert-image">
            </div>
        </div>

        <!-- Certificate Content -->
        <div class="col-lg-6">
            <div class="certification__content">
                <span class="subtitle-one">Certified & Trusted</span>
                <h2>Licensed & Verified Investment Platform</h2>

                <p>
                    At <?= $company_name ?>, trust and transparency are at the core of everything we do.
                    Our certifications and compliance standards reflect our commitment to providing secure,
                    reliable, and professional investment services to clients worldwide.
                </p>

                <p>
                    We continuously uphold industry best practices, ensuring that our operations meet
                    recognized standards for security, accountability, and financial excellence.
                    This commitment allows our investors to engage with confidence and peace of mind.
                </p>

                <div class="certification__features">
                    <div class="cert-item">
                        <i class="far fa-check-circle"></i>
                        <span>Verified Business Operations</span>
                    </div>

                    <div class="cert-item">
                        <i class="far fa-check-circle"></i>
                        <span>Secure Investment Infrastructure</span>
                    </div>

                    <div class="cert-item">
                        <i class="far fa-check-circle"></i>
                        <span>Global Compliance Standards</span>
                    </div>
                </div>

                <a href="indexcca3.html?a=signup" class="btn-two">
                    Start Investing
                    <i class="far fa-chevron-double-right"></i>
                </a>
            </div>
        </div>

    </div>
</div>
```

</div>

<style>
.certification__area {
    background: #f8fafc;
}

.certification__image {
    padding: 20px;
}

.cert-image {
    max-width: 100%;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    transition: all 0.4s ease;
}

.cert-image:hover {
    transform: translateY(-8px);
}

.certification__content h2 {
    margin: 15px 0 20px;
}

.certification__features {
    margin: 25px 0;
}

.cert-item {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
    font-weight: 500;
}

.cert-item i {
    color: #22c55e;
    font-size: 18px;
}

.certification__content .btn-two {
    margin-top: 15px;
}
</style>

<!-- Certification Area End -->


<!-- Footer Area Start -->
<?php

require 'footer.php';


?>