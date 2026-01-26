<footer class="main-footer">

    <div class="footer-container">

        <img
                src="<?= BASE_URL ?>assets/images/logo_negativo.png"
                alt="Brand-X Nutrition"
                class="footer-logo"
        >

        <p class="footer-text">
            © <?= date('Y') ?> Brand-X Nutrition · Workout · Nutrition · Fit
        </p>

    </div>

</footer>
<script>
    function changeQty(amount) {
        const input = document.getElementById('cantidad');
        let value = parseInt(input.value) || 1;
        value += amount;
        if (value < 1) value = 1;
        input.value = value;
    }
</script>
