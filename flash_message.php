<?php
    if(isset($_SESSION['message'])){?>
        <?php if($_SESSION['message']['type'] == 'success'){ ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>

        <?php if($_SESSION['message']['type'] == 'error'){ ?>
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>


        <?php if($_SESSION['message']['type'] == 'warning'){ ?>
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>

        <?php if($_SESSION['message']['type'] == 'info'){ ?>
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>
    <?php
    unset($_SESSION['message']);
    }
?>