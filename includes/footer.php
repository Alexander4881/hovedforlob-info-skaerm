    <!-- Footer -->
    <footer class="border-top footer text-light bg-dark">
        <div class="container">
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
    </footer>

    <!-- Scripts -->
    <script src="<?= $_BOOTSTRAP_JS; ?>"></script>
    <script src="<?= $_BOOTSTRAP_JS_MIN; ?>"></script>
    <script src="<?= $_MAINJS; ?>"></script>
</body>
</html>