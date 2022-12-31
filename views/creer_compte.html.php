<main class="creer_compte">
        <section class="side-bar-left">
            <form action="index.php" method="post">
                    <header class=" sous-titre title">
                           <h6>CREATION DE COMPTE</h6> 
                    </header>
                    <div class="nom">
                        <label for="nom"></label>
                        <input type="text" name="nom" id="nom" placeholder="NOM">
                    </div>
                    <div class="prenom">
                        <label for="prenom"></label>
                        <input type="text" name="prenom" id="prenom" placeholder="PRENOM" >
                    </div>
                    <div class="login">
                        <label for="login"></label>
                        <input type="text" name="login" id="login" placeholder="LOGIN" required>
                    </div>
                    <div class="password">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="PASSWORD" required>
                    </div>
                    <div class="submit">
                        <button type="submit"  name="btnsave" value="creer_c"><p>VALIDER</p>  </button>
                    </div>
                    <p>
                        Deja un compte <a href="index.php?view=connexion" style="color:var(--blue); ">Connecter vous</a>
                    </p>
            </form>
        </section>
        
</main>