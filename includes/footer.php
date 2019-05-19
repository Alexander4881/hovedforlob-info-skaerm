<!-- Footer -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom shadow mt-4">
    <div class="container">
        <div class="d-flex justify-content-start">
            <blockquote class="blockquote text-light text-sm-left">
                <p class="mb-0 text-sm-left text-capitalize">all rights reserved.</p>
                <footer class="blockquote-footer">
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
                                echo 'Error in updating.';
                            }
                        }
                    ?>
                    &copy;
                    <?= 
                    auto_copyright($_COPYNUMBER);
                    $_RUDE;
                    ?>
                </footer>
            </blockquote>
        </div>
        <div class="d-flex justify-content-end">
            <li id="GitHubAPI" class="nav-link">
                <a href="#GitHubAPI" class="text-decoration-none text-sm-right d-flex flex-row" target="_blank">
                    <span class="rounded-left bg-white text-dark px-sm-2 py-sm-1 mx-auto">Version</span>
                    <div id="APIRelease" class="rounded-right bg-success text-white px-sm-2 py-sm-1 mx-auto">
                        <div class="circle-loader">
                            <span class="sr-only">Loading release...</span>
                            <div class="checkmark draw"></div>
                        </div>
                    </div>
                </a>                      
            </li>  
        </div>             
    </div>
</nav>

<!-- Scripts -->
<script src="<?= $_BOOTSTRAP_JS; ?>"></script>
<script src="<?= $_BOOTSTRAP_JS_MIN; ?>"></script>
<script src="<?= $_MAINJS; ?>"></script>
<script src="<?= $_APIJS; ?>"></script>
</body>
</html>