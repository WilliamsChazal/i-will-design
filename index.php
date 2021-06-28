<?php
    require_once('admin/db-connect.php');
    $_sql = 'SELECT * FROM `projets`';
    $query = $db->prepare($_sql);
    $query ->execute();
    $result = $query->fetchALL(PDO::FETCH_ASSOC);
?>


<?php include ('header.php')?>
<?php include ('includes/navbar/navbar.php')?>

        <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

            <section class='main'>
            <?php include ('sections/landing/landing.php')?>

            </section>
            <section class="about-me" id="about-me_ancre">
                
            <?php include ('sections/about-me/about-me.php')?>
            </section>

            <section >
                <?php include ('sections/skills/skills.php')?></section>

            <section class='portfolio' id="projet_ancre">
            <?php include ('sections/projets/projets.php')?>
            </section>

            <section class='contact' id="contact_ancre">
                <div class="contact_titre"><h3>Contactez moi</h3></div>
        <!--         <div class="contact_texte"></div> -->
                <div class="form">
                <?php include ('includes/contact-form/index.php')?>
                </div>
            </section>

    <?php include ('includes/footer/footer.php')?>
    
  <script src="scripts/main.js"></script>  
  <script src="sections/projets/projets.js"></script>
</body>
</html>
