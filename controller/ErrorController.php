<?php

declare(strict_types=1);
class NotFound {
    public function errorNotFound() : void {
        require_once('../view/error-view.php');
    }
}
