<script>
    $( "form" ).submit(function( event ) {
        var form = this;
        swal({
                    title: "Enter Pin!",
                    text: "enter your pin number:",
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: "Enter pin number"
                },
                function(inputValue){
                    if (inputValue === false) return false;

                    if (inputValue === "") {
                        swal.showInputError("You need to enter your pin!");
                        return false
                    }

                    if (inputValue != <?php echo Auth::user()->pin_number; ?>) {
                        swal.showInputError("Enter Correct Pin number!");
                        return false
                    }
                    form.submit();
                    return true;
                });
        return false;
    });
</script>

