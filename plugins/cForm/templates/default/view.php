<?php $config = Config::getInstance(); $token = $this->config->get('SECRET'); $_SESSION['csrf_token'] = $token; ?>

<form id="cf_form" class="mad-form--fields-white">

    <div id="form-messages"></div>

    <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">

    <div class="form-group">
        <div class="form-col">
            <input type="text" id="cf_name" name="cf_name" class="form-control" placeholder="<?php echo $data['LANG']['FULLNAME_PLACEHOLDER'] ?>">
        </div>
    </div>

    <!-- Checking e-mail -->
    <div class="form-group">
        <div class="form-col">
            <input type="text" id="cf_email" name="cf_email" class="form-control" placeholder="<?php echo $data['LANG']['EMAIL_PLACEHOLDER'] ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="form-col">
            <textarea id="cf_message" name="cf_message" rows="7" class="form-control" placeholder="<?php echo $data['LANG']['MESSAGE_PLACEHOLDER'] ?>"></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="form-col">
            <button type="submit" class="submit-btn"><?php echo $data['LANG']['SUBMIT'] ?></button>
        </div>
    </div>
</form>