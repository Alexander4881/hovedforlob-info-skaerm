<footer class="border-top footer text-muted">
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
        <?= auto_copyright($_COPYNUMBER) ?>
    </div>
</footer>
