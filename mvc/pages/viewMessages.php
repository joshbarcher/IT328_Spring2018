<?php
    require 'components/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class="list-group">
                <?php
                    foreach ($records as $record) {
                        echo "<li class='list-group-item'>
                                {$record['body']}</li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php
    require 'components/footer.php';
?>
