<h2><?php echo $title; ?></h2>

<?php foreach ($transactions as $transaction): ?>
		<?php echo "test"; ?>
        <h3><?php echo $transaction['transID']; ?></h3>
        <div class="main">
                <?php echo $transaction['type']; ?>
                <?php echo $transaction['amount']; ?>
        </div> 
        
<?php endforeach; ?>