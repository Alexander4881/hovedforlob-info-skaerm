    <!-- Footer -->
    <footer class="text-light bg-dark zIndex100 fixed-bottom p-3">
        <div class="container clearfix">
            <div class="float-left">
            <?php
            function auto_copyright ($year = 'auto')
                { 
                    if(intval($year) == 'auto')
                    { 
                        $year = date('Y'); 
                    }
                    else if(intval($year) == date('Y'))
                    {
                        echo intval($year); 
                        }
                    else if(intval($year) < date('Y'))
                    { 
                        echo intval($year) . ' - ' . date('Y'); 
                    }
                    else if(intval($year) > date('Y'))
                    { 
                        echo date('Y'); 
                    }
                    else {
                        echo 'Error in updating';
                    }
                }
            ?>
            &copy;
            <?= 
            auto_copyright($_COPYNUMBER);
            $_RUDE;
             ?>
            </div>
            <div class="float-right">
            <i class="fas fa-tag"></i><span class="ml-2">Version: 1.0.3</span>
            </div>

        </div>
    </footer>

    <!-- Scripts -->
    <script src="<?= $_BOOTSTRAP_JS; ?>"></script>
    <script src="<?= $_BOOTSTRAP_JS_MIN; ?>"></script>
    <script src="<?= $_MAINJS; ?>"></script>
</body>
</html>