var map,map2;
var osm,osm2;
var vectorLayer,vectorLayer2;
var markers,markers2;

var icon_green = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAZCAYAAADe1WXtAAADZ0lEQVRIS6WVW0gUYRTHvxl3xnFXW0FXyx5SEw0VlSiVFFEUETS8JKSY6IOXLmSZmJdFW31IyFsv+iCxpuV1TYueEikixTuJl1AUNPIWWLnqzs7u6k5nBGVd9xbN0+7M+f/mzDn/cz4MWXb54VZ4vvZA+wjC/5iTYOYCEI7u8UjeM7erbsTK5IpcQ2sSQTNoSmcKak8KyDbhOWFYTkeOreiiCM19mEOtOa1KVsPWqxl1OYAPDMGNQYMJPvE2KCVImPA0gYJMj7XyTTlqzmymN75tzKv2VAnw4Ic+WB+K4SReQpCEOL0pne8b42vwK7VaLRp4PrDfX9PP7DP7GRDUqxuoC3WibKk3jh6OAVmvs2ztXezNlntlYgVJ06U0s8fI1Ar1HRAoOdERNBI+VxZxN0IQUxRDQqfNAo8CmB0Gtd9vVy58XPipUqiuw/1ZDOfhYsKGEGd3ZNt4XPMwCFubXUNLg0soICEACc8KDcaMtI+wPQU9KihNPpdpjshdVFc6XirAsNN9W/yyiJpSmg5BGI6hyrlKRJ2hDIJrImuU6zPrVRwFI23J6aSqJJ/gtOBT1J7CHjQkHUIsyyJrO2uU1piG/GL9TkGn3k2hjgcdS6od1aUjSCAlpD5JpiV8yu5kFpZkCrVEFQEVNP2LjoK3DR9nBtl2h2SGxMdXxpP6aZiraV9Zn3r01WgvNC1Vt/vcbxeeNW+xeLiY7+jqaHH3N+c3UW1k7a5GqXEH0ZY+FIETyr3CvYpyu3P5llLrouoUqzOrj7UabeORRr8xFPj1e3Z7tpNnmKdZ7oRsgpUVyBZgXH0gWGsMyt2/4XDBoUU8IRaYGgLO9BJ/Cc3ImXDQjOtmYHChgAPG48riLodmhRodLbCaaqx7rEu9q+Zm/8RlbEv5w9oblsxKbPjC0+Xl3FAfXb8Ly8QVaL8thSKST7YEpgbeTK5OttYVcUNQHV6tgMl5CPdfGCq8qSUtAostF34uFDh7Oh9rR9pG2L6SvjloDjdW7L9COYsVuga5Psl7nyfgxPQ2jSr8KmgAhsLfr8bsYe6MIqAMy5nSzPPe0d6oM6+TmeydbINzKsuU38xBOW0sLOyuDGmGoCGxQb6vPGzO9v9CEZwIg1aU1RXFluI2wF6aAnLPLMmUi/PHCZwbxVvGmqP7or8TlEQi3PFPpwAAAABJRU5ErkJggg=='
var icon_blue = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAZCAYAAADe1WXtAAADdUlEQVRIS6WVeUgUURzH30xz7cyWluii/rOdKpZ2WS6J2IEEVtoBJS5K2amlGbluWQoZWGmtQYeUmUdGtrjZP0F0kUWmImK1VGqJZFl0eO3Ozl6zvYnWNt0ren8N7/2+n/eb3/UQ4N2KQNFJOTxvPQDNBz1JEE8GAKCZGE6ckoZE433drcNmI7seap6607mD+hIkU+czNSg2Pa9B7B84C2jb74C6c1sNVqtVZTGxBRBsdQZ3BY3GSboxKjbFJzGthMIwYkw7MjgAqs6ksAP9r96YDLokePBhPHg8FEEx4hCE5Mv3XaXDFyU4/Uue58GDxhLL/VsnOYuZS4NGGkdDR2gASYkb/INmz9928KbYZ1qwx3DDGIPK01tYE6dXm7jRPVBgEER26EqMoNXL12Qx8ZvyCZhpj0C7AceOgBvluw1dnfe+GI36tXD/FYKiWD5OMvnpCrVoZliMU9invhegR9sE5ss2gilTA53atDyqtWkqs4281ZojeLrTXzLrTF5ZJ4MgE/PWo30MKk5u+AVCEBQUXnwHKHqKU7DqUIwBOlAsUBCCEr9ISi0NX7oidQJVU5kDnt27BGw2GyBFk0FyxmUwL2rdBGjncw2oL8/oMXIjoXbIEor2fXT0/FuagkLH5Y2nRk4Pju8NZVnd91VQ2zzmGSES35StTE9cJy/+U5S/6Z5iertWaWp9WKXhDCPJjtkXvoMwnOpWlLbTfpLpXmf/c/9roDocM2oxGWZA0bfxUICiRMGciLi8HcpG2ltq2ZFY/cf3nQqeN1+wa8YnhoLl1Zeeqw6YPTfOI7f9yQ1bw5Wst0ZOFw6NeVdQYX+jn0RarVS9ZNw1gVD0RTA5HDsk3N7m6IHTgUKIJretST62cFn8LtSVu7DUjG1N1+thewq9/9dyNaUiCVLcXHChSyRifCdwhWo4eyRuFA4TKTz84S0UEBRTHRUr37xhm4p0FAlNcFop0w/0affDcVrh7E/cDWl/DCd7D5x4zkiCQ8a0LQ9rbI01B7UmThcBN23/CoUlhuVKQ2SFmYV3GUHM6gZh54SxsBWFydPhKt6e3iicoOje1OxrwWELVsPe3sN1NKvr4Du13V29eYIK2gRfv+B6eXYtU16UMGwxG4TkDP0vFFCU+CmKixazo193Q1iVO6Bw5o2ngl0kOglX8Faz3FVyHC/6CXu5RSJn/DsFAAAAAElFTkSuQmCC'
var icon_gold = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAZCAYAAADe1WXtAAADG0lEQVRIS6WVa0zNcRjHP0ed0znnf0pv1IRJG7O1JVZozC0vDE0uCTNNDIktLLcsW+YyjN5UGw2NZhURprwRWxvpRbIkaTPMjKGbc07JKc9fyun0P5fN8+qc//95Pr/L8/0+fx2+RZSfH3scDvZKepu3Ep23hFGjSA/QczouGv3TF3TY7KyUmhpPdZ6gwYFmisNCmXc3H8vkcLhXDRszsfc6OG/rJlvADi24O+hsxcTtTYmMzj2I0WD4V/rpC6zJwNbYQnOnlUR588EV7ArVGfw5ZAwg69oZzAkLtQ/Z1wcnL/LreAHd9h5SJKvcOdMZGiLHvTllEtEVeVjGhXq7bahtgMTd2KxWyrpspEmFXa0ahMabTZTtS0E5uguDdNrn6PwBqYexV9Xw2WonQQobdf7+ZClGsu7kY5oXq81qaIZHz2DtEhgbop1zuZz+nTn0OHrZo+5025SJnGuuRNFptK26FpbvGACJvPj4GIIs2uDYJOzPmzipYnSBCi9yDxOZumroOoaqdh2DguvQ1y8wBYpOyT0uHgm98QC2HKFVrmPq4N5mBgdR/f4hZllgWPiyU6sNwhdj+9qGutyToQNbFEq3J7Hi7AGcVDnA93an+07xs/AG5aLb9c7dV3+HGQ28eXkPc8QEn5tPUyvEJNFl7yZCqr66QhHhZ8fHceD+Bcy+YmclY61vZH9vH/mDNa79Noo934m8QhbN9o4tvkt/Wg6vu34QKdnis4HQ8v7qiPEUtVSheDKBKvqJ8djaO1kgnDrnLWgOFJFO3Ym9zEjfgChTO9JF6FcrKBF7qt4fFu6m1DSLmScfqjGJ1EaEqoa4ddKcHsLl5XdfoShmilJWkJyXTYBzUb+YYPpqrI2vyJBhWqh1Dk9DeoxI7G39LZSpqlj+xiXxeMYJXnZZiZJHssTI8Pg5kWGTOSeao4+u8sdnbR3iHGmOiHyu/K13d9/evlF6kdjb0vOMWzr/j7e7SyopFltudQd0JynX/GXjQykRsBK/mY6/zWn/XyiBFmpMAcR8+YY6BK94Avq6UzVvml4vVuxlo7vmOC/0G8RX8w+A5cerAAAAAElFTkSuQmCC'
var icon_red = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAZCAYAAADe1WXtAAACu0lEQVRIS42VS0hVURSG/1Ndu9dr5SQhDZKgEASt6EkhkY16UFEUQRRU9LKBFhUh6KiCiGpSTaK6lAPtQS+imQ4ECwc90LAHSEVEEZWJV+1l385763jeCzbss89e/15r/f9e21I0Kxst1fyS9rH9S5iLFbZhlFQ1Vjq+QIo9kHrS0hp8WoP8gkDzx0kNhVLFHSlvGih3GZuk/h/SKcDr+CR4t/mBzk9KNzdLE05L8Ryb33vm66R0h9T1TVrN51snrBPUAuBwXKq9IuWu9MnxN+vHpJ9HpIF+aQufN+xb7aAFpHt9ujTjFukWhRWb/w8ZhJruk672Srv55AwpC1qZy4/9UrJeyoHpyEYJtBWw+9IHwE1yHdYYUqV+tbelRIUP1BPWWxjrGZN89lyUhvZIgzBXYyLdQconu4jSi7VmNqzIACEvvWOM9wGeQ8SPKbfBsajlU1guJQ0X7l42nGMYcgxYariOLrvGyjbpFeUoyYLMzZea38A4B4ywKJFSSxVD2CdpKdO2f5HlSU07pVUnIMoZRlhNIfj7eWRFlBuNrz3dQvT5spNop/rUzGv5GYuzpV60ZNwI1lFDQqyrlA7dAzgq7jyp75F0kKt7NuvjJCaOvF4jr4IlEVAbkBGKf47wSzNc/vXyUtFa8ki9QGJBl8CIfgrkfJUWM223x+DZUJBO+1FpVpVkpOlp/Bu8LDUSpbn7I8yvS5WjhjbaTwKpucyogf5qyClm+jkqqKhtihA2nJHo0f9tiOlMyKH1VXMlUZLbgpr0RCTWDbPJEpvfBcipljpJu4xlc4bLAp8Tms2BhVJ9C8DG0zxO5JuGpEVMOc/bwt6oGGjdTVLRMvy52wONPDFcy+1+gGY9DNTsWT4ZlgFOcjF6MuSgJH+LAiqaTGuC2/hR2gXUpSDAqJGafeWx4avIY+pNjv2gPz8koQtMCL5RAAAAAElFTkSuQmCC'

var size = new OpenLayers.Size(21, 25);
var offset = new OpenLayers.Pixel(-(size.w / 2), -size.h);
var marker_start = new OpenLayers.Icon(icon_green, size, offset);
var marker_finish = new OpenLayers.Icon(icon_blue, size, offset);
var marker_waypoint = new OpenLayers.Icon(icon_gold, size, offset);
var marker_present = new OpenLayers.Icon(icon_red, size, offset);

var pos_start;
var pos_finish;
var pos_waypoint = [];


function init() {
	// オプションの設定
	var options = {
		controls: [
			new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.Attribution(),
			new OpenLayers.Control.PanPanel(),
			new OpenLayers.Control.ZoomPanel(),
			new OpenLayers.Control.ScaleLine(),
			new OpenLayers.Control.TouchNavigation()
		]
	};

	// マップキャンバスの作成
	map = new OpenLayers.Map('map', options);

	// レイヤーの作成
	osm = new OpenLayers.Layer.OSM({
		'buffer': 1
	});
	vectorLayer = new OpenLayers.Layer.Vector();
	markers = new OpenLayers.Layer.Markers("Markers");

	// マップに追加
	map.addLayer(osm);
	map.addLayer(vectorLayer);
	map.addLayer(markers);

	// 基準点(現在地に設定)
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			// （1）位置情報の取得に成功した場合
			function(pos) {
				var point = new OpenLayers.Geometry.Point(pos.coords.longitude, pos.coords.latitude)
					.transform( // 座標を変換 ※重要
						new OpenLayers.Projection("EPSG:4326"),
						new OpenLayers.Projection("EPSG:900913")
				);
				// マップの中心点と倍率を指定する
				map.setCenter(new OpenLayers.LonLat(point.x, point.y), 15);

				markers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(point.x, point.y), marker_present));
			},
			// （2）位置情報の取得に失敗した場合(仮の地図ポイントを表示)
			function(error) {
				var point = new OpenLayers.Geometry.Point(141.34, 43.07)
					.transform( // 座標を変換 ※重要
						new OpenLayers.Projection("EPSG:4326"),
						new OpenLayers.Projection("EPSG:900913")
				);
				// マップの中心点と倍率を指定する
				map.setCenter(new OpenLayers.LonLat(point.x, point.y), 15);
			}
		);
	} else {
		var point = new OpenLayers.Geometry.Point(141.34, 43.07)
			.transform( // 座標を変換 ※重要
				new OpenLayers.Projection("EPSG:4326"),
				new OpenLayers.Projection("EPSG:900913")
		);
		// マップの中心点と倍率を指定する
		map.setCenter(new OpenLayers.LonLat(point.x, point.y), 15);
	}
};


function init2() {
	// オプションの設定
	var options = {
		controls: [
			//new OpenLayers.Control.Navigation(),
			new OpenLayers.Control.Attribution(),
			//new OpenLayers.Control.PanPanel(),
			//new OpenLayers.Control.ZoomPanel(),
			new OpenLayers.Control.ScaleLine(),
			//new OpenLayers.Control.TouchNavigation()
		]
	};

	// マップキャンバスの作成
	map2 = new OpenLayers.Map('map2', options);

	// レイヤーの作成
	osm2 = new OpenLayers.Layer.OSM({
		'buffer': 1
	});
	vectorLayer2 = new OpenLayers.Layer.Vector();
	markers2 = new OpenLayers.Layer.Markers("Markers");

	// マップに追加
	map2.addLayer(osm2);
	map2.addLayer(vectorLayer2);
	map2.addLayer(markers2);

	// 基準点(現在地に設定)
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			// （1）位置情報の取得に成功した場合
			function(pos) {
				var point = new OpenLayers.Geometry.Point(pos.coords.longitude, pos.coords.latitude)
					.transform( // 座標を変換 ※重要
						new OpenLayers.Projection("EPSG:4326"),
						new OpenLayers.Projection("EPSG:900913")
				);
				// マップの中心点と倍率を指定する
				map2.setCenter(new OpenLayers.LonLat(point.x, point.y), 15);

				markers2.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(point.x, point.y), marker_present));
			},
			// （2）位置情報の取得に失敗した場合(仮の地図ポイントを表示)
			function(error) {
				var point = new OpenLayers.Geometry.Point(141.34, 43.07)
					.transform( // 座標を変換 ※重要
						new OpenLayers.Projection("EPSG:4326"),
						new OpenLayers.Projection("EPSG:900913")
				);
				// マップの中心点と倍率を指定する
				map2.setCenter(new OpenLayers.LonLat(point.x, point.y), 15);
			}
		);
	} else {
		var point = new OpenLayers.Geometry.Point(141.34, 43.07)
			.transform( // 座標を変換 ※重要
				new OpenLayers.Projection("EPSG:4326"),
				new OpenLayers.Projection("EPSG:900913")
		);
		// マップの中心点と倍率を指定する
		map2.setCenter(new OpenLayers.LonLat(point.x, point.y), 15);
	}
};

function routing() {
	// 線のスタイル
	var style = {
		strokeColor: "#0000ff",
		strokeOpacity: 0.7,
		strokeWidth: 3,
		pointRadius: 6,
		pointerEvents: "visiblePainted"
	};

	var geojsonParser = new OpenLayers.Format.GeoJSON({
		'internalProjection': new OpenLayers.Projection("EPSG:900913"),
		'externalProjection': new OpenLayers.Projection("EPSG:4326")
	});

	var feature = [];
	jQuery(function($) {
		pos_waypoint.unshift(pos_start);
		var points = pos_waypoint.length;
		for (var i = feature.length; i < pos_waypoint.length; i++) {
			$.ajax({
				url: 'http://www.yournavigation.org/api/1.0/gosmore.php',
				type: 'GET',
				cache: false, // キャッシュOFF
				data: {
					format: "geojson",
					flat: pos_waypoint[i].lat,
					flon: pos_waypoint[i].lon,
					tlat: pos_finish.lat,
					tlon: pos_finish.lon,
					v: "motorcar",
					instructions: 1,
					lang: "ja"
				},
				// データのロード完了時の処理
				success: function(res) {
					content = $(res.responseText).text();
					console.log(content);
					feature[i] = geojsonParser.read(content, "Feature");
					feature[i][0].style = style;
					vectorLayer.addFeatures(feature[i]);
					console.log(feature[i][0]);
					console.log(feature[i][0].geometry.getLength());
				}
			});

		}
		pos_waypoint.shift();
	});
};

jQuery(function($) {
	$("#rightpanel table").css("height", innerHeight - $(".ui-footer")[0].clientHeight - $(".ui-header")[0].clientHeight);
	$(".ui-content").css("height", innerHeight - $(".ui-footer")[0].clientHeight - $(".ui-header")[0].clientHeight);
	$(".setting-panel").css("height", innerHeight - $(".ui-footer")[0].clientHeight - $(".ui-header")[0].clientHeight - $(".ui-navbar")[0].clientHeight);
	$("#config, .setting-panel").hide();
	$("#config #start .ui-icon-marker-green").css("background-image", "url(" + icon_green + ")");
	$("#config #finish .ui-icon-marker-blue").css("background-image", "url(" + icon_blue + ")");
	$("#config #waypoint .ui-icon-marker-gold").css("background-image", "url(" + icon_gold + ")");
});

jQuery(function($) {
	$(window).bind('orientationchange resize', function() {
		$(".ui-content").css("height", innerHeight - $(".ui-footer")[0].clientHeight - $(".ui-header")[0].clientHeight);
		$(".setting-panel").css("height", innerHeight - $(".ui-footer")[0].clientHeight - $(".ui-header")[0].clientHeight - $(".ui-navbar")[0].clientHeight);
	});
});

jQuery(function($) {

	$("#map_switch").bind('vclick', function() {
		if (($("#config:not(:animated)").is(":visible"))) {
			$("#map_switch .ui-btn-text").text("設定を出す");
			$(this).buttonMarkup({
				icon: "plus"
			});
		} else if ($("#config:not(:animated)").is(":hidden")) {
			$("#map_switch .ui-btn-text").text("設定を隠す");
			$(this).buttonMarkup({
				icon: "minus"
			});
		}
		$("#config:not(:animated)").slideToggle("fast");
	});
	$("#start").bind('vclick', function() {
		if($("#setting_start").is(":visible")){
			$("#config .ui-draggable").draggable("enable"); //設定パネルの格納時
		}else if($("#setting_start").is(":hidden")){
			$("#config .ui-draggable").draggable("disable"); //設定パネルの開始もしくは遷移時
		}
		$(".setting-panel:not(#setting_start)").hide();
		$("#setting_start").toggle();
	});
	$("#finish").bind('vclick', function() {
		if($("#setting_finish").is(":visible")){ //設定パネルの格納時
			$("#config .ui-draggable").draggable("enable");
		}else if($("#setting_finish").is(":hidden")){ //設定パネルの開始もしくは遷移時
			$("#config .ui-draggable").draggable("disable");
		}
		$(".setting-panel:not(#setting_finish)").hide();
		$("#setting_finish").toggle();

	});
	$("#waypoint").bind('vclick', function() {
		if($("#setting_waypoint").is(":visible")){ //設定パネルの格納時
			$("#config .ui-draggable").draggable("enable");
		}else if($("#setting_waypoint").is(":hidden")){ //設定パネルの開始もしくは遷移時
			$("#config .ui-draggable").draggable("disable");
		}
		$(".setting-panel:not(#setting_waypoint)").hide();
		$("#setting_waypoint").toggle();
	});
});


jQuery(function($) {
	$('#get_gps').bind('vclick', function() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(
				// （1）位置情報の取得に成功した場合
				function(pos) {
					var lonlat = new OpenLayers.LonLat(pos.coords.longitude, pos.coords.latitude)
					console.log(lonlat);
					lonlat.transform(
						new OpenLayers.Projection("EPSG:4326"),
						new OpenLayers.Projection("EPSG:900913")
					);
					map.panTo(lonlat);
					markers.addMarker(new OpenLayers.Marker(lonlat, marker_present));
				},
				// （2）位置情報の取得に失敗した場合
				function(error) {
					var message = "";

					switch (error.code) {

						// 位置情報が取得できない場合
						case error.POSITION_UNAVAILABLE:
							message = "位置情報の取得ができませんでした。";
							break;

							// Geolocationの使用が許可されない場合
						case error.PERMISSION_DENIED:
							message = "位置情報取得の使用許可がされませんでした。";
							break;

							// タイムアウトした場合
						case error.PERMISSION_DENIED_TIMEOUT:
							message = "位置情報取得中にタイムアウトしました。";
							break;
					}
					console.log(message);
				}
			);
		} else {
			console.log('位置情報は利用できません');
		}

	});
});

jQuery(function($) {
	$("#config #start").draggable({
		containtment: ".ui-content",
		opacity: 0.8,
		delay: 150,
		zIndex: 1500,
		cursorAt: {
			left: 21,
			bottom: 0
		},
		helper: function(event) {
			return $("<img id='marker_start' src=" + icon_green + " alt='S' width='42' height='50'>");
		},
		start: function(evt, ui) {
			$("#config #start .ui-icon-marker-green").css("background-image", "none");
		},
		stop: function(evt, ui) {
			$("#config #start .ui-icon-marker-green").css("background-image", "url(" + icon_green + ")");
		}
	});

	$("#config #finish").draggable({
		containtment: ".ui-content",
		opacity: 0.8,
		delay: 150,
		zIndex: 1500,
		cursorAt: {
			left: 21,
			bottom: 0
		},
		helper: function(event) {
			return $("<img id='marker_finish' src=" + icon_blue + " alt='F' width='42' height='50'>");
		},
		start: function(evt, ui) {
			$("#config #finish .ui-icon-marker-blue").css("background-image", "none");
		},
		stop: function(evt, ui) {
			$("#config #finish .ui-icon-marker-blue").css("background-image", "url(" + icon_blue + ")");
		}
	});

	$("#config #waypoint").draggable({
		containtment: ".ui-content",
		opacity: 0.8,
		delay: 150,
		zIndex: 1500,
		cursorAt: {
			left: 21,
			bottom: 0
		},
		helper: function(event) {
			return $("<img id='marker_waypoint' src=" + icon_gold + " alt='W' width='42' height='50'>");
		},
		start: function(evt, ui) {
			$("#config #waypoint .ui-icon-marker-gold").css("background-image", "none");
		},
		stop: function(evt, ui) {
			$("#config #waypoint .ui-icon-marker-gold").css("background-image", "url(" + icon_gold + ")");
		}
	});

	$("img").draggable({
		stack: "img"
	});
});

jQuery(function($) {
	var cnt_waypoint = 0;
	var bool_start = false;
	var bool_finish = false;
	$("#map").droppable({
		tolerance: "pointer",
		drop: function(evt, ui) {
			var lonlat = map.getLonLatFromViewPortPx(new OpenLayers.Pixel(ui.offset.left + 21 - 1, ui.offset.top - 1));

			var pointmarker;
			if (ui.helper[0].id === "marker_start") {
				pointmarker = new OpenLayers.Marker(new OpenLayers.LonLat(lonlat.lon, lonlat.lat), marker_start);
				pos_start = lonlat.transform(
					new OpenLayers.Projection("EPSG:900913"),
					new OpenLayers.Projection("EPSG:4326")
				);
				bool_start = true;
			} else if (ui.helper[0].id === "marker_finish") {
				pointmarker = new OpenLayers.Marker(new OpenLayers.LonLat(lonlat.lon, lonlat.lat), marker_finish);
				pos_finish = lonlat.transform(
					new OpenLayers.Projection("EPSG:900913"),
					new OpenLayers.Projection("EPSG:4326")
				);
				bool_finish = true;
			} else if (ui.helper[0].id === "marker_waypoint") {
				pointmarker = new OpenLayers.Marker(new OpenLayers.LonLat(lonlat.lon, lonlat.lat), marker_waypoint.clone());
				pos_waypoint[cnt_waypoint] = lonlat.transform(
					new OpenLayers.Projection("EPSG:900913"),
					new OpenLayers.Projection("EPSG:4326")
				);
				cnt_waypoint++;
			}
			if (bool_start & bool_finish) routing();
			markers.addMarker(pointmarker);
		}
	});
});

jQuery.mobile.buttonMarkup.hoverDelay = 0;