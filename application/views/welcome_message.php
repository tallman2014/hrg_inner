<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>大火溶内部网站</title>
	 
	<base href="<?php echo base_url() ;?>"/>
	<link rel="stylesheet" type="text/css" href="./css/main.css"/>
	
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery-1.7.2.min.js"?>></script>
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.scrollTo.js"?>></script>
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.nav.js"?>></script>
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/jquery.quicksand.js"?>></script> 
	<script type="text/javascript" src=<?php echo $this->config->item('base_url')."/scripts/easing.js"?>></script> 
	<script type="text/javascript">
		$(document).ready(function() {
			$(".navMenu").onePageNav();
			
	// Clone applications to get a second collection
	var $data = $(".portfolioItems").clone();
	
	//NOTE: Only filter on the main portfolio page, not on the subcategory pages
	$('.portfolioSort li a').click(function(e) {
		$(".portfolioSort li a").removeClass("activePSLink");	
		// Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
		var filterClass=$(this).attr('class').split(' ').slice(-1)[0];
		
		if (filterClass == 'all') {
			var $filteredData = $data.find('.portfolioItem');
		} else {
			var $filteredData = $data.find('.portfolioItem[data-type=' + filterClass + ']');
		}
		$(".portfolioItems").quicksand($filteredData, {
			duration: 800,
			easing: 'swing',
		});		
		$(this).addClass("activePSLink"); 			
		return false;
	});
	
		});
					function showfolio(number){
			$.ajax({
			type: 'POST',
			dataType:'html',
  url: "portfolio.php?id="+number,
  success: function(data) { 
  //alert(data);
  $(".portfolio-1").empty().append(data).slideDown();
}
			});}
function outhere(){
$(".portfolio-1").slideUp();}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<![endif]-->

<body>

	<div id="home">
		<div class="container">
			<div class="header">
				<div class="headerTop">
					<div class="headerTop-1 clearfix">
						<div class="headerLeft clearfix">
							<h1><a href="#">&nbsp;</a></h1>
							<p>大火溶内部网站</p>
						</div>
					<!-- 	<div class="headerRight clearfix">
						<form action="http://www.baidu.com/baidu" target="_blank">
								<table bgcolor="#FFFFFF"><tr><td>
									<input name=tn type=hidden value=baidu>
									<a href="http://www.baidu.com/"><img src="http://img.baidu.com/img/logo-80px.gif" alt="Baidu" align="bottom" border="0"></a>
									<input type=text name=word size=30 style="width:140px;">
									<input type="submit" value="百度搜索">
									</td></tr>
								</table>
						</form>
						
						</div> -->
					</div>
				</div>
				<div class="headerBottom">
					<div class="headerBottom-1 clearfix">
						<ul class="navMenu clearfix">
							<li><a href="#home">Home</a></li>
							
							<li><a href="#services">新闻公告</a></li>
							<li><a href="#portfolio">文件下载</a></li>
							<li><a href="#about_us">我要订饭</a></li>
						</ul>
						<div class="info clearfix">
							<p class="emailAddress"><a href="https://192.168.0.196/oss">登陆啪啪三国内网oss</a></p>
						<!-- 	<p class="phoneNum">1-123-456-7890</p> -->
						</div>
					</div>
					<div class="menuBottom"></div>
				</div>
			</div>
			<div class="content">
				<div class="home-1">
					<h1>Hey ! I am<br /><span>Business <span class="agencySpan">Agency</span></span></h1>
					<p>
						Aenean lacinia bibendum nulla sed consectetur. Cras mattis 
						consectetur purus sit amet fermentum. Donec id elit non 
						mi porta gravida at eget.
					</p>
					<a href="#" class="checkPortfolio">Check our Portfolio</a>
				</div>
				<div class="home-2">
					<div class="home-2-center clearfix">
						<div class="skills">
							<div><img src="images/skill-image1.png" alt="minimal design" /></div>
							<p>Minimal Design</p>
						</div>
						<div class="skills">
							<div><img src="images/skill-image2.png" alt="minimal design" /></div>
							<p>Easy Installation</p>
						</div>
						<div class="skills">
							<div><img src="images/skill-image3.png" alt="minimal design" /></div>
							<p>Browser Support</p>
						</div>
						<div class="skills">
							<div><img src="images/skill-image4.png" alt="minimal design" /></div>
							<p>SEO Friendly</p>
						</div>
						<div class="skills">
							<div><img src="images/skill-image5.png" alt="minimal design" /></div>
							<p>Unlimited Versions</p>
						</div>
						<div class="weCreate">
							<h2>
								We create Clean, Modern and Eye Catching websites which helps your
								business to grow better...
							</h2>
						</div>
					</div>
				</div>
				<div class="home-3">
					<div class="home-3-center">
						<div>
							<h3>
								Check out the great features of the theme and purchase 
								<span>Awesome now....</span>
							</h3>
							<p>
								Awesome is available for the ridiculously low, one-time cost of $35! That's 
								right, I'm practically giving it away!
							</p>
						</div>
						<a href="#" class="purchaseTheme">Purchase the Theme</a>
					</div>
				</div>
				<div class="home-4 clearfix">
					<div class="home-apps home-apps1">
						<h4>Web Application</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
					<div class="home-apps home-apps2">
						<h4>Mobile Apps</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
					<div class="home-apps home-apps3">
						<h4>iPAD Application</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
				</div>
			</div>
		</div><!-- HOME SECTION END -->
	</div>
	
	<div id="services">
		<div class="container">
			<div class="content">
				<div class="contentTitle1">
					<h1>新闻公告</h1>
				</div>
				<div class="contentTitle2">
					<p>Check out the great features of the theme and purchase <span>Awesome now</span>....</p>
				</div>
				<div class="services-1 clearfix">
					<div class="home-apps home-apps1">
						<h4>Web Application</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
					<div class="home-apps home-apps2">
						<h4>Mobile Apps</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
					<div class="home-apps home-apps3">
						<h4>iPAD Application</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
					<div class="home-apps home-apps1">
						<h4>Web Application</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
					<div class="home-apps home-apps2">
						<h4>Mobile Apps</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
					<div class="home-apps home-apps3">
						<h4>iPAD Application</h4>
						<p>Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</p>
					</div>
				</div>
			</div>
		</div><!-- SERVICES SECTION END -->
	</div>

	<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
	<div id="portfolio">
		<div class="container">
			<div class="content">
				<div class="contentTitle1">
					<h1>文件下载</h1>
				</div>
				<div class="contentTitle2">
					<p>这里有一些可以下载的文件 <span>求带走</span>....</p>
				</div>
				<div class="portfolio-1">
				</div>
				
				<div class="portfolio-2">
					<ul class="portfolioSort clearfix">
						<li><a href="javascript:;" class="activePSLink all">All</a></li>
						<li><a href="javascript:;" class="illustration">Illustration</a></li>
						<li><a href="javascript:;" class="design">Website Design</a></li>
						<li><a href="javascript:;" class="photography">Photography</a></li>
						<li><a href="javascript:;" class="print">Print Media</a></li>
						<li><a href="javascript:;" class="wp">Wordpress Themes</a></li>
					</ul>
					<div class="portfolioItems clearfix">
											<div class="portfolioItem" data-type="design" data-id="223">
						<a href="javascript:showfolio('1');">
							<img src="images/portImage1.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('1');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
												<div class="portfolioItem" data-type="wp" data-id="223w">
						<a href="javascript:showfolio('2');">
							<img src="images/portImage2.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('2');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
												<div class="portfolioItem" data-type="photography" data-id="22ss3">
						<a href="javascript:showfolio('3');">
							<img src="images/portImage3.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('3');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
												<div class="portfolioItem portItemFix" data-type="design" data-id="22aa3">
						<a href="javascript:showfolio('4');">
							<img src="images/portImage4.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('4');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
												<div class="portfolioItem" data-type="illustration" data-id="2a23">
						<a href="javascript:showfolio('5');">
							<img src="images/portImage5.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('5');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
												<div class="portfolioItem" data-type="wp" data-id="2as23">
						<a href="javascript:showfolio('6');">
							<img src="images/portImage6.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('6');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
												<div class="portfolioItem" data-type="illustration" data-id="22d3">
						<a href="javascript:showfolio('7');">
							<img src="images/portImage7.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('7');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
												<div class="portfolioItem portItemFix" data-type="print" data-id="223aa">
						<a href="javascript:showfolio('8');">
							<img src="images/portImage8.jpg" alt="portfolio item image" />
							</a>
							<a href="javascript:showfolio('8');"><h2>Simpler Landing</h2></a>
							<p>Although starting a prototype is the inviation to the is sometimes</p>
						</div>
					</div>
				</div>
				
				<div class="portfolio-3">
					<div class="slideshow  slideshow2 clearfix">
						<div class="slideshowImage">
							<img src="images/slide2Image1.jpg" alt="slide image" />
							<div class="slideNav slideNav2 clearfix">
								<a href="#" class="prev"></a>
								<a href="#" class="next"></a>
								<a href="#" class="exit"></a>
							</div>
						</div>
						<div class="slideshowText">
							<h2>Simpler Landing Page</h2>
							<p class="jobDesc">Web Design&amp; Development</p>
							<p class="client"><span>Client:</span> Theme Forest</p>
							<p>
								Sed ut perspiciatis unde omnis iste natus error sit voluptatemtam 
								rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
								explicabo. Donec ut volutpat metus. Aliquam tortor lorem,  
								Sed ut perspiciatis unde omnis iste natus error sit voluptatem
								rem aperiam, eaque ipsa quae ab illo inventore veritatis.
							</p>
							<a href="#" class="readMore">Visit Website</a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- PORTFOLIO SECTION END -->
	</div>
	

	
	<div id="about_us">
		<div class="container">
			<div class="content">
				<div class="contentTitle1">
					<h1>鲜粥 <span>道</span></h1>
				</div>
				<div class="contentTitle2">
					<p>深思一下今天想吃什么 <span>可以开始点了</span>....</p>
				</div>
				<div class="aboutUs-1 clearfix">
					<div class="aboutUs-left">
						<p class="aboutPara1">
							<span>Etiam eget mi enim, non ultricies nisi voluptatem, illo inventore veritatis et quasi architecto beatae 
							vitae dicta sunt explicabo nemo enim ipsam voluptatem.</span><br /><br />

							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam 
							rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt 
							explicabo. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu. 
							Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam 
							rem aperiam, eaque ipsa quae ab illo inventore veritatis.
						</p>
						<h2>
							"<span>Awesome</span> is available for the ridiculously low, one-time cost of <span>$35!</span> 
							That's right, I'm practically giving it away!”
						</h2>
						<div class="aboutUs-readMore clearfix">
							<img src="images/aboutUsImage.jpg" alt="image" />
							<div>
								<p>
									Sed ut perspiciatis unde omnis iste natus error sit 
									rem aperiam, eaque ipsa quae ab illo inventore 
									explicabo. Donec ut volutpat metus. Aliquam tortor
									Sed ut perspiciatis unde omnis..
								</p>
								<a href="<?php echo site_url('/meal/meal_book/')?>" class="readMore">Read more</a>
							</div>
						</div>
					</div>
					<div class="aboutUs-right">
						<h2>Our <span>Team</span></h2>
						<div class="teamMember">
							<div class="teamMember1">
								<img src="images/teamMember.jpg" alt="team member" />
								<h3>Gretchen J. Mcdonald</h3>
								<p class="memberRole">Financial Advisor <span>+123 456 789</span></p>
								<p>
									Lonsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
									dolore magn Praesent dapibus,
								</p>
							</div>
							<div class="teamMember2">
								<span>Follow Me</span>
								<a href="#"><img src="images/follow1.gif" alt="follow me" /></a>
								<a href="#"><img src="images/follow2.gif" alt="follow me" /></a>
								<a href="#"><img src="images/follow3.gif" alt="follow me" /></a>
							</div>
						</div>
						<div class="teamMember">
							<div class="teamMember1">
								<img src="images/teamMember.jpg" alt="team member" />
								<h3>Gretchen J. Mcdonald</h3>
								<p class="memberRole">Financial Advisor <span>+123 456 789</span></p>
								<p>
									Lonsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
									dolore magn Praesent dapibus,
								</p>
							</div>
							<div class="teamMember2">
								<span>Follow Me</span>
								<a href="#"><img src="images/follow1.gif" alt="follow me" /></a>
								<a href="#"><img src="images/follow2.gif" alt="follow me" /></a>
								<a href="#"><img src="images/follow3.gif" alt="follow me" /></a>
							</div>
						</div>
						<div class="teamMember">
							<div class="teamMember1">
								<img src="images/teamMember.jpg" alt="team member" />
								<h3>Gretchen J. Mcdonald</h3>
								<p class="memberRole">Financial Advisor <span>+123 456 789</span></p>
								<p>
									Lonsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
									dolore magn Praesent dapibus,
								</p>
							</div>
							<div class="teamMember2">
								<span>Follow Me</span>
								<a href="#"><img src="images/follow1.gif" alt="follow me" /></a>
								<a href="#"><img src="images/follow2.gif" alt="follow me" /></a>
								<a href="#"><img src="images/follow3.gif" alt="follow me" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- ABOUT US SECTION END -->
	</div>
	
	
	
	
	
	<div id="footer">
		<div align="center">
			<p>Copyright &copy; 2012-2014 &nbsp;.&nbsp;HRG All rights reserved.</p>
		</div>
	</div>

</body>
</html>