<?php

include 'inc.config.php';

UserSession::unset_session();

Helpers::redirect('signin.php');