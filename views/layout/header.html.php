<header class="principal">
        <section>
            <div class="invisible">
                    <p><a href="" class="header">
                        <i class="fas fa-book-open"></i> &nbsp
                        PRÊT
                    </a></p>
            </div>
            <div class="user">
                    <p><a href="index.php?view=deconnexion" class="header">
                        <!-- <i class="fa-solid fa-user" style="color:white;"></i>  -->
                        <i class="fas fa-user"></i> &nbsp
                        <?php if(isset($_SESSION["user"])){
                            $x=$_SESSION['user']["nom"]." ".$_SESSION["user"]["prenom"];
                            echo($x);
                        }else{
                            echo("Connecter Vous");
                        } 
                        ?>
                    </a></p>
            </div>
        </section>
            
</header>