<?php
    if(isset($_SESSION['message'])){?>
        <?php if($_SESSION['message']['type'] == 'success'){ ?>
            <div class="alert alert-success alert-block" id="alert-message">
                <button type="button" class="close" data-dismiss="alert" id="message-sign" onclick="messageHide()">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>

        <?php if($_SESSION['message']['type'] == 'error'){ ?>
            <div class="alert alert-danger alert-block" id="alert-message">
                <button type="button" class="close" data-dismiss="alert" id="message-sign" onclick="messageHide()">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>


        <?php if($_SESSION['message']['type'] == 'warning'){ ?>
            <div class="alert alert-warning alert-block" id="alert-message">
                <button type="button" class="close" data-dismiss="alert" id="message-sign" onclick="messageHide()">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>

        <?php if($_SESSION['message']['type'] == 'info'){ ?>
            <div class="alert alert-info alert-block" id="alert-message">
                <button type="button" class="close" data-dismiss="alert" id="message-sign" onclick="messageHide()">×</button>
                <strong><?php echo $_SESSION['message']['text']; ?></strong>
            </div>
        <?php } ?>
    <?php
    unset($_SESSION['message']);
    }
?>