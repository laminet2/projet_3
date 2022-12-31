<main class="connexion">
        <section class="side-bar-left">
            <form action="index.php" method="post">
                    <header class=" sous-titre title">
                           <h6>Connexion</h6> 
                    </header>
                    <div class="login">
                        <label for="login"></label>
                        <input type="text" name="login" id="login" placeholder="LOGIN" required>
                    </div>
                    <div class="password">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="PASSWORD" required>
                    </div>
                    <div class="submit">
                        <button type="submit"  name="btnsave" value="connexion"><p>VALIDER</p>  </button>
                    </div>
                    <p>
                            Nouvel adherent ,<a href="index.php?view=creer_compte" style="color:var(--blue); ">creer un compte</a>
                    </p>
            </form>
        </section>
        <section class="side-bar-right">
            <h1 class="title">
                BIBLIOTHEQUE DE L'ECOLE 221
            </h1>
        </section>
</main>