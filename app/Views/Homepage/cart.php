<?= $this->include('Homepage/inc/top');?>
<?= $this->include('Homepage/inc/navbar');?>
<?= $this->include('Homepage/inc/cart/carthead');?>
<?= $this->include('Homepage/inc/cart/itemcart');?>
<?= $this->include('Homepage/inc/footer');?>
<script src="https://code.jquery.com/jquery-3.5.0.slim.js" integrity="sha256-sCexhaKpAfuqulKjtSY7V9H7QT0TCN90H+Y5NlmqOUE=" crossorigin="anonymous"></script>
<script>
    $('#checkout').click(function(){
        $('#submit').click();
    })
</script>
<?= $this->include('Homepage/inc/end');?>