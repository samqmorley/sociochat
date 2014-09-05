<?php
if (!defined('ROOT')) {
	die('not allowed');
}
?>
<div class="panel panel-default tab-pane" id="music">
	<div class="panel-heading">Музыка</div>
	<div class="panel-body">
		<div class="row btn-vert-block form-group">
			<div class="btn-vert-block col-md-6">
				<input type="text" class="form-control" placeholder="Введите имя артиста и/или название песни" name="song">
			</div>
			<div class="btn-vert-block col-md-6">
				<button class="btn btn-block btn-success ladda-button" data-style="zoom-out" id="do-music-search"><span class="ladda-label">Искать</span></button>
			</div>
		</div>
	</div>

	<div class="panel-body">
		<ul class="pagination"></ul>
		<table class="table table-striped">
			<tbody>
			</tbody>
		</table>
		<ul class="pagination"></ul>
	</div>
	<div class="panel-footer">
		<a class="btn btn-block btn-success return-to-chat"><?=$lang->getPhrase('index.Return')?></a>
	</div>
</div>