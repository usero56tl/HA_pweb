<h3>Choisissez un test à lancer :</h3>
<div class="container">
    <?php $i = 0; while($tests[$i] != null) { ?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><?php echo(htmlentities($tests[$i]['titre_test'])) ?></h3>
                    </div>
                    <div class="panel-body">
                        <h4>Date de cr&eacuteation : <?php echo(htmlentities($tests[$i]['date_test'])) ?></h4>
                        <h4>Groupe : <?php echo(htmlentities($tests[$i]['num_grpe'])) ?></h4>
                        <form action="index.php?controle=professeur&action=lancerTest" method="post">
                            <div class="button"> 
                              <input type="submit" type="button" name="<?php echo($tests[$i]['id_test'])?>" class="btn btn-danger" value="Lancer"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++; } ?>
</div>
