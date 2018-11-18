<div id="content_container">
    <div id="content">
        <?php
            if(isset($this->errorFunction)) {
                echo "An error has been reported by <b>" . $this->errorFunction . "</b><br /><br />";

                echo "The error message was: <br /><br />";
            } else {
                echo "This page has encountered an error<br /><br />";

                echo "The error message was: <br /><br />";
            }

            echo "<span style=\"margin-left: 20px; color: red;\">" . $this->errorMessage . "</span>";
        ?>
    </div>
</div>