<?php
    $this->start('css');
    echo $this->Html->css('maps/index');
    $this->end();
?>

	<div data-role="page" id="home">
		<div id="rightpanel" data-role="panel" data-position="right" data-theme="a" data-display="overlay">
			<table>
				<tr id="map2"></tr>
			</table>
			<a href="#" data-rel="close" data-role="button" data-icon="delete" data-theme="a" data-inline="true">閉じる</a>
		</div>
		<div data-role="header">
			<fieldset class="ui-grid-b">
				<div class="ui-block-a">
					<span id="title">Navigation Sample</span>
				</div>
				<div class="ui-block-b">
				</div>
				<div class="ui-block-c">
					<a href="javascript:void(0)" id="get_gps" data-icon="gps" data-role="button">現在地</a>
				</div>
			</fieldset>
		</div>
		<div data-role="content">
			<table>
				<tr id="map"></tr>
			</table>
			<div id="config" data-role="fieldcontain">
				<div data-role="fieldcontain" id="setting_start" class="setting-panel ui-hide-label">
					<form >
						<p>出発地点の設定</p>
						<label for="username">Username:</label>
						<input type="text" name="username" id="username" value="" placeholder="住所を入力" />
					</form>
				</div>
				<div data-role="fieldcontain" id="setting_finish" class="setting-panel ui-hide-label">
					<p>到着地点の設定</p>
					<label for="username">Username:</label>
					<input type="text" name="username" id="username" value="" placeholder="Username" />
				</div>
				<div data-role="fieldcontain" id="setting_waypoint" class="setting-panel ui-hide-label">
					<p>経由地点の設定</p>
					<label for="username">Username:</label>
					<input type="text" name="username" id="username" value="" placeholder="Username" />
				</div>
				<div data-role="navbar" data-iconpos="top">
					<ul>
						<li>
							<a id="start" href="javascript:void(0)" data-icon="marker-green" data-theme="a">出発</a>
						</li>
						<li>
							<a id="finish" href="javascript:void(0)" data-icon="marker-blue" data-theme="a">到着</a>
						</li>
						<li>
							<a id="waypoint" href="javascript:void(0)" data-icon="marker-gold" data-theme="a">経由地</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div data-role="footer">
			<fieldset class="ui-grid-a">
				<div class="ui-block-a">
					<a href="javascript:void(0)" id="map_switch" data-icon="plus" data-role="button">設定を出す</a>
				</div>
				<div class="ui-block-b">
					<a href="#rightpanel" data-role="button" data-icon="bars">ポイント選択
						<span id="count_node">0</span>
					</a>
				</div>
			</fieldset>
		</div>
	</div>

<?php
    $this->start('script');
    echo $this->Html->script('maps/index');
    $this->end();
?>
