<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
            <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">Inscription</h3>
            </div>
            <div class="panel-body">
                
                    <form action="index.php?controle=utilisateur&action=inscription" method="post" class="form-horizontal row-border">
                        <label>Type de compte :</label>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label"><input class="form-check-input" type="radio" name="typeUser" value="etudiant" onclick="afficher('visible')" >Etudiant</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label"><input class="form-check-input" type="radio" name="typeUser" value="professeur" onclick="afficher('hidden')">Professeur</label>
                        </div>
                        
                        <br>
                        <div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input name="nom" type="text" class="form-control" placeholder="Nom" /> 
                            </div>
                            <div class="form-group">
                                <label>Prénom</label>
                                <input name="prenom" type="text" class="form-control" placeholder="Prénom" /> 
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Email" /> 
                            </div>
                            <div class="form-group">
                                <label>Nom d'utilisateur</label>
                                <input name="login" type="text" class="form-control" placeholder="Nom d'utilisateur" /> 
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input name="pass" type="password" class="form-control" placeholder="Mot de passe" /> 
                            </div>
                            <div class="form-group">
                                <label>Mot de passe (vérification)</label>
                                <input name="passVerif" type="text" class="form-control" placeholder="Mot de passe (vérification)" /> 
                            </div>
                            <div id="masquer"> <!-- Champs de l'étudiant -->
                                <div class="form-group">
                                    <label>Matricule</label>
                                    <input name="matricule" type="text" class="form-control" placeholder="Matricule" /> 
                                </div>
                                <div class="form-group">
                                    <label>Groupe</label>
                                    <input name="num-grpe" type="text" class="form-control" placeholder="Groupe" /> 
                                </div>
                            </div>
                            <input type="submit" button type="button" class="btn btn-danger" value="Connexion"/>
                            <input type="reset" button type="button" class="btn btn-danger" value="Annuler"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
