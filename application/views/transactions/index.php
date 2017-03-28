<h2><?php echo $title; ?></h2>

<?php foreach ($transactions as $transaction): ?>

        <h3><?php echo "Transaction ID: {$transaction['transID']}"; ?></h3>
        <div class="main">
                <?php echo $transaction['type']; ?>
                <?php echo $transaction['amount']; ?>
        </div> 
        
<?php endforeach; ?>