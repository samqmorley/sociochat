<?php
use SocioChat\Enum\SexEnum;
use SocioChat\Enum\TimEnum;
use SocioChat\Forms\Rules;

if (!defined('ROOT')) {
    die('not allowed');
}
?>
<div class="panel panel-default tab-pane" id="profile">
    <div class="panel-heading"><?= $lang->getPhrase('index.ProfileTip') ?></div>
    <div class="panel-body">
	    <div class="notifications"></div>
        <p><?= $lang->getPhrase('profile.NameChangePolicy', floor($config->nameChangeFreq / 3600)) ?></p>

        <div class="row btn-vert-block form-group">
            <div class="col-md-3 btn-vert-block">
                <input type="text" class="form-control" placeholder="<?= $lang->getPhrase('profile.Name') ?>"
                       id="profile-nickname">
            </div>
            <div class="col-md-3 btn-vert-block">
                <input type="text" class="form-control" placeholder="<?= $lang->getPhrase('profile.City') ?>"
                       id="profile-city">
            </div>
            <div class="col-md-2 btn-vert-block">
                <select class="form-control" id="profile-tim">
                    <option selected disabled><?= $lang->getPhrase('profile.TIM') ?></option>
                    <?php foreach (TimEnum::getList() as $tim) { ?>
                        <option value="<?= $tim->getId() ?>"><?= $tim->getName() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2 btn-vert-block">
                <select class="form-control" id="profile-sex">
                    <option selected disabled><?= $lang->getPhrase('profile.Sex') ?></option>
                    <?php foreach (SexEnum::getList() as $sex) { ?>
                        <option value="<?= $sex->getId() ?>"><?= $sex->getName() ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2 btn-vert-block">
                <select class="form-control" id="profile-year">
                    <option selected disabled><?= $lang->getPhrase('profile.Birth') ?></option>
                    <?php foreach (Rules::getBirthYearsRange() as $year) { ?>
                        <option value="<?= $year ?>"><?= $year ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="row btn-vert-block form-group">
            <div class="col-md-12 btn-vert-block">
                <div class="well well-sm">
                    <h5><?= $lang->getPhrase('profile.About') ?>:</h5>
                    <textarea class="form-control" rows="5" id="profile-about"></textarea>
                </div>
            </div>
        </div>

        <div class="row btn-vert-block form-group">
            <div class="col-md-12 btn-vert-block">
	            <div class="well well-sm">
	                <label class="checkbox-inline">
	                    <input type="checkbox" id="profile-censor"/> <?= $lang->getPhrase('profile.Censor') ?>
	                </label>
                    <br>
		            <label class="checkbox-inline">
			            <input type="checkbox" id="profile-subscription"/> <?= $lang->getPhrase('profile.Subscription') ?>
		            </label>
	            </div>
            </div>
        </div>
        <div class="row btn-vert-block form-group">
	        <div class="col-md-12 btn-vert-block">
				<div class="well well-sm">
					<h5><?= $lang->getPhrase('profile.LineBreak') ?></h5>
					<label class="radio-inline">
						<input type="radio" name="profile-linebreak" value="0" checked> Ctrl+Enter
					</label>
					<label class="radio-inline">
						<input type="radio" name="profile-linebreak" value="1"> Enter
					</label>
				</div>
            </div>
        </div>
        <div class="row btn-vert-block form-group">
	        <div class="col-md-12 btn-vert-block">
	            <div class="well well-sm">
		            <h5><?= $lang->getPhrase('profile.MessageNotifications') ?></h5>
		            <label class="checkbox-inline">
			            <input type="checkbox" id="profile-notify-visual"/> <?= $lang->getPhrase('profile.NotifyVisual') ?>
		            </label>

		            <label class="checkbox-inline">
			            <input type="checkbox" id="profile-notify-sound"/> <?= $lang->getPhrase('profile.NotifySound') ?>
		            </label>

                    <h5><?= $lang->getPhrase('profile.OnlineNotifications') ?></h5>
                    <select class="form-control" id="profile-notify-online-limit">
                        <option value="0"><?= $lang->getPhrase('NotSpecified') ?></option>
                        <?php for($i=1; $i <= 50; $i++) { ?>
                            <option value="<?=$i?>"><?=$i?></option>
                        <? } ?>
                    </select>


                    <h5><?= $lang->getPhrase('profile.msgAnimation') ?>:</h5>
                    <select class="form-control" id="profile-msg-animation-type">
                        <option selected disabled><?= $lang->getPhrase('NotSpecified') ?></option>
                        <?php foreach (\SocioChat\Enum\MsgAnimationEnum::getList() as $animType) { ?>
                            <option value="<?= $animType->getId() ?>"><?= $animType->getName() ?></option>
                        <?php } ?>
                    </select>
	            </div>
            </div>

        </div>

        <div class="row btn-vert-block">
            <div class="btn-vert-block col-sm-12">
                <a class="btn btn-block btn-success" id="set-profile-info"><?= $lang->getPhrase('Save') ?></a>
            </div>
        </div>
    </div>

    <div class="panel-heading" style="border-top: 1px solid #ddd;">
	    <?= $lang->getPhrase('profile.AvatarHeading') ?>
    </div>
    <div class="panel-body" id="profile-avatar">
	    <p><?= $lang->getPhrase('profile.AvatarTip') ?> <?= $config->uploads->avatars->maxsize / 1024 ?>KB</p>
        <div class="row btn-vert-block form-group">
            <div class="col-sm-3 btn-vert-block">
				<span class="btn btn-success btn-file">
					<?= $lang->getPhrase('profile.Browse') ?> <input type="file" class="upload" accept="image/*"
                                                                     name="img">
				</span>
            </div>
	        <div class="col-sm-3 btn-vert-block">
		        <a class="btn btn-block btn-danger" id="remove-avatar"><?= $lang->getPhrase('profile.Delete') ?></a>
	        </div>

        </div>
        <div class="row btn-vert-block form-group">
            <div class="col-sm-12 btn-vert-block">
                <p><?= $lang->getPhrase('profile.Preview') ?></p>

                <div class="img-thumbnail avatar-placeholder"
                     style="max-width: 100%; max-height: <?= $config->uploads->avatars->maxdim ?>px">
	                <div class="user-avatar">
	                    <span class="glyphicon glyphicon-user"></span>
	                </div>
                </div>
            </div>
        </div>
        <div class="progress progress-striped active" style="display: none">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                 style="width: 0%">
                <span class="sr-only">0% Complete</span>
            </div>
        </div>
        <div class="alert" style="display: none"></div>
        <div class="row btn-vert-block do-upload" style="display: none">
            <div class="btn-vert-block col-sm-12">
                <a class="btn btn-block btn-success"><?= $lang->getPhrase('Save') ?></a>
            </div>
        </div>

    </div>

    <div class="panel-heading">
        <?= $lang->getPhrase('profile.Registration') ?>
    </div>
    <div class="panel-body" id="reg-panel">
        <p><?= $lang->getPhrase('profile.RegistrationTip') ?></p>

        <div class="row btn-vert-block form-group">
            <div class="btn-vert-block col-md-6">
                <input type="email" class="form-control" placeholder="<?= $lang->getPhrase('Email') ?>"
                       id="profile-email">
            </div>
            <div class="btn-vert-block col-md-6">
                <input type="password" class="form-control" placeholder="<?= $lang->getPhrase('Password') ?>"
                       id="profile-password">
            </div>
        </div>
        <div class="row btn-vert-block">
            <div class="col-md-12 btn-vert-block">
                <a class="btn btn-block btn-success" id="set-reg-info"><?= $lang->getPhrase('Save') ?></a>
            </div>
        </div>
    </div>
</div>
