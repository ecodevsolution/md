<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

use yii\web\View;
/* @var $content string */

AppAsset::register($this);

if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
	$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/backend/layout');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		
		<?php $root = '@web';
			
				$this->registerJsFile($root."/js/jquery.min.js",
				['depends' => [\yii\web\JqueryAsset::className()],
				'position' => View::POS_HEAD]);
				
				$this->registerJsFile($root."/js/nprogress.js",
				['depends' => [\yii\web\JqueryAsset::className()],
				'position' => View::POS_HEAD]);
				
				
		//$this->registerJs(" NProgress.start()",'position' => View::POS_HEAD]);
		$this->registerJs("
			$(document).ready(function () {
				var data1 = [[gd(2012, 1, 1), 17], [gd(2012, 1, 2), 74], [gd(2012, 1, 3), 6], [gd(2012, 1, 4), 39], [gd(2012, 1, 5), 20], [gd(2012, 1, 6), 85], [gd(2012, 1, 7), 7]];
	
				var data2 = [[gd(2012, 1, 1), 82], [gd(2012, 1, 2), 23], [gd(2012, 1, 3), 66], [gd(2012, 1, 4), 9], [gd(2012, 1, 5), 119], [gd(2012, 1, 6), 6], [gd(2012, 1, 7), 9]];
				$('#canvas_dahs').length && $.plot($('#canvas_dahs'), [
					data1, data2
				], {
					series: {
						lines: {
							show: false,
							fill: true
						},
						splines: {
							show: true,
							tension: 0.4,
							lineWidth: 1,
							fill: 0.4
						},
						points: {
							radius: 0,
							show: true
						},
						shadowSize: 2
					},
					grid: {
						verticalLines: true,
						hoverable: true,
						clickable: true,
						tickColor: '#d5d5d5',
						borderWidth: 1,
						color: '#fff'
					},
					colors: ['rgba(38, 185, 154, 0.38)', 'rgba(3, 88, 106, 0.38)'],
					xaxis: {
						tickColor: 'rgba(51, 51, 51, 0.06)',
						mode: 'time',
						tickSize: [1, 'day'],
	
						axisLabel: 'Date',
						axisLabelUseCanvas: true,
						axisLabelFontSizePixels: 12,
						axisLabelFontFamily: 'Verdana, Arial',
						axisLabelPadding: 10
	
					},
					yaxis: {
						ticks: 8,
						tickColor: 'rgba(51, 51, 51, 0.06)',
					},
					tooltip: false
				});
	
				function gd(year, month, day) {
					return new Date(year, month - 1, day).getTime();
				}
			});
		");
	
		$this->registerJs("
			$(function () {
				$('#world-map-gdp').vectorMap({
					map: 'world_mill_en',
					backgroundColor: 'transparent',
					zoomOnScroll: false,
					series: {
						regions: [{
							values: gdpData,
							scale: ['#E6F2F0', '#149B7E'],
							normalizeFunction: 'polynomial'
						}]
					},
					onRegionTipShow: function (e, el, code) {
						el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
					}
				});
			});
		");
		
		$this->registerJs("
		var icons = new Skycons({
					'color': '#73879C'
				}),
				list = [
					'clear-day', 'clear-night', 'partly-cloudy-day',
					'partly-cloudy-night', 'cloudy', 'rain', 'sleet', 'snow', 'wind',
					'fog'
				],
				i;
	
			for (i = list.length; i--;)
				icons.set(list[i], list[i]);
	
			icons.play();
		");
		
		$this->registerJs("NProgress.start();");
		
		$this->registerJs("
			var doughnutData = [
				{
					value: 30,
					color: '#455C73'
				},
				{
					value: 30,
					color: '#9B59B6'
				},
				{
					value: 60,
					color: '#BDC3C7'
				},
				{
					value: 100,
					color: '#26B99A'
				},
				{
					value: 120,
					color: '#3498DB'
				}
		];
			var myDoughnut = new Chart(document.getElementById('canvas1').getContext('2d')).Doughnut(doughnutData);
		");
		
		
		$this->registerJs("
			$(document).ready(function () {
	
				var cb = function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
					//alert('Callback has fired: [' + start.format('MMMM D, YYYY') + ' to ' + end.format('MMMM D, YYYY') + ', label = ' + label + ']);
				}
	
				var optionSet1 = {
					startDate: moment().subtract(29, 'days'),
					endDate: moment(),
					minDate: '01/01/2012',
					maxDate: '12/31/2015',
					dateLimit: {
						days: 60
					},
					showDropdowns: true,
					showWeekNumbers: true,
					timePicker: false,
					timePickerIncrement: 1,
					timePicker12Hour: true,
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					opens: 'left',
					buttonClasses: ['btn btn-default'],
					applyClass: 'btn-small btn-primary',
					cancelClass: 'btn-small',
					format: 'MM/DD/YYYY',
					separator: ' to ',
					locale: {
						applyLabel: 'Submit',
						cancelLabel: 'Clear',
						fromLabel: 'From',
						toLabel: 'To',
						customRangeLabel: 'Custom',
						daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
						monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
						firstDay: 1
					}
				};
				$('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
				$('#reportrange').daterangepicker(optionSet1, cb);
				$('#reportrange').on('show.daterangepicker', function () {
					console.log('show event fired');
				});
				$('#reportrange').on('hide.daterangepicker', function () {
					console.log('hide event fired');
				});
				$('#reportrange').on('apply.daterangepicker', function (ev, picker) {
					console.log('apply event fired, start/end dates are' + picker.startDate.format('MMMM D, YYYY') + ' to ' + picker.endDate.format('MMMM D, YYYY'));
				});
				$('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
					console.log('cancel event fired');
				});
				$('#options1').click(function () {
					$('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
				});
				$('#options2').click(function () {
					$('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
				});
				$('#destroy').click(function () {
					$('#reportrange').data('daterangepicker').remove();
				});
			});
		");
		
		$this->registerJs("NProgress.done();");
		?>
		
		<?php $this->head() ?>
	</head>
	<body class="nav-md">
		<?php $this->beginBody() ?>
		<div class="container body">
			<div class="main_container">
				<?= $this->render(
					'left.php',
					['directoryAsset' => $directoryAsset]
				)
				?>
				
				<?php /*echo $this->render(
					'header.php',
					['directoryAsset' => $directoryAsset]
				)*/ ?>
				
				
				
				<div class="right_col" role="main">

					<?= $content ?>
					 <!-- footer content -->
					<footer>
						<div class="">
							<p class="pull-right">Support By <a href="http://edsproject.co.id"> Edsproject.co.id <a> |
								<span class="lead"> <i class="fa fa-shopping-cart"></i> Panel Maridagang</span>
							</p>
						</div>
						<div class="clearfix"></div>
					</footer>
					<!-- /footer content -->
				</div>
				
			</div>
		</div>
		<div id="custom_notifications" class="custom-notifications dsp_none">
			<ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
			</ul>
			<div class="clearfix"></div>
			<div id="notif-group" class="tabbed_notifications"></div>
		</div>
			
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
<?php } ?>
