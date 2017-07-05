<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <?php
            if(Auth::user()->numberConnexion == 0)
            {
                echo "<p class='lead' style='padding: 20px;background-color: darkred;color: white;'> Veuillez mettre à jour vos informations dans Paramétrage.</p>";
            }
            ?>
        </div>
    </div>
</div>