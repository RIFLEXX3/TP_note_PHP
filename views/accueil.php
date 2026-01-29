<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon site Web</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>

    <body id="body">

        <script src="js/app.js"></script>

        <header id="header">
                <h1 id="titre">Mon site Web</h1>
                <p>Has autem provincias, quas Orontes ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.</p>
            <nav>
                <ul>
                    <li><a href="/today">today</a></li>
                    <li><a href="/login">login</a></li>
                    <!-- <li><a href="/region">régions</a></li> -->
                    <li><a href="/departement">départements</a></li>
                </ul>
            </nav>

            <button><a href="#footer">bas de page</a></button>
        </header>
        
        <aside>
            <h2>Menu</h2>
                <ul>
                    <li><a href="#part1">Partie 1</a></li>
                    <li><a href="#part2">Partie 2</a></li>
                    <li><a href="#part3">Partie 3</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <!-- <li><a href="html/page2.html">Page 2</a></li>
                    <li><a href="html/flexbox.html">flexbox</a></li> -->
                    <li><a href="/today">today</a></li>
                    <li><a href="/login">login</a></li>
                    <!-- <li><a href="/region">régions</a></li> -->
                    <li><a href="/departement">départements</a></li>
                </ul>
        </aside>

        <main id="main">
            <article>
                <section id="part1"> 
                    <h2> Partie 1 : ...</h2>
                    <img src="images/eye.jpg" alt="eye image">
                    <p>
                        Has autem provincias, quas <strong>Orontes</strong> ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.
                    </p>
                </section>

                <section id="part2">
                    <h2> Partie 2 : ...</h2>
                    <img src="images/eye.jpg" alt="">
                    <p>
                        Has autem provincias, quas <em>Orontes ambiens amnis imosque pedes Cassii</em> montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.
                    </p>
                </section>

                <section id="part3">
                    <h2> Partie 3 : ...</h2>
                    <img src="images/eye.jpg" alt="">
                    <p>
                        Has autem provincias, quas Orontes ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.
                    </p>
                </section>

                <section id="contact">
                    <form action="contact.php" method="get" id="contactform">
                        <h2>Formulaire de contact</h2>
                        <div>
                            <h3>Informations personnelles</h3>
                            <div>
                                <label for="name">Nom :</label>
                                <input type="text" id="name" name="name" placeholder="Nom" required>
                            </div>
                            <div>
                                <label for="surname">Prénom :</label>
                                <input type="text" id="surname" name="surname" placeholder="Prénom" required>
                            </div>
                            <div>
                                <label for="age">Age :</label>
                                <input type="date" id="age" name="age" required>
                            </div>
                        </div>
                        <div>
                            <h3>Création de compte</h3>
                            <div>
                                <label for="username">Pseudo :</label>
                                <input type="text" id="username" name="username" placeholder="Pseudo" required>
                            </div>
                            <div>
                                <label for="password">Mot de passe :</label>
                                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                            </div>                
                            <div>
                                <fieldset>
                                    <legend>Voulez-vous être abonné à notre Newsletter ?</legend>
                                    <div>
                                        <input type="radio" id="oui" name="newsletter" value="oui" checked />
                                        <label for="huey">Oui</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="non" name="newsletter" value="non" />
                                        <label for="non">Non</label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <input type="submit" value="Envoyer">
                    </form>
                </section>

            </article>
        </main>

        <footer id="footer">
                <p><a href="mailto:raphael.gonzo@ensg.eu" id="mail">Raphaël GONZO-MASSOL</a> &copy; 2025 Mon site Web</p>
                <button><a href="#body">Haut de page</a></button>
        </footer>

    </body>
</html>