<section>
    <?php if(!isset($_GET['page']) || $_GET['page'] == 1):?>
    <?php elseif($_GET['page'] == 2):?>
    <article>
        <?php require_once "./views/viewObjetivos.php";?>
    </article>
    <aside>
        Paneles adicionales
    </aside>
    <?php elseif($_GET['page'] == 3):?>
    <?php endif;?>
</section>