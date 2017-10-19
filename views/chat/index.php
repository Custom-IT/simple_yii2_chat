<?php
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use app\models\Messages;
?>
<?php Pjax::begin(['id' => 'notes', 'formSelector' => '#chat-form', /*'timeout' => 3000,*/ 'enablePushState' => false]) ?>
<div class="outer-div">
	<div class="messages-div container">
		<?= $this->render("messagescontainer", [
			"messages" => $messages,
		]); ?>
	</div>
	<div class="add_message_BG container">
		<?php $form = ActiveForm::begin(['id' => 'chat-form','action'=>'', // Url::to(["/chat/savemessage"]),
			/*"options" => ["data-pjax"=>""]*/]); ?>
			<div class="row" style="margin-top:11px;">
				<div class="col-xs-5" style="padding-left: 11px;">
					<?= $form->field(new Messages(), 'firstname')->textInput(['class' => 'firstname input-sm form-control', 'style'=>'width:174px', 'value'=> !empty($preFirstname) ? $preFirstname : 'Имя',
					"onfocus" => "$('input.firstname').inputPlaceholder('onfocus', 'Имя');",
					"onblur" => "$('input.firstname').inputPlaceholder('onblur', 'Имя');",])->label(false); ?>
				</div>
				<div class="col-xs-7" style="padding-left: 14px; padding-right: 11px">
					<?= $form->field(new Messages(), 'lastname')->textInput(['class' => 'lastname input-sm form-control', 'value'=> !empty($preLastname) ? $preLastname : 'Фамилия',
					"onfocus" => "$('input.lastname').inputPlaceholder('onfocus', 'Фамилия');",
					"onblur" => "$('input.lastname').inputPlaceholder('onblur', 'Фамилия');",])->label(false); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12" style="padding-left: 11px; padding-right: 11px">
					<?= $form->field(new Messages(), 'message')->textInput(['class' => 'message input-sm form-control', 'value'=>'Введите текст сообщения',
					"onfocus" => "$('input.message').inputPlaceholder('onfocus', 'Введите текст сообщения');",
					"onblur" => "$('input.message').inputPlaceholder('onblur', 'Введите текст сообщения');",])->label(false); ?>
				</div>
			</div>
			<center>
				<?= Html::submitButton("отправить", ['class' => 'chat-submit pull-center']); ?>
			</center>
		<?php ActiveForm::end(); ?>
	</div>
	<div class="liftclother"></div>
</div>
<?php Pjax::end() ?>
<?php
$customCss = <<< SCRIPT
body{
	overflow:hidden;
}
.add_message_BG {
	background-image: -moz-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);
	background-image: -webkit-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);

	background-image: -ms-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);
	background-image: -o-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorStr='#fdfdfd', EndColorStr='#d5dde0')";

	width: 100%;
	height: calc(428px - 294px);
	border-top:1px solid #dde0e3;
}
.messages-div{
  	width: 100%; height: 294px;
  	width: 456px;
  	/*outline: 1px solid red;*/
  	// display: table-cell; vertical-align: bottom;
  	// padding-bottom: 11px;
  	overflow-y : scroll;
  	overflow-x : hidden;
}
.liftclother{
	content:"";
	display:block;
	height:10px;
	width:18px;
	background:white;
	position: relative;
	left:439px;
	height: 428px;
	top: -428px;
}
.outer-div{
	border:1px solid #dde0e3;
  	width: 440px; height: 428px;
  	/* позиционируем в центр */
  	position: absolute;
  	top:0;
  	left:0;
  	bottom:0;
  	right:0;
  	margin:auto;
}
.chat-submit{
	text-transform: uppercase;
}
.form-group {
    margin-bottom: 11px;
}
.chat-submit {
	/* background-image: -moz-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);
	background-image: -webkit-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);
	background-image: -ms-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);
	background-image: -o-linear-gradient( 90deg, rgb( 213, 221, 224 ) 0%, rgb( 253, 253, 253 ) 100%);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorStr='#fdfdfd', EndColorStr='#d5dde0')";*/

	background-image: url("img/ie9buttonsend.png");

	height: 30px;
	width: 140px;
	font-size: 12px;
	font-family: "Roboto";
	color: rgb( 255, 255, 255 );
	font-weight: bold;
	line-height: 1.333;
	text-align: center;
	border: none;
	/* text-shadow: 0.018cm 0.031cm 0.10583333333333cm rgb(160, 153, 155);*/
	z-index: 13;
	box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
}
input[type=text]{
	font-weight: bold;
	font-family: "Roboto";
	font-size: 11.4px;
}
.in-message, .out-message{
	/*padding-top: 11px;*/
	padding-top: 1px;
}
.in-message>div{
    padding-left: 22px;
    padding-right: 18px;
}
.in-message>div:before {
	display: block;
	content: "";
	width: 10px; height: 10px;
	background: url("img/left-arrow.png");
	position: relative;
	top: 24px; left: -7px;
}
.out-message>div:before {
	display: block;
	content: "";
	width: 10px; height: 10px;
	background: url("img/right-arrow.png");
	position: relative;
	top: 24px; left: 359px;
}
.in-message>div>div, .out-message>div>div{
	border:1px solid #dde0e3;
	border-color: rgb( 221, 224, 227 );
	border-radius: 4px;
	padding-left: 10px;
	padding-right: 15px;
	padding-top: 5px;
}
.out-message>div>div{
	-webkit-box-shadow: inset -4px -9px 5px 0px rgba(0,0,0,0.05);
	-moz-box-shadow: inset -4px -9px 5px 0px rgba(0,0,0,0.05);
	box-shadow: inset -4px -9px 5px 0px rgba(0,0,0,0.05);
}
.out-message>div{
    padding-right: 22px;
    padding-left: 18px;
}
.message-header, .message-content{
	font-family: "Roboto";
	color: rgb( 148, 148, 148 );
	font-size: 12px;
}
.message-content{
	color:#444;
}
.messages-div>div:last-child{
	// margin-bottom: 11px; // для кроссбр. сделано через доб. div height 11px
}
SCRIPT;
$this->registerCss($customCss);

$customScript = <<< SCRIPT
	jQuery.fn.extend({
	  inputPlaceholder: function(event, placeholder) {
		switch (event) {
			case "onfocus":
				if ( $(this).val() === placeholder) {
					$(this).val('');
				}
				break;
			case "onblur":
				if( $(this).val() === '') {
					$(this).val(placeholder);
				}
				break;
			default:
				break;
		}
	  }
	});
	jQuery.fn.scrollToBottom = function() {
		this.scrollTop(this.get(0).scrollHeight);
	};
	$('.messages-div').scrollToBottom();
	$(document).on('pjax:complete', function() {
	    $('.messages-div').scrollToBottom();
	})
	// для ie 9, где Pjax не работает через аякс, делаем аякс вручную
	$('#chat-form').off('submit');
	$('#chat-form').submit(function(event) {
		if (!$.support.pjax) {
			event.preventDefault();
			event.stopPropagation();
			event.stopImmediatePropagation();
	        $.ajax({
	            type: 'POST',
	            url: '',
	            data: $('#chat-form').serialize(),
	            success: function(data) {
	                $('#notes').html(data);
	                $('.messages-div').scrollToBottom();
	            },
	        });
		}
	});
	setInterval(function(){
		if ($.support.pjax) {
			$.pjax({url:'', container: '.messages-div.container', method: 'GET'});
		} else {
			// для ie 9, где Pjax не работает через аякс, делаем аякс вручную
		    $.ajax({
		        type: 'GET',
		        url: '',
		        // data: msg,
		        success: function(data) {
		          	$('.messages-div.container').html(data);
		          	$('.messages-div').scrollToBottom();
		        }
		    });
		}
	}, 3000);

SCRIPT;
$this->registerJs($customScript, \yii\web\View::POS_READY);