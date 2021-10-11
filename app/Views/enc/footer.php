<script src="source/jquery-3.4.1.min.js"></script>
<script src="source/bootstrap.bundle.min.js"></script>
<script src="dropify/dropify.js"></script>
<script src="source/script.js"></script>
<script src="https://kit.fontawesome.com/fec388d915.js" crossorigin="anonymous"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    function format_number() {
        var phone_number = document.getElementById('telepon');
        var regex_cell = /(\d{1})(\d{3})(\d{4})(\d{4})/g;
        var new_value = phone_number.value.replace(regex_cell, "(+62)$2-$3-$4");
        phone_number.value = new_value;

    }
</script>
<script>
    function format_number_edit() {
        var phone_number_edit = document.getElementById('phone_number_edit');
        var regex_cells = /(\d{1})(\d{3})(\d{4})(\d{4})/g;
        var new_value = phone_number_edit.value.replace(regex_cells, "(+62)$2-$3-$4");
        phone_number_edit.value = new_value;
    }
</script>
</body>

</html>