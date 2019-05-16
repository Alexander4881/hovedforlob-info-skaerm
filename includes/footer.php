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
                <div class="container">
                    <a href="#Test">
                        <div class="btn-group" role="group" aria-label="versionGroup">
                            <button class="btn pl-1 pr-1 bg-light text-dark">Version</span>
                            <button class="btn pl-1 pr-1 bg-success text-light">1.0.6</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </footer>

    <!-- Scripts -->
    <script src="<?= $_BOOTSTRAP_JS; ?>"></script>
    <script src="<?= $_BOOTSTRAP_JS_MIN; ?>"></script>
    <script src="<?= $_MAINJS; ?>"></script>
    </body>

    </html>