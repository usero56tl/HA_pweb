<div class="container">
    <?php $i = 0; while($questions[$i] != null) {?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><?php echo(htmlentities($questions[$i]['titre'])); ?> <?php if($questions[$i]['bmultiple'])echo("(plusieures reponses)"); else echo("(Une seule reponse)") ?></h3>
                        <h4><?php echo(htmlentities($questions[$i]['texte'])); ?></h4>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php $j = 0; while($reponses[$j] != null) {?>
                                <?php if($reponses[$j]['id_quest'] == $questions[$i]['id_quest']) { ?>
                                    <li class="list-group-item"><?php echo(htmlentities($reponses[$j]['texte_rep'])); ?>
                                        <span class="badge"><?php if($reponses[$j]['bvalide']) echo("vrai"); else echo("faux"); ?></span>
                                    </li>
                                <?php } ?>
                            <?php $j++; } ?>
                        </ul>
                        <form action="index.php?controle=professeur&action=questions" method="post">
                            <input type="submit" type="button" name="<?php echo($questions[$i]['id_quest'])?>" class="btn btn-danger" value="Modifier"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
</div>
