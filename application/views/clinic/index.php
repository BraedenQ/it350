<h2><?php echo $title; ?></h2>

<?php foreach ($clinics as $clinic): ?>
        <h3><?php echo $clinic['name']; ?></h3>
        <div class="main">
                <?php echo $clinic['computer']; ?>
        </div> 
         <p><a href="<?php echo $clinic['name'] ?>">View Person</a></p> 

<?php endforeach; ?>