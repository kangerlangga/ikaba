    <!-- Footer Start -->
    <div class="footer">
        <div class="copyright">
            <div class="container">
                <p>Copyright &copy; <?= date("Y")?> : <a href="{{ route('home.publik') }}"><b>IKABA RAMBAK</b></a> - All Rights Reserved</p>
                {{-- <p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p> --}}
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!--Div where the WhatsApp will be rendered-->
    <div id="cpWA"></div>
    <script type="text/javascript">
    $(function () {
        $('#cpWA').floatingWhatsApp({
        phone: '6282228220233',
        size: '70px',
        position: "right"
        });
    });
    </script>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
