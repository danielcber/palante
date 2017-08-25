<!-- ==== HEADERWRAP ==== -->
<!-- 	    <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
	  		</header>	    
	    </div><!/headerwrap -->
		

<ul id="slides">
    <li class="slide showing">
    	<img class="palanteimg" src="plugins/img/palantelogotransp.png" style="margin-top: -50px;">
        <p class="text-center" style="font-family: 'Raleway'; font-size: 24px;">Como tequeño de fiesta ¡estais en todas!</p>
    </li>
    <li class="slide">
    	<img class="palanteimg" src="plugins/img/palantelogotransp.png" style="margin-top: -50px;">
        <p class="text-center" style="font-family: 'Raleway'; font-size: 24px;">Como tequeño de fiesta ¡estais en todas!</p>
    </li>
    <li class="slide">
    	<img class="palanteimg" src="plugins/img/palantelogotransp.png" style="margin-top: -50px;">
        <p class="text-center" style="font-family: 'Raleway'; font-size: 24px;">Como tequeño de fiesta ¡estais en todas!</p>
    </li>
    <li class="slide">
    	<img class="palanteimg" src="plugins/img/palantelogotransp.png" style="margin-top: -50px;">
        <p class="text-center" style="font-family: 'Raleway'; font-size: 24px;">Como tequeño de fiesta ¡estais en todas!</p>
    </li>
    <li class="slide">
    	<img class="palanteimg" src="plugins/img/palantelogotransp.png" style="margin-top: -50px;">
        <p class="text-center" style="font-family: 'Raleway'; font-size: 24px;">Como tequeño de fiesta ¡estais en todas!</p>
    </li>
</ul>


<script type="text/javascript">
	console.log("SLIDE WORKS!");
	var slides = document.querySelectorAll('#slides .slide');
	var currentSlide = 0;
	var slideInterval = setInterval(nextSlide,10000);

function nextSlide() {
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}

</script>