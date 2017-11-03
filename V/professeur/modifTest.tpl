<h3>Modifier la question</h3>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <form action="index.php?controle=professeur&action=modifQuestion&quest=<?php echo($question['id_quest']); ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div class="form-group">
                            <label>Titre</label>
                            <input name="questTitre" type="text" class="form-control" placeholder="<?php echo($question['titre']); ?>" /> 
                        </div>
                        <div class="form-group">
                            <label>Enonc&eacute;</label>
                            <input name="questTexte" type="text" class="form-control" placeholder="<?php echo($question['texte']); ?>" /> 
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php $i = 0; while($question['reponses'][$i] != null) { ?>
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <label>Réponse<?php echo($i + 1); ?></label>
                                        <input name="<?php echo($question['reponses'][$i]['id_rep']); ?>" type="text" class="form-control" placeholder="<?php echo($question['reponses'][$i]['texte_rep']); ?>" /> 
                                    </div>
                                </li>
                            <?php $i++; } ?>
                        </ul>
                        <input type="reset" button type="button" class="btn btn-danger" value="Annuler"/>
                        <input type="submit" type="button" class="btn btn-danger" value="Modifier"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
