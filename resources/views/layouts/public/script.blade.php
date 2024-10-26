<!-- JavaScript Libraries -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('') }}/assets/public/lib/easing/easing.min.js"></script>
<script src="{{ url('') }}/assets/public/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ url('') }}/assets/public/lib/tempusdominus/js/moment.min.js"></script>
<script src="{{ url('') }}/assets/public/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="{{ url('') }}/assets/public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<script src="{{ url('') }}/assets/public/mail/jqBootstrapValidation.min.js"></script>
<script src="{{ url('') }}/assets/public/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="{{ url('') }}/assets/public/js/main.js"></script>
<!--For Newsletter Popup-->
<script>
    let preloader = document.querySelector('#preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.remove();
        });
    } else {
        console.log('Preloader not found');
    }

</script>
