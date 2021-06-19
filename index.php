<?php include ('header.php')?>
<?php include ('includes/navbar/navbar.php')?>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <section class='main'>
<!--         <div class="main_ink">
            <img src="assets/images/ink-1.png" alt=""> -->
        </div>
            <div class='main_text'>
                <div class='main_text--aera'>
                     <h1 class='bounce-in-left'>Williams Chazal</h1>
                    <div class='bounce-in-left'> <h3 class="main_text--slogan">"Des idées au pluriel"</h3></div>
                    <div class="main_text--metier"><h2 class='bounce-in-right'>WebDesign  <span id="blue_text">Dev'Web</span></h2></div>
                        <a href="/Portfolio/includes/projets/projets.php"><div class="main_text--button">
                        Portfolio </div></a>
                </div>
            </div>
    </section>
    <section class="about-me">
        <div class="about-me_information">
            <h2>Qui suis je ?</h2>
            <p>Hello Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam officiis cum laboriosam ullam corporis assumenda dolores ex illum consectetur accusamus, expedita, perspiciatis illo odit sed sapiente debitis laudantium hic fuga.
            Amet quia qui aliquam quod, repellendus porro impedit soluta itaque veniam? A adipisci facere temporibus quam culpa aspernatur quibusdam est magni distinctio expedita. Sed vel error modi, sequi et ipsam!</p>
                <div class="about-me_information--button">
                     <div class="about-me_button">Curriculum Vitae</div> 
                </div>    
        </div>
        <div class="about-me_photo">
            <img src="assets/images/photo.png" alt="Williams Chazal portrait" class="portrait">
        </div>
        
    </section>
    <section class='skills'>Que sais je faire.</section>

    <section class='portfolio' id="portfolio_ancre">
    <?php include ('includes/projets/projets.php')?>
    </section>

    <section class='contact'>
        <div class="contact_titre"><h3>Contactez moi</h3></div>
<!--         <div class="contact_texte"></div> -->
        <div class="form">
        <?php include ('includes/contact-form/index.php')?>
        </div>
    </section>
 
    <?php include ('includes/footer/footer.php')?>
  <script src="scripts/main.js"></script>  
</body>
</html>
